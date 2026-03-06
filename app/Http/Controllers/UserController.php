<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\QuizModel;
use App\Models\McqModel;

class UserController extends Controller
{
    //Home page
    function welcome(){
    //    $categories = CategoryModel::get();
    //one to many relationship with tables category and quizzes table
    //here : withCount('quizzes') -: quizzes is fn that we created in  category model file to relation one to many [quizz and category table)]
    $categories = CategoryModel::withCount('quizzes')->get();
        return view('welcome',['categories'=>$categories]);
    }

    //user quiz list
     function userQuizList($id,$category){
     $quizData = QuizModel::withCount('Mcq')->where('category_id',$id)->get();
            return view('user-quiz-list',["quizData"=>$quizData,'category'=>$category]);  
    }

    //start quiz
    function startQuiz($id,$name){
    $quizCount = McqModel::where('quiz_id',$id)->count();
    $quizName = $name;
    return view('start-quiz',['quizName'=>$quizName,'quizCount'=>$quizCount]);

    }

}
