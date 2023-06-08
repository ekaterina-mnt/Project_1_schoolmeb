<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursesFormRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Teacher;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($exam_type = 'все', $subject = 'все предметы')
    {
        if (($exam_type == 'все') and ($subject == 'все предметы')) {
            $courses = Course::paginate(5);
        } elseif ($exam_type == 'все') {
            $courses = Course::where('subject', $subject)->paginate(5);
        } elseif ($subject == 'все предметы') {
            $courses = Course::where('exam_type', $exam_type)->paginate(5);
        } else {
            $courses = Course::where(['exam_type' => $exam_type, 'subject' => $subject])->paginate(5);
        }

        $subjects = [
            'все предметы', 'биология', 'базовая математика', 'русский язык',
            'английский язык', 'химия', 'литература', 'история', 'физика',
            'информатика', 'профильная математика', 'география', 'обществознание'
        ];

        $sum = count($courses);

        $coursesInCartID = [];
        $coursesPaidID = [];

        if (auth()->user()) {
            foreach (auth()->user()->cart_courses as $course) {
                $coursesInCartID[] = $course->id;
            }
        
            foreach (auth()->user()->paid_courses as $course) {
                $coursesPaidID[] = $course->id;
            }
        }
    

        return view('courses.index', [
            'courses' => $courses,
            'coursesInCartID' => $coursesInCartID,
            'coursesPaidID' => $coursesPaidID,
            'subjects' => $subjects,
            'exam_type' => $exam_type,
            'selected_subject' => $subject,
            'sum' => $sum,
            'leftbar' => 'on',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($course_id)
    {
        $course = Course::findOrFail($course_id);
        return view('courses.show', [
            'course' => $course,
            'leftbar' => 'off',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    public function courses_form_process(CoursesFormRequest $request)
    {
        $exam_type = $request->validated()['exam_type'];
        $subject = $request['subject'];

        return redirect(route('courses.index', ['exam_type' => $exam_type, 'subject' => $subject]));
    }
}
