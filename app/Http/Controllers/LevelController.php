<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.back.level.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $level = new Level();
        return view('pages.back.level._form', compact('level'));
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
            'level' => 'required|min:3|unique:levels'
        ]);

        Level::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Created Successful'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        return view('pages.back.level._show', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        return view('pages.back.level._form', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $this->validate($request, [
            'level' => 'required|min:3|unique:levels,level,' . $level->id
        ]);

        $level->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Updated Successful'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $level->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted Successful'
        ]);
    }

    public function levelData()
    {
        $level = Level::all();
        return Datatables::of($level)
            ->addColumn('action', function ($level) {
            return view('layouts.back.partials._action', [
                'model' => $level,
                'edit_url' => route('admin.level.edit', $level->id),
                'show_url' => route('admin.level.show', $level->id),
                'delete_url' => route('admin.level.destroy', $level->id),
            ]);
        })
            ->make(true);
    }
}
