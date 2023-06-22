<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\SubmittedAssignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $result['assignments'] = Assignment::where('status','active')->orderBy('created_at','DESC')->get();
            $result['submittedassignments'] = SubmittedAssignment::get();
            return view('backend.student.assignment.index',$result);
        } catch (\Throwable $th) {
            throw $th;
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
        try {
            $result['assignment'] = Assignment::where('status','active')->find($id);
            $result['submittedassignments'] = SubmittedAssignment::get();
            return view('backend.student.assignment.view',$result);
        } catch (\Throwable $th) {
            //throw $th;
        }
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
