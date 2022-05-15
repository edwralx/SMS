<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = student::latest()->paginate(5);
        return view('students.index',compact('students'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = teacher::all();
        $student = new student();
        return view('students.create', compact('teachers', 'student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        student::create($this->validateRequest());

        return redirect()->route('students.index')
                        ->with('success','Student added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        $teachers = teacher::all();
        return view('students.edit', compact('student', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
        $student->update($this->validateRequest());

        return redirect()->route('students.index')
        ->with('success','Student record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
                        ->with('success','Student record deleted successfully.');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name'          => 'required',
            'age'           => 'required|numeric|between:10,99',
            'gender'        => 'required',
            'teacher_id'    => 'required'
        ]);
    }
}
