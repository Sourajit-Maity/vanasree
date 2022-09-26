<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePujaCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puja_collections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->dateTime('bill_post_date')->nullable();
            $table->dateTime('bill_payment_date')->nullable();

            $table->longText('additional_instructions')->nullable();
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->string('promo_code')->nullable();
            $table->string('bill_no')->nullable();
            $table->float('discount_amount')->default(0);
            $table->float('cancellation_charge')->default(0);
            $table->float('total_amount')->default(0);
            $table->tinyInteger('payment_status')->comment('1:due, 2:paid, 3:notgiven')->default(1);
            $table->tinyInteger('payment_type')->comment('1:cash, 2:cheque, 3:online')->default(1);
            $table->unsignedBigInteger('cancelled_by')->nullable();
            $table->foreign('cancelled_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('cancellation_reason')->nullable();
            $table->longText('cancellation_comment')->nullable();
            $table->dateTime('cancelled_at')->nullable();
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('puja_collections');
    }
}
