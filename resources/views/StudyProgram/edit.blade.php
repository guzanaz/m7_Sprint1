@extends('layouts.app')

@section('title','editprogram')

@section('content')
    <h1>Editar Programa d'Estudi</h1>
    

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
        <button type="submit">Actualitzar programa</button>
    </form>

@endsection
