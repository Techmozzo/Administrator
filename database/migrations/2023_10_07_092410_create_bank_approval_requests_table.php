<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankApprovalRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_approval_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('confirmation_request_id');
            $table->foreign('confirmation_request_id')->references('id')->on('confirmation_requests')->onDelete('cascade');
            $table->unsignedInteger('bank_id');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
            $table->unsignedInteger('approved_by')->nullable();
            $table->foreign('approved_by')->references('id')->on('bankers')->onDelete('cascade');
            $table->unsignedInteger('declined_by')->nullable();
            $table->foreign('declined_by')->references('id')->on('bankers')->onDelete('cascade');
            $table->unsignedSmallInteger('status');
            $table->longText('comment')->nullable();
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
        Schema::dropIfExists('bank_approval_requests');
    }
}
