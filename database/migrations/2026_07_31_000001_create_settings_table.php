<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('portfolio_name')->nullable();
            $table->string('portfolio_image')->nullable();
            $table->string('favicon')->nullable();
            $table->string('seo_image')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('keywords')->nullable();
            $table->boolean('is_captcha_enable')->default(false);
            $table->string('captcha_key')->nullable();
            $table->string('captcha_secret')->nullable();
            $table->string('certificate_title')->nullable();
            $table->string('certificate_issuer')->nullable();
            $table->string('certificate_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
