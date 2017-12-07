<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.back.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $role = [
            'admin' => 'Admin',
            'instructor' => 'Instructor',
            'member' => 'member'
        ];
        return view('pages.back.user._form', compact('user', 'role'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'role' => 'required',
            'image' => 'required'
        ]);

        $request['x'] = $request->password;
        User::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Created Successful'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('pages.back.user._show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $role = [
            'admin' => 'Admin',
            'instructor' => 'Instructor',
            'member' => 'member'
        ];
        return view('pages.back.user._form', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'role' => 'required',
            'image' => 'required'
        ]);

        $user = User::findOrFail($id);
        if ($request->password) {
            $request['password'] = bcrypt($request->password);
            $request['x'] = $request->password;
        } else {
            $request['password'] = $user->password;
        }
        $user->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Updated Successful'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted Successful'
        ]);
    }

    public function userData()
    {
        $user = User::all();
        return Datatables::of($user)
            ->addColumn('action', function ($user) {
                return view('layouts.back.partials._action', [
                    'model' => $user,
                    'edit_url' => route('admin.user.edit', $user->id),
                    'show_url' => route('admin.user.show', $user->id),
                    'delete_url' => route('admin.user.destroy', $user->id),
                ]);
            })
            ->make(true);
    }
}
