<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.back.subject.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = new Subject();
        $option = Subject::pluck('subject', 'id')->all();
        return view('pages.back.subject._create', compact('subject', 'option'));
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
            'subject' => 'required|min:3'
        ]);
        $request['slug'] = str_slug($request->subject, '-');
        return Subject::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return view('pages.back.subject._show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $option = Subject::pluck('subject', 'id')->all();
        return view('pages.back.subject._create', compact('subject', 'option'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $this->validate($request, [
            'subject' => 'required|min:3'
        ]);

        $request['slug'] = str_slug($request->subject, '-');
        $subject->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Update Successful' 
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return response()->json([
            'success' => true,
            'message' => 'Delete Successful'
        ]);
    }

    public function subjectData()
    {
        $subject = Subject::all();
        return Datatables::of($subject)
                ->addColumn('action', function ($subject) {
                    return view('layouts.back.partials._action', [
                        'model' => $subject,
                        'edit_url' => route('admin.subject.edit', $subject->id),
                        'show_url' => route('admin.subject.show', $subject->id),
                        'delete_url' => route('admin.subject.destroy', $subject->id),
                    ]);
                })
                ->make(true);
    }
}
