<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class StudyProgramController  extends Controller
{
    public function index(){
        $programs = StudyProgram::orderBy('id','desc')->paginate();
        
        return view('StudyProgram.index', compact('programs'));
    }

    public function create(){
        return view('StudyProgram.create');
    }

    public function store(Request $request){
        $request ->validate([
            'Name'=>'required',
            'Classroom'=>'required'
        ]);

        $program = new StudyProgram();
        $program->Name = $request ->Name;
        $program->Classroom = $request ->Classroom;
        $program->save();
        return redirect()->route('StudyProgram.show',$program);
    }

    public function show(StudyProgram $program){
        return view('StudyProgram.show', compact('program'));
    }

    public function edit(StudyProgram $program){
        return view('StudyProgram.edit', compact('program'));
    }

    public function update(Request $request,StudyProgram $program){
        $request ->validate([
            'Name'=>'required',
            'Classroom'=>'required'
        ]);
        $program ->Name= $request->Name;
        $program ->Classroom = $request ->Classroom;
        $program ->save();
        return redirect()->route('StudyProgram.show', $program);
    }


}
