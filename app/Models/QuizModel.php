<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizModel extends Model
{
    // use HasFactory;
    protected $table ="quizzes";

     public function categories(){
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    //one to many relationship with mcq table 
    function Mcq(){
        return $this->hasMany(McqModel::class,'quiz_id');
    }
}
