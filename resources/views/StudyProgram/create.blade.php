@extends('layouts.app')

@section('title','createprogram')

@section('content')
    <h1>Crear Programa d'Estudi</h1>
    

    <form action="{{route('StudyProgram.store')}}" method="POST">
        @csrf 
        <label>
            Nom
            <br>
            <input type="text" name="Name">
        </label>
        <br>
        <br>
        <label>
            Aula
            <br>
            <input type="text" name="Classroom">
        </label>
        <br>
        <br>
        <button type="submit">Crear Programa</button>
    </form>

@endsection
