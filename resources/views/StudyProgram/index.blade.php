@extends('layouts.app')

@section('title','programs')

@section('content')
    <h1>Programes de estudi</h1>
    <h2>Lista</h2>
    <a href="{{route('StudyProgram.create')}}">Crear Programa d'Estudi</a>
    <ul>
       @foreach($programs as $program)
        <li>
            <a href="{{route('StudyProgram.show', $program->id)}}">{{$program->Name}}</a>
    
        </li>
       @endforeach

    </ul>

    {{$programs->links()}}

@endsection
