<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;
use App\Http\Requests\AddCourseFormRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(10);
        return view('admin.courses.index')->with([
            'courses' => $courses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = [
            'биология', 'базовая математика', 'русский язык',
            'английский язык', 'химия', 'литература', 'история', 'физика',
            'информатика', 'профильная математика', 'география', 'обществознание'
        ];

        $teachers = Teacher::all();

        return view('admin.courses.create')->with([
            'subjects' => $subjects,
            'teachers' => $teachers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCourseFormRequest $request)
    {
        Course::create($request->validated());
        return redirect(route('admin.courses.index'))->with('flash', "Вы успешно добавили новый курс!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $subjects = [
            'биология', 'базовая математика', 'русский язык',
            'английский язык', 'химия', 'литература', 'история', 'физика',
            'информатика', 'профильная математика', 'география', 'обществознание'
        ];

        $teachers = Teacher::all();

        return view('admin.courses.edit', [
            'course' => $course,
            'subjects' => $subjects,
            'teachers' => $teachers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddCourseFormRequest $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($request->validated());

        return redirect(route('admin.courses.index'))->with('flash', 'Изменения были успешно добавлены!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::destroy($id);
        return redirect(route('admin.courses.index'))->with('flash', 'Вы успешно удалили курс!');
    }
}
