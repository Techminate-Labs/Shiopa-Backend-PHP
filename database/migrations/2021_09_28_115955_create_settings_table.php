<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('tagline')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('currency')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('meta')->nullable();
            $table->text('keywords')->nullable();
            $table->string('store_url')->nullable();
            $table->string('admin_url')->nullable();
            $table->string('server_url')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
