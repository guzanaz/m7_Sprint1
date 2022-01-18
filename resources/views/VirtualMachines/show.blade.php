@extends('layouts.app')

@section('title','VirtualMachines '.$virtualMachine->Name)

@section('content')
<h1>Máquina Virtual {{$virtualMachine->Name}}</h1>
<a href="{{route('VirtualMachine.index')}}">Tornar a la llista </a>

<ul>
    <li><strong>Id: </strong>{{$virtualMachine->id}}</li>
    <li><strong>OS: </strong>{{$virtualMachine->OS}}</li>
    <li><strong>OS Version: </strong>{{$virtualMachine->Version}}</li>
</ul>
<p>
    <a href="">Editar Màquina Virtual </a> |
    <a href="">Eliminar Màquina Virtual </a>
</p>
@endsection