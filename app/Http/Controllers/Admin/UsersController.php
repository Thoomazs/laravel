<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\DeleteUserRequest;
use App\User;
use Symfony\Component\HttpFoundation\Session;

/**
 * Class UsersController
 *
 * @package App\Http\Controllers\Admin
 * @Resource("admin/users", except="show")
 *
 */
class UsersController extends AdminController
{

    protected $user;


    function __construct( User $user )
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->user->all();

        //        $s = Input::get( 's' );
        //
        //        if ( $s ) $users = $users->search( Input::get( 's' ) );
        //
        //        $users = $users->paginate( $this->_pagination );
        //
        //        Log::info( 'user index.' );

        return view( 'admin.users.index', compact( 'users' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view( 'admin.users.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store( CreateUserRequest $request )
    {
        $this->user->create( $request->all() );

        return redirect( route( "admin.users.index" ) );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show( $id )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit( User $user )
    {

        return view( 'admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update( UpdateUserRequest $request, User $user )
    {
        $user->fill(compact($request->all()))->save();

        return redirect()->route("admin.users.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy( $id )
    {
        // delete user
        $this->user->find( $id )->delete();


        // Was the user deleted?
        $user = User::find( $id );
        if ( empty( $user ) )
        {
            // OK
            //            Session::flash( 'msg-success', Lang::get( 'admin/users/messages.delete.success' ) );
        }
        else
        {
            // There was a problem deleting the user
            //            Session::flash( 'msg-danger', Lang::get( 'admin/users/messages.delete.error' ) );
        }

        return redirect( route( "admin.users.index" ) );
    }

}
