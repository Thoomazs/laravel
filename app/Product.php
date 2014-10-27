<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ ];

    protected $fillable = [ 'name', 'desc', 'price', 'stock', 'slug' ];

    public function categories()
    {
        return $this->belongsToMany( 'App\Category', "products_category",  "product_id", "category_id" );
    }
}
