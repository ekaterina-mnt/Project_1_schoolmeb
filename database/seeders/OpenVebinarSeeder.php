<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpenVebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('openvebinars')->insert([
            'title' => 'veb1',
            'video_src' => 'https://www.youtube.com/embed/CLeZyIID9Bo',
        ]);
        
        DB::table('openvebinars')->insert([
            'title' => 'veb2',
            'video_src' => 'https://www.youtube.com/embed/zEZqqGizlRw',
        ]);

        DB::table('openvebinars')->insert([
            'title' => 'veb3',
            'video_src' => 'https://www.youtube.com/embed/iicfmXFALM8',
        ]);
        
        DB::table('openvebinars')->insert([
            'title' => 'veb4',
            'video_src' => 'https://www.youtube.com/embed/hGrIgIfCxP0',
        ]);
        
        DB::table('openvebinars')->insert([
            'title' => 'veb5',
            'video_src' => 'https://www.youtube.com/embed/62d2QvWAVt4',
        ]);
        
        DB::table('openvebinars')->insert([
            'title' => 'veb6',
            'video_src' => 'https://www.youtube.com/embed/techmgGVOhk',
        ]);
        
        DB::table('openvebinars')->insert([
            'title' => 'veb7',
            'video_src' => 'https://www.youtube.com/embed/qUFOe63SdHs',
        ]);
        
        DB::table('openvebinars')->insert([
            'title' => 'veb8',
            'video_src' => 'https://www.youtube.com/embed/NpQbEadBq_w',
        ]);
        
        DB::table('openvebinars')->insert([
            'title' => 'veb9',
            'video_src' => 'https://www.youtube.com/embed/TaINndH-bZ0',
        ]);
        
        DB::table('openvebinars')->insert([
            'title' => 'veb10',
            'video_src' => 'https://www.youtube.com/embed/oaIJNOqY1oQ',
        ]);
    }
}
