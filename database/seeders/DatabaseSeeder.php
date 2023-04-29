<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Quiz;
use App\Models\User;
use App\Models\QuizAnswer;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\QuizQuestion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $faker = Faker::create('id_ID');

        User::create(
            [
                'is_admin' => true,
                'full_name' => 'Putu Wisnu Wirayuda Putra',
                'email' => 'wisnuwirayuda15@gmail.com',
                'gender' => 'Laki-laki',
                'password' => bcrypt('12345678'),
            ]
        );
        User::create(
            [
                'is_admin' => false,
                'full_name' => 'user',
                'email' => 'user@gmail.com',
                'gender' => 'Laki-laki',
                'password' => bcrypt('user1234'),
            ]
        );

        DB::table('categories')->insert([
            [
                'name' => 'Ilmu Pengetahuan Alam',
                'code' => 'IPA',
                'slug' => Str::slug('Ilmu Pengetahuan Alam')
            ],
            [
                'name' => 'Ilmu Pengetahuan Sosial',
                'code' => 'IPS',
                'slug' => Str::slug('Ilmu Pengetahuan Sosial')
            ],
            [
                'name' => 'Matematika',
                'code' => 'MTK',
                'slug' => Str::slug('Matematika')
            ],
            [
                'name' => 'Bahasa Inggris',
                'code' => 'BING',
                'slug' => Str::slug('Bahasa Inggris')
            ],
            [
                'name' => 'Bahasa Indonesia',
                'code' => 'BIND',
                'slug' => Str::slug('Bahasa Indonesia')
            ],
            [
                'name' => 'Sejarah',
                'code' => 'SEJ',
                'slug' => Str::slug('Sejarah')
            ],
            [
                'name' => 'Seni Budaya',
                'code' => 'SNB',
                'slug' => Str::slug('Seni Budaya')
            ],
            [
                'name' => 'Pendidikan Agama',
                'code' => 'PAI',
                'slug' => Str::slug('Pendidikan Agama')
            ],
            [
                'name' => 'Pendidikan Jasmani',
                'code' => 'PJOK',
                'slug' => Str::slug('Pendidikan Jasmani')
            ],
            [
                'name' => 'Kewarganegaraan',
                'code' => 'KWU',
                'slug' => Str::slug('Kewarganegaraan')
            ],
        ]);

        for ($x = 1; $x <= 5; $x++) {
            $category = $faker->numberBetween(1, 10);
            DB::table('courses')->insert([
                [
                    'draft' => false,
                    'category_id' => $category,
                    'title' => "Course $x",
                    'slug' => "course-$x",
                    'cover' => "https://picsum.photos/640/360?random=$x",
                    'desc' => "Course Description $x",
                    'body' => $faker->text($faker->numberBetween(1000, 3000)),
                    'rating' => $faker->numberBetween(1, 5),
                    'rating_total' => $faker->numberBetween(50, 100),
                    'last_edited_by' => $faker->name(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);


            $quiz = Quiz::create([
                'name' => "Quiz $x",
                'course_id' => $x,
                'category_id' => $category,
                'time_limit' => $faker->numberBetween(1000, 2000)
            ]);
            for ($i = 1; $i <= 10; $i++) {
                $question = QuizQuestion::create([
                    'number' => $i,
                    'quiz_id' => $quiz->id,
                    'question' => $faker->text(100),
                    'answer_explanation' => $faker->text(200),
                ]);
                for ($j = 1; $j <= 4; $j++) {
                    $exist = QuizAnswer::where('quiz_question_id', $question->id)->where('is_correct', 1)->exists();
                    $correct = $faker->numberBetween(0, 1);
                    if ($exist) {
                        $correct = 0;
                    } elseif (!$exist && $j == 4) { //jika belum ada jawaban benar, jawaban ke 4 dibuat benar
                        $correct = 1;
                    }
                    QuizAnswer::create([
                        'quiz_question_id' => $question->id,
                        'answer' => $faker->text(50),
                        'is_correct' => $correct,
                    ]);
                }
            }
        }
    }
}
