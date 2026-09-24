<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->default('Fauzi Agus Budiman');
            $table->string('headline')->default('Fresh Graduate S1 Teknik Informatika');
            $table->string('sub_headline')->nullable()->default('Universitas Suryakancana, Cianjur');
            $table->text('bio')->nullable();
            $table->longText('about_text')->nullable();
            $table->string('avatar')->nullable();
            $table->string('cv_file')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('location')->nullable()->default('Cianjur, Jawa Barat');
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
