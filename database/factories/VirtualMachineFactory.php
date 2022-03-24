<?php

namespace Database\Factories;


use App\Models\VirtualMachine;
use Illuminate\Database\Eloquent\Factories\Factory;

class VirtualMachineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VirtualMachine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id'=>$this->faker->numberBetween(1,50),
            'Name'=>$this->faker->randomElement(['M1_UF1_A1','M1_UF1_A2','M1_UF2_A1','M1_UF2_A2', 'M1_UF3_A1','M1_UF3_A2','M2_UF1_A1','M2_UF2_A1','M2_UF2_A1', 'M2_UF2_A2']),
            'OS'=>$this->faker->randomElement(['Linux','MacOS','Windows']),
            'Version'=>$this->faker->randomElement(['Mint','Catalina','11', '10']),
            'Ram_size'=>$this->faker->randomElement(['4GB','6GB','8GB','16GB']), 
            'Disk_capacity'=>$this->faker->randomElement(['8GB','16GB','24GB','32GB','64GB']),
            'Description'=>$this->faker->randomElement(['Treball','Grup2','Grup1','Grup3','Grup4']),
            'Power_on'=>$this->faker->boolean('false'),
        ];
    }
}
