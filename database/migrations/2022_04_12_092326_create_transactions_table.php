<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id()->from(20000);
            $table->string("customer_national_code", 10);
            $table->string("customer_mobile_number", 12);
            $table->string("customer_name", 190);
            $table->string("ver_code");
            $table->string("total_amount");
            $table->string("office_income");
            $table->string("serial")->nullable();
            $table->smallInteger("status")->default(0);
            $table->string("userkey");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
