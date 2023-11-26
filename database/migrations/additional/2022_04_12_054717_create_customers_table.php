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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->boolean('type')->default(false)->comment('0 is real and 1 is legal');
            $table->string('full_name')->nullable();
            $table->string('mobile' , 20);
            $table->string('national_code' , 20)->nullable();
            $table->string('tel' , 20)->nullable();
            $table->text('activity_description')->nullable();
            $table->text('company_name')->nullable();
            $table->text('employee_name')->nullable();
            $table->text('national_id')->nullable();
            $table->text('manager_name')->nullable();
            $table->smallInteger('status')->default(0);
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
        Schema::dropIfExists('customers');
    }
};
