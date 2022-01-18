<?php

namespace App\Http\Controllers;

use App\Models\VirtualMachine;
use Illuminate\Http\Request;

class VirtualMachineController extends Controller
{
    //función index para máquinas virtuales
    public function index(){
        $virtualMachines=VirtualMachine::paginate();
        return view('VirtualMachines.index',compact('virtualMachines'));
    }

    //función crear máquina virtual
    public function create(){
        return view('VirtualMachines.create');

    }
    //función mostrar máquinas virtuales
    public function show($id){
        $virtualMachine=VirtualMachine::find($id);
        return view('VirtualMachines.show', compact('virtualMachine'));
    }

    //función update máquina virtual
    public function update(){
        return "Aquí se editarán máquinas virtuales";
    }

    //función delete máquina virtual
    public function delete(){
        return "Aquí se eliminarán máquinas virtuales";
    }
}
