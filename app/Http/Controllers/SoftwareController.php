<?php

namespace App\Http\Controllers;

use App\Models\Software;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.back.software.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $software = new Software();
        return view('pages.back.software._form', compact('software'));
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
            'software' => 'required|min:3|unique:software'
        ]);

        Software::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Created Successful'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function show(Software $software)
    {
        return view('pages.back.software._show', compact('software'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function edit(Software $software)
    {
        return view('pages.back.software._form', compact('software'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Software $software)
    {
        $this->validate($request, [
            'software' => 'required|min:3|unique:software,software,'.$software->id
        ]);

        $software->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Updated Successful'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function destroy(Software $software)
    {
        $software->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted Successful'
        ]);
    }

    public function softwareData()
    {
        $software = Software::all();
        return Datatables::of($software)
            ->addColumn('action', function ($software) {
                return view('layouts.back.partials._action', [
                    'model' => $software,
                    'edit_url' => route('admin.software.edit', $software->id),
                    'show_url' => route('admin.software.show', $software->id),
                    'delete_url' => route('admin.software.destroy', $software->id),
                ]);
            })
            ->make(true);
    }
}
