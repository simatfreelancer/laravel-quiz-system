<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    // use HasFactory;
      protected $table="categories";
       
      //one to many relationship with quizzes table
       // one to many
    public function quizzes(){
        return $this->hasMany(QuizModel::class, 'category_id');
    }
}
