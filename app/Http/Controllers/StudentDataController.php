<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentDataController extends Controller
{
    public function student_data()
    {
        $title = "Student List";
        $students = [
            [
                'studentName' => 'Bren Uy',
                'studentLevel' => 'Senior Programmer',
                'buttonType1' => 'primary',
                'buttonType2' => 'danger',
            ],
            [
                'studentName' => 'Rod Padilla',
                'studentLevel' => 'Junior Specialist',
                'buttonType1' => 'success',
                'buttonType2' => 'info',
            ],
            [
                'studentName' => 'Jude De Guzman',
                'studentLevel' => 'Senior Specialist',
                'buttonType1' => 'danger',
                'buttonType2' => 'secondary',
            ],
            [
                'studentName' => 'Joff De Vera',
                'studentLevel' => 'Junior Programmer',
                'buttonType1' => 'warning',
                'buttonType2' => 'disabled',
            ],
            [
                'studentName' => 'Cajer Caldo',
                'studentLevel' => 'Proctor',
                'buttonType1' => 'success',
                'buttonType2' => 'info',
            ],
            [
                'studentName' => 'Chester Francisco',
                'studentLevel' => 'Instructor',
                'buttonType1' => 'danger',
                'buttonType2' => 'warning',
            ],
        ];

        return view('students.studentscard', compact('students', 'title'));
    }

    public function index()
    {
        $title = "Student List";
        $books = DB::table('books')->get();
        return view('index', compact('books', 'title'));
    }

        public function student_add()
    {
        $title = "Student List";
        return view('students.student_add', compact('title'));
    }

    public function student_add1(Request $request)
    {
        DB::table('books')->insert([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'country_id' => $request->input('country_id'),
            'stocks' => $request->input('stocks'),
            'amount' => $request->input('amount'),
            'photo' => $request->input('photo'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->route('home')->with('title', 'Student added successfully!');
    }
}
