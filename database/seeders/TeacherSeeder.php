<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        $photos = [
            'ariana_grande.jpg', 'bojack.jpg', 'dua_lipa.png', 'jonny_depp.jpg',
            'oleg_lsp.jpg', 'pyrokinesis.jpg', 'rick.jpeg', 'chester.jpg', 'skriptonit.jpg'
        ];

        foreach ($photos as $key => $photo) {
            DB::table('teachers')->insert([
                'name' => fake()->name(),
                'subject_id' => $key+1,
                'exam' => ['ОГЭ', 'ЕГЭ'][mt_rand(0, 1)],
                'age' => mt_rand(20, 30),
                'photo' => "/storage/teachers/$photo",
                'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, nam beatae. Deserunt maxime, officia et ullam temporibus unde quia recusandae dicta perferendis? Quos, tempora quae, a asperiores, ea nemo aperiam dignissimos ut sequi quasi suscipit. Consequatur, et repellendus laboriosam magnam quisquam ipsam impedit, velit porro nostrum temporibus nobis, dolor adipisci! Voluptatum, quaerat! Id facere amet voluptate omnis. Perferendis tempore rerum, perspiciatis, labore facilis voluptatum aperiam neque odio quis sunt vitae in facere aut eveniet dicta fugiat tenetur corrupti velit possimus minus dolores beatae molestias blanditiis nisi. Quam voluptatem deleniti iusto dolorum nisi enim. Molestias sunt explicabo eos neque, alias dolore!',
            ]);
        }
    }
}
