<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class CreateSignatoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signatories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->unsignedInteger('confirmation_request_id');
            $table->foreign('confirmation_request_id')->references('id')->on('confirmation_requests')->onDelete('cascade');
            $table->string('status')->default('PENDING');
            $table->string('comment')->nullable();
            $table->string('token');
            $table->timestamp('signed_at')->nullable();
            $table->timestamp('expired_at')->default(Carbon::now()->addDay());
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
        Schema::dropIfExists('signatories');
    }
}
