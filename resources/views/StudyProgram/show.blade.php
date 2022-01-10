@extends('layouts.app')

@section('title','Programa '. $program->Name)

@section('content')
    <h1>Aquest és el programa d'estudis {{$program->Name}}</h1>
    <a href="{{route('StudyProgram.index')}}">Tornar a programes d'estudi</a>
    <br>
    <a href="{{route('StudyProgram.edit', $program)}}">Editar Programa d'estudis</a>

    <form action="{{route('StudyProgram.destroy', $program)}}" method="POST">
        @csrf 
        @method('delete')
        <button type="submit">Eliminar</button>
    </form>
@endsection
