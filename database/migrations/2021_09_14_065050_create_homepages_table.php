<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pages_id')->nullable()->constrained();

            $table->string('banner_background_image')->nullable();
            $table->string('banner_badge_image')->nullable();
            $table->string('main_banner_heading')->nullable();
            $table->string('banner_heading')->nullable();
            $table->string('banner_sub_heading')->nullable();
            $table->string('content1_heading')->nullable();
            $table->longText('content1_text')->nullable();
            $table->string('content1_image')->nullable();
            $table->string('content2_heading')->nullable();
            $table->longText('content2_text')->nullable();
            $table->string('content2_image')->nullable();
            $table->string('content3_heading')->nullable();
            $table->longText('content3_text')->nullable();
            $table->string('content3_image')->nullable();
            $table->string('content2_option_heading1')->nullable();
            $table->longText('content2_option_text1')->nullable();
            $table->string('content2_option_image1')->nullable();
            $table->string('content2_option_image2')->nullable();
            $table->string('content2_option_heading2')->nullable();
            $table->longText('content2_option_text2')->nullable();
            $table->string('content2_option_image22')->nullable();
            $table->string('content2_option_image3')->nullable();
            $table->string('content2_option_image4')->nullable();
            $table->string('content2_option_image5')->nullable();
            $table->string('content2_option_image6')->nullable();
            $table->string('content2_option_image7')->nullable();
            $table->string('logo')->nullable();

            $table->string('content2_option_image8')->nullable();
            $table->string('content2_option_image9')->nullable();
            $table->string('content2_option_image10')->nullable();
            $table->string('banner_main_image')->nullable();
            $table->string('banner_setup_image')->nullable();
            $table->string('setup_image')->nullable();
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('homepages');
    }
}
