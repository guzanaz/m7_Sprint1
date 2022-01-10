<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
    use HasFactory;
    //modifica a la tabla study_program
    protected $table='study_program';

    protected $guarded=[];

}
