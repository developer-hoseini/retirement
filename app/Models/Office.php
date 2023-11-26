<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Office extends Model
{
    use HasFactory;

    public static function insertGetId($office_user_key, $office)
    {
        return DB::table('offices')->insertGetId(
            [
                'userkey' => $office_user_key,
                'office' => $office,
                'created_at' => Carbon::now()
            ]
        );
    }
}
