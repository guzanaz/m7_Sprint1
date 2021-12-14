<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use Illuminate\Http\Request;

class StudyProgramController  extends Controller
{
    public function index(){
        $programs = StudyProgram::paginate();
        
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
    }

    public function show($id){
        $program=StudyProgram::find($id);
        return view('StudyProgram.show', compact('program'));
    }
}
