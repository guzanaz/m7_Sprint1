<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use Illuminate\Http\Request;

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
        return view('program.edit',compact('program'));

    }
}
