<?php
    namespace App\Http\Repositories;

    use App\User;
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
         * @var User
         */
        protected $user;

        /**
         * @param User    $user
         * @param Log     $log
         * @param Session $session
         */
        function __construct( User $user, Log $log, Session $session )
        {
            parent::__construct( $log, $session );

            $this->user = $user;
        }

        /**
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
         * @return mixed
         */
        public function all()
        {

            return $this->user->orderBy( "lastname", "ASC" )->orderBy( "firstname", "ASC" )->get();
        }

        /**
         * @param int $perPage
         *
         * @return \Illuminate\Pagination\LengthAwarePaginator
         */
        public function paginate( $perPage = 10 )
        {
            $all = $this->user->orderBy( "lastname", "ASC" )->orderBy( "firstname", "ASC" )->paginate( $perPage );

            //            $paginator = new Paginator( $all, $perPage, Paginator::resolveCurrentPage(), [ "path" => Paginator::resolveCurrentPath() ] );

            return $all;
        }

        /**
         * @param $data
         *
         * @return mixed
         */
        public function createOrUpdate( $data )
        {

            if ( !isset( $data[ "id" ] ) || is_null( $data[ "id" ] ) )
            {
                if ( $this->user->create( $this->_addSlug( $data ) ) )
                {
                    $this->log->info( "User created:\n\n ".var_export( $data, true ) );
                }
                else
                {
                    return null;
                }
            }
            else
            {
                if( $this->user->fill( $data )->save() )
                {
                    $this->log->info( "User updated:\n\n ".var_export( $data, true ) );
                }
                else
                {
                    return $data;
                }
            }

            return $this->user->find( $data["id"] )->first();
        }

        /**
         * @param $data
         *
         * @return int
         */
        public function destroy( $data )
        {

            $deleted = $this->user->destroy( $data->id );
            if( $deleted )
            {
                $this->log->info( "User deleted:\n\n ".var_export( $data->toArray(), true ) );
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