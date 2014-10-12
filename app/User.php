<?php namespace App;

use Illuminate\Auth\UserTrait;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Contracts\Auth\User as UserContract;
use Illuminate\Contracts\Auth\Remindable as RemindableContract;
use Illuminate\Support\Facades\Hash;

class User extends Eloquent implements UserContract, RemindableContract
{

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'password', 'remember_token' ];

    protected $fillable = array( 'firstname',
                                 'lastname',
                                 'email',
                                 'password' );

    public function getNameAttribute()
    {
        return $this->firstname." ".$this->lastname;
    }

    public function setPasswordAttribute( $password )
    {
        $this->attributes[ 'password' ] = Hash::make( $password );
    }
}
