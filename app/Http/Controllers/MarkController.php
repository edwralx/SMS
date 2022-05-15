<?php

namespace App\Http\Controllers;

use App\Models\mark;
use App\Models\student;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = mark::latest()->paginate(5);
        return view('marks.index',compact('marks'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = student::all();
        $mark = new mark();
        return view('marks.create', compact('students', 'mark'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        mark::create($this->validateRequest());

        return redirect()->route('marks.index')
                        ->with('success','Marks added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function show(mark $mark)
    {
        return view('marks.show', compact('mark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function edit(mark $mark)
    {
        $students = student::all();
        return view('marks.edit', compact('mark', 'students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mark $mark)
    {
        $mark->update($this->validateRequest());

        return redirect()->route('marks.index')
        ->with('success','Marks updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy(mark $mark)
    {
        $mark->delete();

        return redirect()->route('marks.index')
                        ->with('success','Record deleted successfully.');
    }

    private function validateRequest()
    {
        return request()->validate([
            'student_id'    => 'required',
            'maths'         => 'required|numeric|between:0,100',
            'science'       => 'required|numeric|between:0,100',
            'history'       => 'required|numeric|between:0,100',
            'term'          => 'required',
        ]);
    }
}
