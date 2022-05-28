<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('courier_id')->constrained('couriers')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('timeout');
            $table->string('address');
            $table->string('regency');
            $table->string('province');
            $table->double('total');
            $table->double('shipping_cost');
            $table->double('sub_total');
            $table->string('proof_of_payment');
            $table->enum('status', ['unverified','verified','delivered','success','expired','canceled']);
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
}
