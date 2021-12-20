@extends('layouts.app')

@section('title','editprogram')

@section('content')
    <h1>Editar Programa d'Estudi</h1>
    

    <form action="{{route('StudyProgram.update',$program)}}" method="POST">
        @csrf 
        @method('put')
        <label>
            Nom
            <br>
            <input type="text" name="Name" value="{{$program->Name}}">
        </label>
        @error('Name')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <br>
        <label>
            Aula
            <br>
            <input type="text" name="Classroom" value="{{$program->Classroom}}">
        </label>
        @error('Classroom')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <br>
        <button type="submit">Actualitzar programa</button>
    </form>

@endsection
