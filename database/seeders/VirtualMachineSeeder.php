<?php

namespace Database\Seeders;
use App\Models\VirtualMachine;
use Database\Factories\VirtualMachineFactory;
use Illuminate\Database\Seeder;

class VirtualMachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        VirtualMachine::factory(10)->create();
    }
}
