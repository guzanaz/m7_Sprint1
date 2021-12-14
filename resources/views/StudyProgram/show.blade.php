@extends('layouts.app')

@section('title','Programa '. $program->Name)

@section('content')
    <h1>Aquest és el programa d'estudis {{$program->Name}}</h1>
    <a href="{{route('StudyProgram.index')}}">Tornar a programes d'estudi</a>
@endsection
