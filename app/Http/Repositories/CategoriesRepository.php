<?php
    namespace App\Http\Repositories;

    use App\Category;
    use Illuminate\Log\Writer as Log;
    use Illuminate\Session\Store as Session;

    //use Illuminate\Pagination\LengthAwarePaginator as Paginator;

    /**
     * Class CategoryRepository
     *
     * @package App\Http\Repositories
     */
    class CategoriesRepository extends BaseRepository
    {

        /**
         * The category model implementation.
         *
         * @var Category
         */
        protected $category;

        /**
         * Create a category repository instance.
         *
         * @param Category $category
         * @param Log      $log
         * @param Session  $session
         * @param Auth     $auth
         * @param Password $password
         */
        function __construct( Category $category, Log $log, Session $session )
        {
            parent::__construct( $log, $session );

            $this->category = $category;
        }

        /**
         * Search categories by firstname, lastname or email
         *
         * @param $search
         *
         * @return $this
         */
        public function search( $search )
        {
            $this->category = $this->category->where( "name", "like", "%".$search."%" );

            return $this;
        }

        /**
         * @return Collection
         */
        protected function _all()
        {
            return $this->category->with( 'products' )->orderBy( "name", "ASC" );
        }

        public function all()
        {

            return $this->_all()->get();
        }

        public function optionArray()
        {

            $categories = $this->all();

            $result = [ ];

            foreach ( $categories as $v )
            {
                $result[ $v->id ] = $v->name;
            }

            return $result;
        }

        /**
         * @param int $perPage
         *
         * @return Collection
         */
        public function paginate( $perPage = 50 )
        {
            $all = $this->_all()->paginate( $perPage );

            //            $paginator = new Paginator( $all, $perPage, Paginator::resolveCurrentPage(), [ "path" => Paginator::resolveCurrentPath() ] );

            return $all;
        }


        protected function _createOrUpdate( Category $category, array $category_data )
        {
            $category->fill( $category_data );
            $category->save();

            $category_data[ 'products' ] = ( isset( $category_data[ 'products' ] ) ) ? $category_data[ 'products' ] : [ ];
            $category->products()->sync( $category_data[ 'products' ] );

            $category->save();
        }

        /**
         * @param $category
         *
         * @return null|Category
         */
        public function create( $category_data )
        {
            if ( isset( $category_data[ "id" ] ) )
            {
                return null;
            }

            $category = new Category;

            $this->_createOrUpdate( $category, $category_data );

            $this->log->info( "Category created:\n\n ".var_export( $category->toArray(), true ) );

            return $category;
        }


        /**
         * @param $data
         *
         * @return Category
         */
        public function update( $category_data )
        {
            $category = Category::find( $category_data[ "id" ] );

            $this->_createOrUpdate( $category, $category_data );

            $this->log->info( "Category updated:\n\n ".var_export( $category->toArray(), true ) );

            return $category;


        }

        /**
         * @param $data
         *
         * @return bool
         */
        public function destroy( $category )
        {
            if ( $this->category->destroy( $category->id ) )
            {
                $this->log->info( "Category deleted:\n\n ".var_export( $category->toArray(), true ) );

                return true;
            }

            return false;
        }
    }