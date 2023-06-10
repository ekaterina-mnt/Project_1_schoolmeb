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
            'https://www.youtube.com/embed/QzdovKFkXSo',
            'https://www.youtube.com/embed/z22tv0jjr94',
            'https://www.youtube.com/embed/BZJdfwRtNR8',
            'https://www.youtube.com/embed/xjjpTuG9GyU',
            'https://www.youtube.com/embed/xFfm7YkOcgI',
            'https://www.youtube.com/embed/sHCfC0v73ks',
            'https://www.youtube.com/embed/OyFIKIAVeLA',
            'https://www.youtube.com/embed/JAG6un72w8U',
            'https://www.youtube.com/embed/7gRuubWSAUU',
            'https://www.youtube.com/embed/syp6Lsd8HOo',
            'https://www.youtube.com/embed/6H-PLF2CR18',
            'https://www.youtube.com/embed/YJzFDzAqdNA',
            'https://www.youtube.com/embed/3C_KO2Fmqes',
            'https://www.youtube.com/embed/c3suauAz0zQ',
            'https://www.youtube.com/embed/XTRanAwMZ7c',
            'https://www.youtube.com/embed/EJU90JyRxIA',
            'https://www.youtube.com/embed/VsTY-kyp2Js',
            'https://www.youtube.com/embed/AUZJp8LQZ3U',
            'https://www.youtube.com/embed/5Mgb4bzU3hs',
            'https://www.youtube.com/embed/7YmNvCy30FU',
        ];

        $prices = [1090, 2900, 3900, 4500];

        $i = 1; //subject_id === teacher_id по логике кода в TeacherSeeder, 
        // аналогично и здесь - чтобы сохранялась логическая связь преподаватель-предмет-курс

        foreach ($videos as $key => $video) {
            $el = explode('/', $video);
            $youtube_id = $el[4];
            $img_src = "https://i.ytimg.com/vi/" . $youtube_id . "/maxresdefault.jpg";

            if ($i > 9) {
                $i = 1;
            }

            DB::table('courses')->insert([
                'title' => Str::random(10),
                'subject_id' => $i,
                'price' => $prices[mt_rand(0, 3)],
                'exam_type' => ['ОГЭ', 'ЕГЭ'][mt_rand(0, 1)],
                'about_course' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, qui...',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa officiis doloribus fugiat architecto, illum labore laudantium non veritatis iure libero voluptates minima saepe odio ut, consectetur nihil eum. Enim, odit voluptate. Earum consequatur quidem minima doloribus cupiditate vel, expedita ex praesentium esse, adipisci dicta aperiam quibusdam fugit? Animi, id nostrum.',
                'teacher_id' => $i,
                'num_students' => 0,
                'video_src' => $video,
                'img_src' => $img_src,
            ]);
            $i++;
        }
    }
}
