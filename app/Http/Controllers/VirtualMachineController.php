<?php

namespace App\Http\Controllers;

use App\Models\VirtualMachine;
use Illuminate\Http\Request;

class VirtualMachineController extends Controller
{
    //función index para máquinas virtuales
    public function index(){
        return "Index de todas las máquinas virtuales";
    }

    //función crear máquina virtual
    public function create(){
        return "Aquí se creará una máquina virtual";

    }
    //función listar máquinas virtuales
    public function show(){
        return "Aquí se listarán todas las máquinas virtuales";
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
