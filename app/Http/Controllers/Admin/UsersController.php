<?php namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\DestroyUserRequest;

use App\User;
use App\Http\Repositories\UserRepository;

use Illuminate\Session\Store as Session;

/**
 * Class UsersController

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
    function __construct( UserRepository $user, Session $session )
    {
        parent::__construct($session);

        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index( Request $request )
    {

        if ( ( $s = $request->get( 's' ) ) )
        {
            $this->user = $this->user->search( $s );
        }

        $users = $this->user->paginate();

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

        $user = $this->user->createOrUpdate( $request->all() );

        if ( $user->id )
        {
            $this->flash( trans( 'User #'.$user->id.' '. $user->name.' created.' ), 'msg-success');

            return redirect( route( "admin.users.edit", [ $user->id ] ) );
        }

        return redirect()->back();
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
    public function update( UpdateUserRequest $request )
    {
        $this->user->createOrUpdate( $request->all() );

        return redirect()->route( "admin.users.index" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy( DestroyUserRequest $request, User $user )
    {
        // Was the user deleted?
        if ( $this->user->destroy( $user ) )
        {
            $this->flash( trans( 'User #'.$user->id.' '. $user->name.' was deleted.' ), 'msg-success');
        }
        // There was a problem deleting the user
        else
        {
            $this->flash( trans( 'You can\'t delete this user.' ), 'msg-danger');
        }

        return redirect( route( "admin.users.index" ) );
    }
}
