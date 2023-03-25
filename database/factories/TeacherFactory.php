<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
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
            'name' => fake()->name(),
            'subject' => $subjects[mt_rand(0, count($subjects)-1)],
            'exam' => ['ОГЭ', 'ЕГЭ'][mt_rand(0, 1)],
            'age' => mt_rand(20, 30),
            'photo' => 'https://source.unsplash.com/random',
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, nam beatae. Deserunt maxime, officia et ullam temporibus unde quia recusandae dicta perferendis? Quos, tempora quae, a asperiores, ea nemo aperiam dignissimos ut sequi quasi suscipit. Consequatur, et repellendus laboriosam magnam quisquam ipsam impedit, velit porro nostrum temporibus nobis, dolor adipisci! Voluptatum, quaerat! Id facere amet voluptate omnis. Perferendis tempore rerum, perspiciatis, labore facilis voluptatum aperiam neque odio quis sunt vitae in facere aut eveniet dicta fugiat tenetur corrupti velit possimus minus dolores beatae molestias blanditiis nisi. Quam voluptatem deleniti iusto dolorum nisi enim. Molestias sunt explicabo eos neque, alias dolore!',
        ];
    }
}
