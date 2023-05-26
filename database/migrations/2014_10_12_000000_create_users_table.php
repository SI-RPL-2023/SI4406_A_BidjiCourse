<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->boolean('is_admin')->default(false);
            $table->string('email')->unique();
            $table->string('full_name');
            $table->string('avatar')->nullable();
            $table->string('born_date')->nullable();
            $table->string('number')->nullable();
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->enum('theme', [
                'default',
                'cerulean',
                'cosmo',
                'flatly',
                'journal',
                'lumen',
                'materia',
                'minty',
                'sandstone',
                'simplex',
                'sketchy',
                'spacelab',
                'united',
                'yeti',
                'zephyr'
            ])->default('default');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
