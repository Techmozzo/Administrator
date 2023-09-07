<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditorProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditor_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('auditor_id');
            $table->foreign('auditor_id')->references('id')->on('auditors')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('phone');
            $table->string('identification')->nullable();
            $table->string('avatar')->nullable();
            $table->string('gender')->nullable();
            $table->string('country_of_origin')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('marital_status')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('auditor_profiles');
    }
}
