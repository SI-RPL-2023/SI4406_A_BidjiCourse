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

        for ($x = 1; $x <= 10; $x++) {
            $user = User::create(
                [
                    'is_admin' => false,
                    'full_name' => $faker->name(),
                    'email' => $faker->freeEmail(),
                    'gender' => $faker->randomElement(['Laki-Laki', 'Perempuan']),
                    'password' => bcrypt('123'),
                ]
            );
            // $seed = $user->id;
            // $avatar_url = "https://api.dicebear.com/6.x/avataaars/png?seed=$seed&backgroundColor=b6e3f4,c0aede,d1d4f9,ffdfbf,ffd5dc&backgroundType=gradientLinear&accessoriesProbability=25";
            // $avatar = file_get_contents($avatar_url);
            // $avatar_file_name = "$seed.png";
            // $avatar_file_path = public_path('img/avatars/' . $avatar_file_name);
            // file_put_contents($avatar_file_path, $avatar);
            // $user->update(['avatar' => '/img/avatars/' . $avatar_file_name]);
        }

        for ($x = 1; $x <= 10; $x++) {
            DB::table('categories')->insert([
                [
                    'name' => "Mata Pelajaran $x",
                    'code' => strtoupper($faker->lexify()),
                    'slug' => Str::slug("Mata Pelajaran $x"),
                    'added_by' => $faker->name(),
                    'last_edited_by' => $faker->name(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        for ($x = 1; $x <= 10; $x++) {
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
                    'added_by' => $faker->name(),
                    'last_edited_by' => $faker->name(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);


            $quiz = Quiz::create([
                'name' => "Quiz $x",
                'status' => 'Published',//$faker->randomElement(['Published', 'Draft']),
                'course_id' => $x,
                'time_limit' => $x % 2 ? $faker->numberBetween(1000, 2000) : null,
                'added_by' => $faker->name(),
                'last_edited_by' => $faker->name(),
            ]);
            for ($i = 1; $i <= 10; $i++) {
                $question = QuizQuestion::create([
                    // 'number' => $i,
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
