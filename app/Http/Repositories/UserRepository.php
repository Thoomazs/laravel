<?php
    namespace App\Http\Repositories;

    use App\User;
    use Illuminate\Contracts\Auth\Guard as Auth;
    use Illuminate\Contracts\Auth\PasswordBroker as Password;
    use Illuminate\Log\Writer as Log;
    use Illuminate\Session\Store as Session;

    //use Illuminate\Pagination\LengthAwarePaginator as Paginator;

    /**
     * Class UserRepository
     *
     * @package App\Http\Repositories
     */
    class UserRepository extends BaseRepository
    {

        /**
         * The user model implementation.
         *
         * @var User
         */
        protected $user;

        /**
         * The Guard implementation.
         *
         * @var Auth
         */
        protected $auth;

        /**
         * The password broker implementation.
         *
         * @var Password
         */
        protected $password;

        /**
         * Create a user repository instance.
         *
         * @param User     $user
         * @param Log      $log
         * @param Session  $session
         * @param Auth     $auth
         * @param Password $password
         */
        function __construct( User $user, Log $log, Session $session, Auth $auth, Password $password )
        {
            parent::__construct( $log, $session );

            $this->user = $user;

            $this->auth = $auth;

            $this->password = $password;
        }

        /**
         * Search users by firstname, lastname or email
         *
         * @param $search
         *
         * @return $this
         */
        public function search( $search )
        {
            $this->user = $this->user->where( "firstname", "like", "%".$search )->orWhere( "lastname", "like", "%".$search )->orWhere( "email", "like", "%".$search."%" );

            return $this;
        }

        /**
         * @return Collection
         */
        public function all()
        {

            return $this->user->orderBy( "lastname", "ASC" )->orderBy( "firstname", "ASC" )->get();
        }

        /**
         * @param int $perPage
         *
         * @return Collection
         */
        public function paginate( $perPage = 10 )
        {
            $all = $this->user->orderBy( "lastname", "ASC" )->orderBy( "firstname", "ASC" )->paginate( $perPage );

            //            $paginator = new Paginator( $all, $perPage, Paginator::resolveCurrentPage(), [ "path" => Paginator::resolveCurrentPath() ] );

            return $all;
        }

        /**
         * @param $user
         *
         * @return null|User
         */
        public function create( $user_data )
        {
            if ( isset( $user_data["id"] ) )
            {
                return null;
            }

            $user_data = $this->_addSlug( $user_data );

            $user = new User;
            $user->fill( $user_data );
            $user->save();

            $this->log->info( "User created:\n\n ".var_export( $user->toArray(), true ) );

            return $user;
        }

        /**
         * @param      $credentials
         * @param null $remember
         *
         * @return array|bool
         */
        public function login( $credentials, $remember = null )
        {
            if ( is_null( $credentials ) || !$this->auth->attempt( $credentials, $remember ) )
            {
                return [ 'email' => 'These credentials do not match our records.', ];
            }

            return true;
        }

        /**
         * Logout
         */
        public function logout()
        {
            $this->auth->logout();
        }

        /**
         * @param $email
         *
         * @return array|bool
         */
        public function resetLink( $email )
        {
            $this->password->sendResetLink( $email );

            switch ( $response = $this->password->sendResetLink( $email ) )
            {
                case Password::INVALID_USER:
                    return [ 'email' => trans( Password::INVALID_USER ) ];

                case Password::RESET_LINK_SENT:
                    return true;
            }
        }

        /**
         * @param $credentials
         *
         * @return array|bool
         */
        public function reset( $credentials )
        {
            $response = $this->passwords->reset( $credentials, function ( $user, $password )
            {
                $user->password = bcrypt( $password );

                $user->save();
            } );

            switch ( $response )
            {
                case Password::INVALID_PASSWORD:
                    return [ 'password' => trans( $response ) ];
                case Password::INVALID_TOKEN:
                    return [ 'token' => trans( $response ) ];
                case Password::INVALID_USER:
                    return [ 'email' => trans( $response ) ];
                case Password::PASSWORD_RESET:
                    return true;
            }
        }

        /**
         * @param $data
         *
         * @return User
         */
        public function update( $user_data )
        {
            $user_data = $this->_addSlug( $user_data );

            $user = User::find( $user_data["id"] );
            $user->fill( $user_data );
            $user->save();

            $this->log->info( "User updated:\n\n ".var_export( $user->toArray(), true ) );

            return $user;


        }

        /**
         * @param $data
         *
         * @return bool
         */
        public function destroy( $user )
        {
            if ( $this->user->destroy( $user->id ) )
            {
                $this->log->info( "User deleted:\n\n ".var_export( $user->toArray(), true ) );

                return true;
            }

            return false;
        }

        /**
         * @param array $user
         *
         * @return array
         */
        private function _addSlug( array $user )
        {


            $slug      = $user[ "firstname" ]."-".$user[ "lastname" ];
            $test_slug = ( isset( $user[ "slug" ] ) && !empty( $user[ "slug" ] ) ) ? $user[ "slug" ] : $slug;

            $i = 0;
            while ( $this->user->whereSlug( $test_slug )->first() )
            {
                $test_slug = $slug."-".++$i;
            }

            $user[ "slug" ] = $test_slug;

            return $user;
        }


    }