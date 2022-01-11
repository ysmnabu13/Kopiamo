<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('phone');
            $table->string('notes')->nullable();
            $table->string('orderStatus');

            $table->string('orderName')->nullable();
            $table->decimal('orderPrice',10,2)->nullable();
            $table->decimal('totalPrice',10,2);
            $table->string('paymentType')->nullable();
            $table->boolean('paymentStatus')->nullable();
            $table->string('fullName')->nullable();
            $table->string('ccNumber')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
