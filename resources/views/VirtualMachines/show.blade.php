@extends('layouts.app')

@section('title','VirtualMachines '.$virtualMachine->Name)

@section('content')
<h1>Máquina Virtual {{$virtualMachine->Name}}</h1>
<a href="{{route('VirtualMachine.index')}}">Tornar a la llista </a>

<ul>
    <li><strong>Id: </strong>{{$virtualMachine->id}}</li>
    <li><strong>OS: </strong>{{$virtualMachine->OS}}</li>
    <li><strong>OS Version: </strong>{{$virtualMachine->Version}}</li>
    <li><strong>Descripció: </strong>{{$virtualMachine->Description}}</li>
</ul>
<p>
    <a href="{{route('VirtualMachine.edit',$virtualMachine)}}">Editar Màquina Virtual </a> |
</p>
<form action="{{route('VirtualMachine.destroy',$virtualMachine)}}" method="POST">
    @csrf
    @method('delete')
    <button type="submit">Eliminar</button>
</form>
@endsection