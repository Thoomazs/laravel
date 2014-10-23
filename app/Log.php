<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{

    protected $table = 'log';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ ];

    protected $fillable = array( 'level', 'message', 'ip' );

    public function getIconAttribute()
    {
        return "fa-circle-o";
    }

    public function user()
    {
        return $this->hasOne('App\User', "id", "user_id");
    }
}
