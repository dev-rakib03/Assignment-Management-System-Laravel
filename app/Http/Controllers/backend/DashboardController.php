<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function teacherindex(){
        try {
            return view('backend.teacher.dashboard.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function studentindex(){
        try {
            return view('backend.student.dashboard.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
