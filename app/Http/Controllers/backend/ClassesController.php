<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $result['classes'] = Classes::orderBy('created_at','ASC')->get();
            return view('backend.teacher.classes.index',$result);
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
            return view('backend.teacher.classes.add');
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
                'class_name' => 'required|unique:classes|max:255',
                'subject' => 'required',
            ]);

            $user = new Classes();
            $user->class_name = $request->class_name;
            $user->subjects = json_encode($request->subject);
            $user->save();

            Session::flash('success','Class has been added successfully!');
            return redirect()->route('class.index');
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
            $result['class'] = Classes::find($id);
            return view('backend.teacher.classes.view',$result);
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
            $result['class'] = Classes::find($id);
            return view('backend.teacher.classes.edit',$result);
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
                'class_name' => 'required|max:255',
                'subject' => 'required',
            ]);

            $user = Classes::find($id);
            $user->class_name = $request->class_name;
            $user->subjects = json_encode($request->subject);
            $user->update();

            Session::flash('success','Class has been updated successfully!');
            return redirect()->route('class.index');
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
            $class = Classes::find($id);
            if($class){
                $class->delete();
            }
            Session::flash('success','Class has been deleted successfully!');
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
