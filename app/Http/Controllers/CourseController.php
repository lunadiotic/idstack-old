<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.back.course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = new Course();
        $user = User::pluck('name', 'id');
        $level = Level::pluck('level', 'id');
        return view('pages.back.course._form', compact('course', 'user', 'level'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'level_id' => 'required',
            'title' => 'required|string|min:5|unique:courses',
            'desc' => 'required|min:15',
            'price' => 'required'
        ]);

        $request['slug'] = str_slug($request->title);

        Course::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Created Successful'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('pages.back.course._show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $user = User::pluck('name', 'id');
        $level = Level::pluck('level', 'id');
        return view('pages.back.course._form', compact('course', 'user', 'level'));
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
        $this->validate($request, [
            'user_id' => 'required',
            'level_id' => 'required',
            'title' => 'required|string|min:5|unique:courses,title,' . $course->id,
            'desc' => 'required|min:15',
            'price' => 'required'
        ]);

        $request['slug'] = str_slug($request->title);

        $course->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Updated Successful'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted Successful'
        ]);
    }

    public function courseData()
    {
        $course = Course::all();
        return Datatables::of($course)
            ->addColumn('user', function ($course) {
                return $course->user->name;
            })
            ->addColumn('level', function ($course) {
                return $course->level->level;
            })
            ->addColumn('action', function ($course) {
                return view('layouts.back.partials._action', [
                    'model' => $course,
                    'edit_url' => route('admin.course.edit', $course->id),
                    'show_url' => route('admin.course.show', $course->id),
                    'delete_url' => route('admin.course.destroy', $course->id),
                ]);
            })
            ->make(true);
    }
}
