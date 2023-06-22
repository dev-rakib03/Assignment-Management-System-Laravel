<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $result['assignments'] = Assignment::where('user_id',Auth::user()->id)->orderBy('created_at','ASC')->get();
            return view('backend.teacher.assignment.index',$result);
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
            $result['classes'] = Classes::orderBy('created_at','ASC')->get();
            return view('backend.teacher.assignment.add',$result);
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
                'class' => 'required',
                'section' => 'required',
                'title' => 'required',
                'description' => 'required',
                'last_date' => 'required',
                'status' => 'required',
            ]);
            $class_subject=json_decode($request->class);
            $class = $class_subject[0];
            $subject = $class_subject[1];

            $assignment = new Assignment();
            $assignment->user_id = Auth::user()->id;
            $assignment->class = $class;
            $assignment->subject = $subject;
            $assignment->section = $request->section;
            $assignment->title = $request->title;
            $assignment->description = $request->description;
            $assignment->last_date = $request->last_date;
            $assignment->status = $request->status;
            $assignment->save();

            Session::flash('success','Assignment has been added successfully!');
            return redirect()->route('assignment.index');
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
            $result['assignment'] = Assignment::find($id);
            return view('backend.teacher.assignment.view',$result);
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
            $result['classes'] = Classes::orderBy('created_at','ASC')->get();
            $result['assignment'] = Assignment::find($id);
            return view('backend.teacher.assignment.edit',$result);
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
                'class' => 'required',
                'section' => 'required',
                'title' => 'required',
                'description' => 'required',
                'last_date' => 'required',
                'status' => 'required',
            ]);
            $class_subject=json_decode($request->class);
            $class = $class_subject[0];
            $subject = $class_subject[1];

            $assignment = Assignment::find($id);
            $assignment->class = $class;
            $assignment->subject = $subject;
            $assignment->section = $request->section;
            $assignment->title = $request->title;
            $assignment->description = $request->description;
            $assignment->last_date = $request->last_date;
            $assignment->status = $request->status;
            $assignment->update();

            Session::flash('success','Assignment has been updated successfully!');
            return redirect()->route('assignment.index');
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
            $assignment = Assignment::find($id);
            if($assignment){
                $assignment->delete();
            }
            Session::flash('success','Assignment has been deleted successfully!');
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
