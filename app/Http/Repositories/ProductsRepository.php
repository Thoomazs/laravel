<?php
    namespace App\Http\Repositories;

    use App\Product;
    use Illuminate\Log\Writer as Log;
    use Illuminate\Session\Store as Session;

    //use Illuminate\Pagination\LengthAwarePaginator as Paginator;

    /**
     * Class ProductRepository
     *
     * @package App\Http\Repositories
     */
    class ProductsRepository extends BaseRepository
    {

        /**
         * The product model implementation.
         *
         * @var Product
         */
        protected $product;

        /**
         * Create a product repository instance.
         *
         * @param Product  $product
         * @param Log      $log
         * @param Session  $session
         * @param Auth     $auth
         * @param Password $password
         */
        function __construct( Product $product, Log $log, Session $session )
        {
            parent::__construct( $log, $session );

            $this->product = $product;
        }

        /**
         * Search products by firstname, lastname or email
         *
         * @param $search
         *
         * @return $this
         */
        public function search( $search )
        {
            $this->product = $this->product->where( "name", "like", "%".$search."%" );

            return $this;
        }

        protected function _all()
        {
            return $this->product->with( 'categories' )->orderBy( "name", "ASC" );
        }

        /**
         * @return Collection
         */
        public function all()
        {

            return $this->_all()->get();
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

        public function optionArray()
        {

            $products = $this->all();

            $result = [];

            foreach($products as $v)
            {
                $result[$v->id] = $v->name;
            }
            return $result;
        }


        protected function _createOrUpdate(Product $product, array $product_data)
        {
            $product->fill( $product_data );
            $product->save();

            $product_data[ 'categories' ] = (isset($product_data[ 'categories' ])) ? $product_data[ 'categories' ] : [];
            $product->categories()->sync( $product_data[ 'categories' ] );

            $product->save();
        }

        /**
         * @param $product
         *
         * @return null|Product
         */
        public function create( $product_data )
        {
            if ( isset( $product_data[ "id" ] ) )
            {
                return null;
            }

            $product = new Product;

            $this->_createOrUpdate($product, $product_data);

            $this->log->info( "Product created:\n\n ".var_export( $product->with('categories')->first()->toArray(), true ) );

            return $product;
        }


        /**
         * @param $data
         *
         * @return Product
         */
        public function update( $product_data )
        {
            $product = Product::find( $product_data[ "id" ] );

            $this->_createOrUpdate($product, $product_data);

            $this->log->info( "Product updated:\n\n ".var_export( $product->with('categories')->first()->toArray(), true ) );

            return $product;


        }

        /**
         * @param $data
         *
         * @return bool
         */
        public function destroy( $product )
        {
            if ( $this->product->destroy( $product->id ) )
            {
                $this->log->info( "Product deleted:\n\n ".var_export( $product->toArray(), true ) );

                return true;
            }

            return false;
        }
    }