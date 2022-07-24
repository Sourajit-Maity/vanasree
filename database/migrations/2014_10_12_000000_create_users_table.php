<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('username')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('phone')->nullable();
            $table->longtext('address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('social_id')->nullable();
            $table->string('social_account_type')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->text('cover_photo_path')->nullable();
            $table->string('refer_code')->nullable()->unique();
            $table->unsignedBigInteger('referrer_id')->nullable();
            $table->foreign('referrer_id')->references('id')->on('users')->nullOnDelete();
            $table->foreignId('country_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('country_name')->nullable();
            $table->foreignId('state_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('state_name')->nullable();
            $table->foreignId('city_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('city_name')->nullable();
            $table->string('zipcode')->nullable();
            $table->text('resume_path')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->integer('otp')->nullable();
            $table->timestamp('otp_verified_at')->nullable();
            $table->string('tower_number')->default(true);
            $table->string('last_latitude')->nullable();
            $table->string('last_longitude')->nullable();
            $table->string('flat_number')->nullable();
            $table->boolean('first_login')->default(false);
            $table->boolean('active')->default(false);
            $table->string('device_token')->nullable()->unique();
            $table->float('wallet_balance')->default(0);
            $table->string('stripe_customer_id')->nullable()->unique();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
