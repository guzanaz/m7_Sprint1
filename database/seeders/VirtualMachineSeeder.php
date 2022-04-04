<?php

namespace Database\Seeders;
use App\Models\VirtualMachine;
use Database\Factories\VirtualMachineFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VirtualMachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('virtual_machine')->insert([
            'user_id' => 1,
            'Name'=>'M1_UF1_A1',
            'OS'=>'Linux',
            'Version'=>'Mint',
            'Ram_size'=>'16GB', 
            'Disk_capacity'=>'8GB',
            'Description'=>'Esta es una descripción',
            'Power_on'=>1,

        ]);

        DB::table('virtual_machine')->insert([
            'user_id' => 1,
            'Name'=>'M2_UF2_A2',
            'OS'=>'Mac OS',
            'Version'=>'Big Sur',
            'Ram_size'=>'16GB', 
            'Disk_capacity'=>'12GB',
            'Description'=>'Esta es una descripción',
            'Power_on'=>1,

        ]);
        //
        VirtualMachine::factory(10)->create();
    }
    
}
