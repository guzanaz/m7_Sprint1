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

    //función guardar máquina virtual
    public function store(Request $request){

        $virtualMachine=new VirtualMachine();
        $virtualMachine->user_id='14';
        $virtualMachine->Name = $request->Name;
        $virtualMachine->OS = $request->OS;
        $virtualMachine->Version = $request->Version;
        $virtualMachine->Ram_size = $request->Ram_size;
        $virtualMachine->Disk_capacity = $request->Disk_capacity;
        $virtualMachine->Description = $request->Description;
        $virtualMachine->Power_on=false;
        $virtualMachine->created_at= date('Y-m-d H:i:s');
        $virtualMachine->updated_at= date('Y-m-d H:i:s');

        $virtualMachine->save();

    
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
