<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function student()
    {
        $title = "Student List";
        $name = "Student 1";
        $grade = "Grade 1";
        $address = ["Bulacan", "Laguna"];
        return view('students.students', compact('title', 'name', 'grade', 'address'));
    }

    public function student_add()
    {
        return "Add";
    }

    public function student_edit()
    {
        return "Edit";
    }

    public function student_delete($id)
    {
        return "Delete";
    }
}
