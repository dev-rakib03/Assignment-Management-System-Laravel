<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\SubmittedAssignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SubmittedAssignmentStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $result['submittedassignments'] = SubmittedAssignment::where('student_id',Auth::user()->id)
            ->join('assignments','submitted_assignments.assignment_id','assignments.id')
            ->join('users','submitted_assignments.teacher_id','users.id')
            ->select('submitted_assignments.*','users.name as teacher_name','assignments.class','assignments.subject','assignments.section','assignments.title')
            ->orderBy('submitted_assignments.created_at','DESC')->get();
            return view('backend.student.submitted_assignment.index',$result);
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
        try {
            $request->validate([
                'assignment_file' => 'required|mimes:pdf|max:2048' // Validate as PDF file with max size of 2MB
            ]);

            if ($request->hasFile('assignment_file')) {
                $file = $request->file('assignment_file');
                $fileName = $file->hashName();
                $filePath = $file->storeAs('public/assignments', $fileName);
                $fileUrl = Storage::url($filePath);

                $assignment = new SubmittedAssignment();
                $assignment->student_id = Auth::user()->id;
                $assignment->teacher_id = $request->teacher_id;
                $assignment->assignment_id = $request->assignment_id;
                $assignment->file_link = $fileUrl;
                $assignment->save();

                Session::flash('success','Assignment has been submitted successfully!');
                return redirect()->route('student.submitted.assignment.index');
            }
            Session::flash('danger','Assignment submission failed!');
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
