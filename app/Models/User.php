<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Laravel\Passport\HasApiTokens;
use Ramsey\Uuid\Uuid;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use HasApiTokens, Authenticatable, Authorizable, HasFactory;

//    protected $primaryKey = 'id';
//
//    protected $keyType = 'string';
//
//    public $incrementing = false;
//
//    protected static function boot()
//    {
//        parent::boot();
//
//        static::creating(function (Model $model) {
//            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
//        });
//    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'uuid', 'token', 'email_token', 'expiry_time', 'email_verified'
    ];

    protected $dates = ['expiry_time'];

//    /**
//     * The attributes excluded from the model's JSON form.
//     *
//     * @var array
//     */
//    protected $hidden = [
//        'password',
//    ];
}
