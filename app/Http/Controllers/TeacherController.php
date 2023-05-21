<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\TeachersFormRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subject = 'все')
    {
        if ($subject == 'все') {
            $teachers = Teacher::all()
                ->sortBy('name');
        } else {
            $teachers = Teacher::all()
            ->where('subject', $subject)
                ->sortBy('name');
        }

        $subjects = [
            'все', 'биология', 'базовая математика', 'русский язык',
            'английский язык', 'химия', 'литература', 'история', 'физика',
            'информатика', 'профильная математика', 'география', 'обществознание'
        ];

        return view('teachers.index', [
            'teachers' => $teachers,
            'subjects' => $subjects,
            'selected_subject' => $subject,
            'leftbar' => 'off',
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
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }


    public function teachers_form_process(TeachersFormRequest $request)
    {
        $subject = $request->validated()['subject'];

        return redirect(route('teachers.index', $subject));
    }
}
