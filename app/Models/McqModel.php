<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McqModel extends Model
{
    // use HasFactory;
    protected $table = "mcqs";

    //one to many relationship between mcq table and quiz table 
    function Quiz(){
        return $this->belongsTo(QuizModel::class,'quiz_id');
    }
}
