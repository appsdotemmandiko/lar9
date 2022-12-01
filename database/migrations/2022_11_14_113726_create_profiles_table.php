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
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('title');
            $table->date('dob');
            $table->string('passportId');
            $table->string('gender');
            $table->string('postalAdd');
            $table->string('postalCode');
            $table->string('town');
            $table->string('telephone');
            $table->string('telephoneAlt')->nullable();
            $table->integer('disability');
            $table->string('disabilityNature')->nullable();
            $table->string('ncpwd')->nullable();
            $table->string('civilStatus');
            $table->integer('crimeOffence');
            $table->string('crimeNature')->nullable();
            $table->string('crimeYear')->nullable();
            $table->string('crimeDUration')->nullable();
            $table->integer('empDismissal');
            $table->string('empDismissalReason')->nullable();
            $table->integer('profileSession');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
