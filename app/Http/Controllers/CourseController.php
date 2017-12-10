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
        $user = User::where('role', 'instructor')->pluck('name', 'id');
        $level = Level::orderBy('id')->pluck('level', 'id');
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

        $course = Course::create($request->all());
        $course->subjects()->sync($request->get('subjects'));
        $course->software()->sync($request->get('software'));

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
        $user = User::where('role', 'instructor')->pluck('name', 'id');
        $level = Level::orderBy('id')->pluck('level', 'id');
        return view('pages.back.course._form', compact('course', 'user', 'level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'level_id' => 'required',
            'title' => 'required|string|min:5|unique:courses,title,' . $id,
            'desc' => 'required|min:15',
            'price' => 'required'
        ]);

        $request['slug'] = str_slug($request->title);
        $course = Course::find($id);
        $course->update($request->all());

        if (count($request->get('subjects')) > 0) {
            $course->subjects()->sync($request->get('subjects'));
        } else {
            // No subjects set, detach all
            $course->subjects()->detach();
        }

        if (count($request->get('software')) > 0) {
            $course->software()->sync($request->get('software'));
        } else {
            // No software set, detach all
            $course->software()->detach();
        }

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
            ->addColumn('course', function ($course) {
                return str_limit($course->title, 50);
            })
            ->addColumn('detail', function ($course) {
                return '<a href="'. route('admin.course.lesson', $course->id) .'" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>';
            })
            ->addColumn('action', function ($course) {
                return view('layouts.back.partials._action', [
                    'model' => $course,
                    'edit_url' => route('admin.course.edit', $course->id),
                    'show_url' => route('admin.course.show', $course->id),
                    'delete_url' => route('admin.course.destroy', $course->id),
                ]);
            })
            ->rawColumns(['detail', 'action'])->make(true);
    }

    public function detail($id)
    {
        $course = Course::findOrFail($id);
        return view('pages.back.course.detail.index', compact('course'));
    }

    public function courseDetailData($id)
    {
        $course = Course::findOrFail($id);
        return Datatables::of($course->detail)
            ->addColumn('course', function ($course) {
                return $course->course->title;
            })
            ->addColumn('action', function ($course) {
                return '
                    <a href="' .route('admin.course.detail.show', $course->id). '" class="btn btn-info btn-sm show-data-modal" title="Show Data"><i class="glyphicon glyphicon-eye-open"></i>Show</a>
                    <a href="' .route('admin.course.detail.edit', $course->id). '" class="btn btn-primary btn-sm show-modal edit" title="Edit Data" id="' . $course->course->id . '"><i class="glyphicon glyphicon-edit"></i>Edit</a>
                    <a href="' .route('admin.course.detail.destroy', $course->id). '" class="btn btn-danger btn-sm show-modal-confirm"><i class="glyphicon glyphicon-trash" title="Delete Data"></i>Delete</a>
                    ';
            })->rawColumns(['action'])->make(true);
    }
}
