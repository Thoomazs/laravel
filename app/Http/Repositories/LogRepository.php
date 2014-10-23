<?php
    namespace App\Http\Repositories;

    use App\Log;
    //use Illuminate\Pagination\LengthAwarePaginator as Paginator;
//    use Illuminate\Pagination\Paginator as Paginator;

    class LogRepository
    {

        protected $log;


        function __construct( Log $log )
        {
            $this->log = $log;
        }

        /**
         * @param $search
         *
         * @return $this
         */
        public function search( $search )
        {
            $this->log = $this->log->where( "message", "like", "%".$search."%" )->orWhere( "created_at", "like", "%".$search."%" );

            return $this;
        }

        /**
         * @return mixed
         */
        public function all()
        {

            return $this->log->with( "user" )->orderBy( "id", "DESC" )->get();
        }

        /**
         * @param int $perPage
         *
         * @return \Illuminate\Pagination\LengthAwarePaginator
         */
        public function paginate( $perPage = 10 )
        {
            $all = $this->log->with( "user" )->orderBy( "id", "DESC" )->paginate( $perPage );

//            $paginator = new Paginator( $all, $perPage, Paginator::resolveCurrentPage(), [ "path" => Paginator::resolveCurrentPath() ] );

            return $all;
        }


    }