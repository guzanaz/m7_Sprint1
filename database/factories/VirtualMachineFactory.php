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
            'Name'=>$this->faker->sentence(),
            'OS'=>$this->faker->randomElement(['Linux','MacOS','Windows']),
            'Version'=>$this->faker->sentence(),
            'Ram size'=>$this->faker->randomElement(['4GB','6GB','8GB','16GB']), 
            'Disk capacity'=>$this->faker->randomElement(['8GB','16GB','24GB','32GB','64GB']),
            'Description'=>$this->faker->paragraph(),
            'Power on'=>$this->faker->boolean(),
        ];
    }
}
