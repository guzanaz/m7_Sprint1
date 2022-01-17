@extends('layouts.app')

@section('title','createVirtualMachine')

@section('content')
    <h1>Crear Máquina Virtual</h1>   
    <form action="{{route('StudyProgram.store')}}" method="POST">
        @csrf 
        <label>
            Nom
            <br>
            <input type="text" name="Name" value="{{old('Name')}}">
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
            <input type="text" name="Classroom" value="{{old('Classroom')}}">
        </label>
        @error('Classroom')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <br>
        <button type="submit">Crear Programa</button>
    </form>

@endsection
