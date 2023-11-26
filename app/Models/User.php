<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function insertGetId(int $insertToOffice, int $operator_id, $office_user_key, $city , $province): void
    {
        DB::table('users')->insertGetId(
            [
                'office_id' => $insertToOffice,
                'operator_id' => $operator_id,
                'userkey' => $office_user_key,
                'province_id' => $province,
                'city_id' => $city,
                'type' => 1,//دفتر پیشخوان
                'role' => 1,//کاربر عادی
                'active' => 1

            ]
        );
    }


}
