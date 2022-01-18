@extends('layouts.app')

@section('title','VirtualMachines ')

@section('content')
    <h1>Secció de màquines virtuals</h1>
    <h2>Llista d'opcions</h2>
    <a href="{{route('VirtualMachine.create')}}">Crear Nova Màquina Virtual</a>

    <ul>
        @foreach($virtualMachines as $virtualMachine)
            <li>
                <a href="{{route('VirtualMachine.show',$virtualMachine->id)}}">{{$virtualMachine->Name}}</a>
            </li>
        @endforeach
    </ul>
{{$virtualMachines->links()}}
@endsection
