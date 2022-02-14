<?php

namespace App\Http\Controllers;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use App\Http\Requests\StoreStudyProgram;

class StudyProgramController  extends Controller
{
    public function index(){
        $programs = StudyProgram::orderBy('id','desc')->paginate();
        return view('StudyProgram.index', compact('programs'));
    }

    public function indexApi(){
        $programs = StudyProgram::all();
        return $programs;
    }

    public function create(){
        return view('StudyProgram.create');
    }

    public function store(StoreStudyProgram $request){
        $program =StudyProgram::create($request->all());
        
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

    public function destroy(StudyProgram $program){
        $program->delete();

        return redirect()->route('StudyProgram.index');
    }

}
