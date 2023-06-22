<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $result['users'] = User::where('role','student')->orderBy('created_at','ASC')->get();
            return view('backend.teacher.student.index',$result);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('backend.teacher.student.add');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|unique:users|max:255',
                'name' => 'required',
                'password' => 'required',
            ]);

            $user = new User();
            $user->role = 'student';
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            Session::flash('success','Student has been added successfully!');
            return redirect()->route('student.index');
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $result['user'] = User::find($id);
            return view('backend.teacher.student.view',$result);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $result['user'] = User::find($id);
            return view('backend.teacher.student.edit',$result);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'email' => 'required |max:255',
                'name' => 'required',
                'role' => 'required',
            ]);

            $user = User::find($id);
            $user->role = $request->role;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->update();

            Session::flash('success','Student has been updated successfully!');
            return redirect()->route('student.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::find($id);
            if($user){
                $user->delete();
            }
            Session::flash('success','Student has been deleted successfully!');
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
