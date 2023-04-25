<?php

use Illuminate\Support\Facades\DB;
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
            $table->id();
            $table->boolean('is_admin')->default(false);
            $table->string('email')->unique();
            $table->string('full_name');
            $table->string('avatar')->nullable();
            $table->string('born_date')->nullable();
            $table->string('number')->nullable();
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // For testing only
        DB::table('users')->insert(
            [
                [
                    'is_admin' => true,
                    'full_name' => 'Putu Wisnu Wirayuda Putra',
                    'email' => 'wisnuwirayuda15@gmail.com',
                    'gender' => 'Laki-laki',
                    'password' => bcrypt('12345678'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'is_admin' => false,
                    'full_name' => 'user',
                    'email' => 'user@gmail.com',
                    'gender' => 'Laki-laki',
                    'password' => bcrypt('user1234'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
