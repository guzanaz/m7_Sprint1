<?php

namespace App\Http\Controllers;
use App\Models\VirtualMachine;
use Illuminate\Http\Request;
//use VirtualMachine as GlobalVirtualMachine;

class VirtualMachineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    //función index para máquinas virtuales
    public function index(){
        $virtualMachines=VirtualMachine::orderBy('id','desc')->paginate();
        return view('VirtualMachines.index',compact('virtualMachines'));
    }

    //función crear máquina virtual
    public function create(){
        return view('VirtualMachines.create');

    }

    //función guardar máquina virtual
    public function store(Request $request){
        $request->validate([
            'Name' => 'required',
            'OS' => 'required',
            'Version' => 'required',
            'Ram_size' => 'required',
            'Disk_capacity' => 'required',
            'Description' => 'required',
        ]);

        $virtualMachine =new VirtualMachine();

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
        return view('VirtualMachines.show', compact('virtualMachine'));
    
    }

    //función mostrar máquinas virtuales
    public function show(VirtualMachine $virtualMachine){
        return view('VirtualMachines.show', compact('virtualMachine'));
    }

    public function edit(VirtualMachine $virtualMachine){
        return view('VirtualMachines.edit', compact('virtualMachine'));
    }

    //función update máquina virtual
    public function update(Request $request, VirtualMachine $virtualMachine){

        $request->validate([
            'Name' => 'required',
            'OS' => 'required',
            'Version' => 'required',
            'Ram_size' => 'required',
            'Disk_capacity' => 'required',
            'Description' => 'required',
        ]);



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
        return view('VirtualMachines.show', compact('virtualMachine'));
    }

    //función delete máquina virtual
    public function destroy(VirtualMachine $virtualMachine){
        $virtualMachine->delete();
        return redirect()->route('VirtualMachine.index');
    }

    /**
     * API FUNCTIONS
     */
    /* OLD !!!
    public function indexApi(){
        $virtualMachines=VirtualMachine::all();
        return $virtualMachines;
    }
    */
    public function indexApi(Request $request){
        // Recuperar el usuario de Proxmox correspondiente al usuario de Virtualio (el alumno)

        $user = $request->user();
        $proxmoxUser = $user->proxmox_user;
        $proxmoxPassword = $user->proxmox_password;
        
        return $proxmoxPassword;
        // Conectarme a la API de Proxmox con el usuario obtenido

        // Pedir a la API de Proxmox el listado de màquinas del usuario

        // (procesa la info recibida, si hace falta)

        // Devolver a VUE un JSON con la lista de màquinas
    }


    //función crear máquina virtual para la api se hace con vue
 
    //función guardar máquina virtual
    public function storeApi (Request $request){
        $request->validate([
            'Name' => 'required',
            'OS' => 'required',
            'Version' => 'required',
            'Ram_size' => 'required',
            'Disk_capacity' => 'required',
            'Description' => 'required',
        ]);

        $virtualMachine =new VirtualMachine();

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
        return $virtualMachine;
    }

    //función mostrar máquinas virtuales
    public function showApi(VirtualMachine $virtualMachine){
        return $virtualMachine;
    }

    //función editar máquina virtual para la api se hace con vue

    //función update máquina virtual
    public function updateApi(Request $request, $id){
        $virtualMachine = VirtualMachine::find($id);
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
        return $virtualMachine;
    }

    //función delete máquina virtual
    public function destroyApi($id){
        $virtualMachine = VirtualMachine::find($id);
        $virtualMachine->delete();  
        return $virtualMachine;
    }








}
