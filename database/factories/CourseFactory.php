<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $subjects = ['биология', 'базовая математика', 'русский язык', 
        'английский язык', 'химия', 'литература', 'история', 'физика', 
        'информатика', 'профильная математика', 'география', 'обществознание'];

        return [
            'title' => Str::random(10),
            'subject' => $subjects[mt_rand(0, count($subjects)-1)],
            'price' => mt_rand(1000, 4000),
            'exam_type' => ['ОГЭ', 'ЕГЭ'][mt_rand(0, 1)],
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus cupiditate accusantium ratione reprehenderit explicabo, vero nihil harum nulla, debitis laudantium animi possimus, ullam architecto rem ipsum ipsa quod similique sed eius molestiae voluptates. Architecto quisquam odio voluptatem, reprehenderit veniam aut optio, laboriosam ad quam ipsam incidunt nostrum earum illo facere autem similique ratione non quaerat. Dignissimos quam voluptates numquam, veritatis rerum voluptatum asperiores soluta animi blanditiis, id quisquam reprehenderit cumque aut eveniet quia facilis iusto autem adipisci consequuntur? Suscipit nulla aperiam dignissimos quasi ea beatae exercitationem reprehenderit quam ratione doloremque. Voluptatum velit expedita reprehenderit ea voluptatem doloribus debitis illo error!',
            'teacher_id' => mt_rand(0, 10),
            'num_students' => mt_rand(300, 1000),
            'poster' => '/storage/courses/course-poster.jpg',
        ];
    }
}
