@extends('layouts.app')

@section('title','editVirtualMachine')

@section('content')
<h1>Editar Màquina Virtual</h1>
<form action="{{route('VirtualMachine.update',$virtualMachine)}}" method="POST">
    @csrf
    @method('put')
    <label>
        Nom
        <br>
        <input type="text" name="Name" value="{{old('Name',$virtualMachine->Name)}}">
    </label>
    @error('Name')
    <br>
    <small>*{{$message}}</small>
    <br>
    @enderror
    <br>
    <br>
    <!-- OS 'Linux','MacOS','Windows' -->
    <label> Sistema Operatiu
    <br>
        <select name="OS" id="OS">
            <option selected>{{old('OS',$virtualMachine->OS)}}</option>
            <option value="Linux">Linux</option>
            <option value="MacOS">MacOS</option>
            <option value="Windows">Windows</option>
        </select>
    </label>
    @error('OS')
    <br>
    <small>*{{$message}}</small>
    <br>
    @enderror
    <br>
    <br>
    <!-- Version typeable -->
    <label>
        Versió
        <br>
        <input type="text" name="Version" value="{{old('Version',$virtualMachine->Version)}}">
    </label>
    @error('Version')
    <br>
    <small>*{{$message}}</small>
    <br>
    @enderror
    <br>
    <br>
    <!-- Ram size '4GB','6GB','8GB','16GB' -->
    <label> Mida de la memòria RAM
    <br>
        <select name="Ram_size" id="Ram_size">
            <option selected>{{old('Ram_size',$virtualMachine->Ram_size)}}</option>
            <option value="4GB">4GB</option>
            <option value="6GB">6GB</option>
            <option value="8GB">8GB</option>
            <option value="16GB">16GB</option>
        </select>
    </label>
    @error('Ram_size')
    <br>
    <small>*{{$message}}</small>
    <br>
    @enderror
    <br>
    <br>
    <!-- Disk capacity '8GB','16GB','24GB','32GB','64GB' -->
    <label> Capacitat del disc dur
    <br>
        <select name="Disk_capacity" id="Disk_capacity">
            <option selected>{{old('Disk_capacity', $virtualMachine->Disk_capacity)}}</option>                      
                <option value="4GB">4GB</option>
                <option value="6GB">6GB</option>
                <option value="8GB">8GB</option>
                <option value="16GB">16GB</option>
                <option value="24GB">24GB</option>
                <option value="32GB">32GB</option>
                <option value="64GB">64GB</option>
        </select>
    </label>
    @error('Disk_capacity')
    <br>
    <small>*{{$message}}</small>
    <br>
    @enderror
    <br>
    <br>
    <!-- Description texarea -->
    <label>
        Descripció
        <br>
        <textarea name="Description" rows="10">{{old('Description',$virtualMachine->Description)}}</textarea>
    </label>
    @error('Description')
    <br>
    <small>*{{$message}}</small>
    <br>
    @enderror
    <br>
    <br>
    <button type="submit">Actualizar Màquina Virtual</button>
</form>

@endsection
