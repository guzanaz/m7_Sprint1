<?php

namespace Database\Seeders;

use App\Models\StudyProgram;
use Illuminate\Database\Seeder;



class StudyProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $study_program_1= new StudyProgram();
        $study_program_1->Name='SMX_2021_2022';
        $study_program_1->Classroom='A22';
        $study_program_1->save();

        $study_program_2= new StudyProgram();
        $study_program_2->Name='ASIX_2021_2022';
        $study_program_2->Classroom='A21';
        $study_program_2->save();

        $study_program_3= new StudyProgram();
        $study_program_3->Name='ASIXDAW_2021_2022';
        $study_program_3->Classroom='A24';
        $study_program_3->save();
    }
}
