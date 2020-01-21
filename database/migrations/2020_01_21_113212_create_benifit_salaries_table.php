<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenifitSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benifit_salaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('gross_salary_id');
            $table->integer('benifit_id_add');
            $table->integer('benifit_id_deduct');
            $table->integer('benifit_add_value');
            $table->integer('benifit_add_deduct');
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
        Schema::dropIfExists('benifit_salaries');
    }
}
