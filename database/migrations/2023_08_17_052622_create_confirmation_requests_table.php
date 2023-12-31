<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmation_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('opening_period');
            $table->string('closing_period');
            $table->string('file')->nullable();
            $table->string('envelop_id')->nullable();
            $table->string('envelop_url')->nullable();
            $table->unsignedInteger('auditor_id');
            $table->foreign('auditor_id')->references('id')->on('auditors')->onDelete('cascade');
            $table->unsignedInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedInteger('bank_id');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
            $table->string('authorization_status')->default('PENDING');
            $table->string('confirmation_status')->default('PENDING');
            $table->string('statement')->nullable();
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
        Schema::dropIfExists('confirmation_requests');
    }
}
