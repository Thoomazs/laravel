<?php namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\DeleteUserRequest;

use App\User;
use Illuminate\Support\Facades\Input;

/**
 * Class UsersController
 *
 * @package App\Http\Controllers\Admin
 * @Resource("admin/users", except="show")
 *
 */
class UsersController extends AdminController
{

    /**
     * @var User
     */
    protected $user;


    /**
     * @param User $user
     */
    function __construct( User $user )
    {
        parent::__construct();

        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        if ( ( $s = Input::get( 's' ) ) )
        {
            $this->user = $this->user->search( $s );
        }

        $users = $this->user->paginate( 1);

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
        $user = $this->user->create( $this->_addSlug( $request->all() ) );

        if ( $user->id )
        {
            return redirect( route( "admin.users.index" ) );
        }

        return redirect()->back()->withErrors( [

        ] );
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
        if ( !$user->id )
        {
            return redirect()->route( 'admin.users.index' );
        }

        return view( 'admin.users.edit', compact( 'user' ) );
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
        $user->fill( compact( $request->all() ) )->save();

        return redirect()->route( "admin.users.index" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy( User $user )
    {
        // delete user
        $this->user->find( $user->id )->delete();


        // Was the user deleted?
        $user = User::find( $user->id );
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


    /**
     * @param array $user
     *
     * @return array
     */
    private function _addSlug( array $user )
    {

        $test_slug = $slug = $user[ "firstname" ]."-".$user[ "lastname" ];

        $i = 0;
        while ( $this->user->whereSlug( $test_slug )->first() )
        {
            $test_slug = $slug."-".++$i;
        }

        $user[ "slug" ] = $test_slug;

        return $user;
    }
}
