<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersApp extends Model {

    public $table = "USERS_APP";
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'gender',
        'address',
        'phone',
        'mail',
        'type',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
