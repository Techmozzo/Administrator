<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('confirmation_request_id');
            $table->foreign('confirmation_request_id')->references('id')->on('confirmation_requests')->onDelete('cascade');
            $table->string('type');
            $table->decimal('amount', 12, 2 );
            $table->tinyInteger('status')->default(0);
            $table->string('method_of_payment');
            $table->string('reference_number');
            $table->string('sender');
            $table->string('receiver')->nullable();
            $table->string('receiver_account_number')->nullable();
            $table->string('receiver_bank')->nullable();
            $table->string('receiver_bank_sort_code')->nullable();
            $table->string('currency')->nullable();
            $table->mediumText('narrative')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
