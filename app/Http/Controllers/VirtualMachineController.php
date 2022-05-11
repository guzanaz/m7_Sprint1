<?php

namespace App\Http\Controllers;

use App\Models\VirtualMachine;
use Error;
use Illuminate\Http\Request;
//use VirtualMachine as GlobalVirtualMachine;
use Proxmox\PVE;

use function PHPUnit\Framework\returnSelf;

class VirtualMachineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    //función index para máquinas virtuales
    public function index()
    {
        $virtualMachines = VirtualMachine::orderBy('id', 'desc')->paginate();
        return view('VirtualMachines.index', compact('virtualMachines'));
    }

    //función crear máquina virtual
    public function create()
    {
        return view('VirtualMachines.create');
    }

    //función guardar máquina virtual
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'OS' => 'required',
            'Version' => 'required',
            'Ram_size' => 'required',
            'Disk_capacity' => 'required',
            'Description' => 'required',
        ]);

        $virtualMachine = new VirtualMachine();

        $virtualMachine->user_id = '14';
        $virtualMachine->Name = $request->Name;
        $virtualMachine->OS = $request->OS;
        $virtualMachine->Version = $request->Version;
        $virtualMachine->Ram_size = $request->Ram_size;
        $virtualMachine->Disk_capacity = $request->Disk_capacity;
        $virtualMachine->Description = $request->Description;
        $virtualMachine->Power_on = false;
        $virtualMachine->created_at = date('Y-m-d H:i:s');
        $virtualMachine->updated_at = date('Y-m-d H:i:s');

        $virtualMachine->save();
        return view('VirtualMachines.show', compact('virtualMachine'));
    }

    //función mostrar máquinas virtuales
    public function show(VirtualMachine $virtualMachine)
    {
        return view('VirtualMachines.show', compact('virtualMachine'));
    }

    public function edit(VirtualMachine $virtualMachine)
    {
        return view('VirtualMachines.edit', compact('virtualMachine'));
    }

    //función update máquina virtual
    public function update(Request $request, VirtualMachine $virtualMachine)
    {

        $request->validate([
            'Name' => 'required',
            'OS' => 'required',
            'Version' => 'required',
            'Ram_size' => 'required',
            'Disk_capacity' => 'required',
            'Description' => 'required',
        ]);



        $virtualMachine->user_id = '1';
        $virtualMachine->Name = $request->Name;
        $virtualMachine->OS = $request->OS;
        $virtualMachine->Version = $request->Version;
        $virtualMachine->Ram_size = $request->Ram_size;
        $virtualMachine->Disk_capacity = $request->Disk_capacity;
        $virtualMachine->Description = $request->Description;
        $virtualMachine->Power_on = false;
        $virtualMachine->created_at = date('Y-m-d H:i:s');
        $virtualMachine->updated_at = date('Y-m-d H:i:s');
        $virtualMachine->save();
        return view('VirtualMachines.show', compact('virtualMachine'));
    }

    //función delete máquina virtual
    public function destroy(VirtualMachine $virtualMachine)
    {
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
    public function indexApi(Request $request)
    {

        // Recuperar el usuario de Proxmox correspondiente al usuario de Virtualio (el alumno)
        $user = $request->user();

        // Conectarme a la API de Proxmox con el usuario obtenido
        $proxmox = new PVE('95.129.255.249', $user->proxmox_user, $user->proxmox_password, 18006, 'pam');

        // Pedir a la API de Proxmox el listado de nodos del usuario
        // (procesa la info recibida, si hace falta)
        // Devolver a VUE un JSON con la lista de màquinas
        // return response($proxmox->nodes()->node('pvedaw')->qemu()->get())
        // ->header('Access-Control-Allow-Credentials', 'true');
        return response()
            ->json($proxmox->nodes()->node('pvedaw')->qemu()->get());
        // -> header('Access-Control-Allow-Credentials', 'true');

    }


    //función store máquinas virtuales
    public function storeApi(Request $request)
    {
        $user = $request->user();
        $proxmox = new PVE('95.129.255.249', $user->proxmox_user, $user->proxmox_password, 18006, 'pam');
        $params = $request->all();
        $params['vmid'] = $proxmox->cluster()->NextId(array())->get()['data']; // Obtenim el nextId i l'afegim a l'array de paràmetres

        $response =  [
            'data' => $proxmox->nodes()->node('pvedaw')->qemu()->post($params),
            'success' => true,
            'message' => 'Registration is completed',
        ];
        return response($response, 201);
    }



    //función mostrar máquinas virtuales
    public function showApi(Request $request, $virtualMachine)
    {
        $user = $request->user();
        $proxmox = new PVE('95.129.255.249', $user->proxmox_user, $user->proxmox_password, 18006, 'pam');
        return response()->json($proxmox->nodes()->node('pvedaw')->qemu()->vmid($virtualMachine)->status()->current()->get());
    }

    //función eliminar máquinas virtuales
    public function destroyApi(Request $request, $virtualMachine)
    {

        $user = $request->user();
        $proxmox = new PVE('95.129.255.249', $user->proxmox_user, $user->proxmox_password, 18006, 'pam');
        return response()->json($proxmox->nodes()->node('pvedaw')->qemu()->vmid($virtualMachine)->delete());
    }


    // arrancar vm
    public function startVM(Request $request, $virtualMachine)
    {
        $user = $request->user();
        $proxmox = new PVE('95.129.255.249', $user->proxmox_user, $user->proxmox_password, 18006, 'pam');
        
        $response =  [
            'data' => $proxmox->nodes()->node('pvedaw')->qemu()->vmid($virtualMachine)->status()->start()->post(),
            'success' => true,
            'message' => 'Virtual machine is running',
            'object' => $proxmox->nodes()->node('pvedaw')->qemu()->vmid($virtualMachine)->status()->current()->get()
        ];
        return response($response, 201);
        //return response()->json($proxmox->nodes()->node('pvedaw')->qemu()->vmid($virtualMachine)->status()->start()->post());
    }

    // parar vm
    public function stopVM(Request $request, $virtualMachine)
    {

        $user = $request->user();
        $proxmox = new PVE('95.129.255.249', $user->proxmox_user, $user->proxmox_password, 18006, 'pam');
        
        $response =  [
            'data' => $proxmox->nodes()->node('pvedaw')->qemu()->vmid($virtualMachine)->status()->stop()->post(),
            'success' => true,
            'message' => 'Virtual machine is stopped',
            'object' => $proxmox->nodes()->node('pvedaw')->qemu()->vmid($virtualMachine)->status()->current()->get()
        ];
        return response($response, 201);
        
        //return response()->json($proxmox->nodes()->node('pvedaw')->qemu()->vmid($virtualMachine)->status()->stop()->post());
    }

    //función editar máquina virtual para la api se hace con vue
    //función update máquina virtual
    public function updateApi(Request $request, $virtualMachine)
    {

        $user = $request->user();
        $proxmox = new PVE('95.129.255.249', $user->proxmox_user, $user->proxmox_password, 18006, 'pam');
        $params = $request->all();
        return response()->json($proxmox->nodes()->node('pvedaw')->qemu()->vmid($virtualMachine)->config()->put($params));
    }
}
