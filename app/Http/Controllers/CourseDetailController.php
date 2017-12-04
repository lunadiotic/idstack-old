<?php

namespace App\Http\Controllers;

use App\Models\CourseDetail;
use Illuminate\Http\Request;

class CourseDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detail = new CourseDetail();
        return view('pages.back.course.detail._form', compact('detail'));
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
            'course_id' => 'required',
            'title' => 'required|string|min:5|unique:courses',
            'desc' => 'required|min:15',
            'iframe' => 'required',
        ]);

        $request['slug'] = str_slug($request->title);

        CourseDetail::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Created Successful'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseDetail  $courseDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CourseDetail $courseDetail)
    {
        dd($courseDetail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseDetail  $courseDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = CourseDetail::findOrFail($id);
        return view('pages.back.course.detail._form', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseDetail  $courseDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'course_id' => 'required',
            'title' => 'required|string|min:5|unique:courses,title,' . $id,
            'desc' => 'required|min:15',
            'iframe' => 'required',
        ]);

        $request['slug'] = str_slug($request->title);
        $courseDetail = CourseDetail::findOrFail($id);
        $courseDetail->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Updated Successful'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseDetail  $courseDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courseDetail = CourseDetail::findOrFail($id);
        $courseDetail->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted Successful'
        ]);
    }
}
