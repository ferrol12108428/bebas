<?php

namespace App\Http\Controllers;

use App\Models\Student;
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
        // pke GET
        $data = Student::get();

        return view('index')
        ->with('data', $data);

        // pke COMPACT
        // $data = Student::all();

        //return view('index',
        //compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'nis'=>'required',
           'nama' => 'required',
           'JK' => 'required',
           'umur' => 'required'
        ]);

        Student::create($request->all());

        return redirect()->route('index')
        ->with('success', 'Data berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = Student::where('id',$id)->get();
        // dd($data);
        $data = Student::where('id', '=', $id)->firstOrFail();
        return view('edit')
        ->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'JK' => 'required',
            'umur' => 'required'
        ]);

        Student::where('id', '=', $id)->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'JK' => $request->JK,
            'umur' => $request->umur
        ]);

        return redirect()->route('index')
        ->with('edited', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::where('id',$id)->delete();
        return redirect(route('index'))
        ->with('failed', 'Data berhasil dihapus');
    }
}
