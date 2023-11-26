<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Operator extends Model
{
    use HasFactory;

    public static function insertGetId($officeId,$nationalCode, $mobile, $name,$family)
    {
        return DB::table('operators')->insertGetId([
            'office_id' => $officeId,
            'national_code' => $nationalCode,
            'mobile' => $mobile,
            'name' => $name,
            'family' => $family,
            'created_at' => Carbon::now()
        ]);
    }

}
