<?php

use Illuminate\Support\Str;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->string('slug')->unique();
            $table->string('cover')->nullable();
            $table->timestamps();
        });

        // For testing only
        DB::table('categories')->insert(
            [
                [
                    'name' => 'Ilmu Pengetahuan Alam',
                    'code' => 'IPA',
                    'slug' => Str::slug('Ilmu Pengetahuan Alam', '-')
                ],
                [
                    'name' => 'Ilmu Pengetahuan Sosial',
                    'code' => 'IPS',
                    'slug' => Str::slug('Ilmu Pengetahuan Sosial', '-')
                ],
                [
                    'name' => 'Matematika',
                    'code' => 'MTK',
                    'slug' => Str::slug('Matematika', '-')
                ],
                [
                    'name' => 'Bahasa Inggris',
                    'code' => 'BING',
                    'slug' => Str::slug('Bahasa Inggris', '-')
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
