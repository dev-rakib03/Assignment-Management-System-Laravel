<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\SubmittedAssignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SubmittedAssignmentTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $result['submittedassignments'] = SubmittedAssignment::where('teacher_id',Auth::user()->id)
            ->join('assignments','submitted_assignments.assignment_id','assignments.id')
            ->join('users','submitted_assignments.student_id','users.id')
            ->select('submitted_assignments.*','users.name as student_name','assignments.class','assignments.subject','assignments.section','assignments.title')
            ->orderBy('submitted_assignments.created_at','DESC')->get();
            return view('backend.teacher.submitted_assignment.index',$result);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'marks' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            ]);
            $assignment = SubmittedAssignment::find($id);
            $assignment->marks = $request->marks;
            $assignment->update();

            Session::flash('success','Assignment has been updated successfully!');
            return redirect()->route('teacher.submitted.assignment.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
