<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('receiver_name')->nullable();
            $table->dateTime('bill_post_date')->nullable();
            $table->dateTime('bill_payment_date')->nullable();
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->string('bill_no')->nullable();
            $table->string('charges_name')->nullable();
            $table->string('charge_amount')->nullable();
            $table->string('discount_amount')->nullable();
            $table->float('total_amount')->default(0);
            $table->tinyInteger('payment_status')->comment('1:due, 2:paid, 3:notgiven')->default(1);
            $table->tinyInteger('payment_type')->comment('1:cash, 2:cheque, 3:online')->default(1);
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
        Schema::dropIfExists('monthly_expenses');
    }
}
