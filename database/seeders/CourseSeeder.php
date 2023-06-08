<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $videos = [
            'https://youtu.be/QzdovKFkXSo',
            'https://youtu.be/XTRanAwMZ7c',
            'https://youtu.be/BZJdfwRtNR8',
            'https://youtu.be/xjjpTuG9GyU',
            'https://youtu.be/xFfm7YkOcgI',
            'https://youtu.be/sHCfC0v73ks',
            'https://youtu.be/OyFIKIAVeLA',
            'https://youtu.be/JAG6un72w8U',
            'https://youtu.be/7gRuubWSAUU',
            'https://youtu.be/syp6Lsd8HOo',
            'https://youtu.be/6H-PLF2CR18',
            'https://youtu.be/YJzFDzAqdNA',
            'https://youtu.be/3C_KO2Fmqes',
            'https://youtu.be/c3suauAz0zQ',
            'https://youtu.be/z22tv0jjr94',
            'https://youtu.be/EJU90JyRxIA',
            'https://youtu.be/VsTY-kyp2Js',
            'https://youtu.be/AUZJp8LQZ3U',
            'https://youtu.be/5Mgb4bzU3hs',
            'https://youtu.be/7YmNvCy30FU',
        ];

        $subjects = ['биология', 'базовая математика', 'русский язык', 
        'английский язык', 'химия', 'литература', 'история', 'физика', 
        'информатика', 'профильная математика', 'география', 'обществознание'];

        $prices = [1090, 2900, 3900, 4500];

        foreach ($videos as $i => $video) {
            $el = explode('/', $video);
            $youtube_id = $el[3];
            $img_src = "https://i.ytimg.com/vi/" . $youtube_id . "/maxresdefault.jpg";

            DB::table('courses')->insert([
                'title' => Str::random(10),
                'subject' => $subjects[mt_rand(0, count($subjects) - 1)],
                'price' => $prices[mt_rand(0,3)],
                'exam_type' => ['ОГЭ', 'ЕГЭ'][mt_rand(0, 1)],
                'about_course' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, qui...',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus cupiditate accusantium ratione reprehenderit explicabo, vero nihil harum nulla, debitis laudantium animi possimus, ullam architecto rem ipsum ipsa quod similique sed eius molestiae voluptates. Architecto quisquam odio voluptatem, reprehenderit veniam aut optio, laboriosam ad quam ipsam incidunt nostrum earum illo facere autem similique ratione non quaerat. Dignissimos quam voluptates numquam, veritatis rerum voluptatum asperiores soluta animi blanditiis, id quisquam reprehenderit cumque aut eveniet quia facilis iusto autem adipisci consequuntur? Suscipit nulla aperiam dignissimos quasi ea beatae exercitationem reprehenderit quam ratione doloremque. Voluptatum velit expedita reprehenderit ea voluptatem doloribus debitis illo error!',
                'teacher_id' => mt_rand(1, 9),
                'num_students' => 0,
                'video_src' => $video,
                'img_src' => $img_src,
            ]);
        }
    }
}
