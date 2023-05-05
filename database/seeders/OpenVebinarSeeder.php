<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OpenVebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $videos = [
            'https://www.youtube.com/embed/CLeZyIID9Bo',
            'https://www.youtube.com/embed/zEZqqGizlRw',
            'https://www.youtube.com/embed/iicfmXFALM8',
            'https://www.youtube.com/embed/hGrIgIfCxP0',
            'https://www.youtube.com/embed/62d2QvWAVt4',
            'https://www.youtube.com/embed/techmgGVOhk',
            'https://www.youtube.com/embed/qUFOe63SdHs',
            'https://www.youtube.com/embed/NpQbEadBq_w',
            'https://www.youtube.com/embed/TaINndH-bZ0',
            'https://www.youtube.com/embed/oaIJNOqY1oQ',
            'https://www.youtube.com/embed/C1m9dX5dSnk',
            'https://www.youtube.com/embed/9jbi7XdFV5o',
            'https://www.youtube.com/embed/GSQXbXNDgOs',
            'https://www.youtube.com/embed/dP95z1QgnXk',
            'https://www.youtube.com/embed/r6tdTqQDTy0',
        ];

        foreach ($videos as $i => $video) {
            DB::table('open_vebinars')->insert([
                'title' => Str::random(10),
                'cover' => '/storage/open_vebinars/open_vebinar_cover.jpg',
                'video_src' => $video,
            ]);
        }
    }
}
