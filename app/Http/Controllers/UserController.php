<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\QuizModel;
use App\Models\McqModel;
use App\Models\User;
use App\Models\Record;
use App\Models\MCQ_Record;


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
    $mcqs = McqModel::where('quiz_id',$id)->get();
    Session::put('firstMCQ',$mcqs[0]);
    return view('start-quiz',['quizName'=>$quizName,'quizCount'=>$quizCount]);

    }

    //signup
    function userSignup(Request $req){
       $validate=$req->validate([
        'name'=>'required | min:3',
        'email'=>'required |email | unique:users',
        'password'=>'required | min:3 |confirmed',
       ]);
       $user = User::create([
       'name'=>$req->name,
       'email'=>$req->email,
       'password'=>Hash::make($req->password),
       ]);
       if($user){
        Session::put('user',$user);
        if(Session::has('quiz-url')){
        $url = Session::get('quiz-url');
        Session::forget('quiz-url');
         return redirect($url);   
        }
        return redirect('/');
       }
    }

    //user logout 
    function userLogout(){
        Session::forget('user');
        return redirect('/');
    }

    //
    function userSignupQuiz(){
        Session::put('quiz-url',url()->previous());
      return  view('user-signup');
    }
   
    //User Login 
    function userLogin(Request $req){
       $validate=$req->validate([
        'email'=>'required |email',
        'password'=>'required',
       ]);
       
       $user = User::where('email',$req->email)->first();
       if(!$user || !Hash::check($req->password,$user->password)){
        return "User is not valid ,Please check email and password again";
       }

       if($user){
        Session::put('user',$user);
        if(Session::has('quiz-url')){
        $url = Session::get('quiz-url');
        Session::forget('quiz-url');
         return redirect($url);   
        }
        return redirect('/');
       }
    }

    function userLoginQuiz(){
      Session::put('quiz-url',url()->previous());
      return  view('user-login');  
    }

       // start quiz
function mcq($id, $name)
{
    $record = new Record();
    $record->user_id = Session::get('user')->id;
    $record->quiz_id = Session::get('firstMCQ')->quiz_id;
    $record->status =1;
    if($record->save()){
    $currentQuiz = [];

    $quizId = Session::get('firstMCQ')->quiz_id;

    $currentQuiz['totalMcq'] = McqModel::where('quiz_id', $quizId)->count();
    $currentQuiz['currentMcq'] = 1;
    $currentQuiz['quizName'] = $name;
    $currentQuiz['quizId'] = $quizId;
    $currentQuiz['recordId'] = $record->id;
    Session::put('currentQuiz', $currentQuiz);

    $mcqData = McqModel::find($id);

    return view('mcq', [
        'quizName' => $name,
        'mcqData' => $mcqData
    ]);
    }else{
        return "Something went wrong";
    }
}

function  submitAndNext(Request $req,$id){
$currentQuiz =Session::get('currentQuiz');
$currentQuiz['currentMcq'] +=1;
 $mcqData = McqModel::where([
    ['id','>',$id],
    ['quiz_id','=', $currentQuiz['quizId']]
])->first();

//prevent duplecate entry
$isExist = MCQ_Record::where([
    ['record_id','=',$currentQuiz['recordId']],
    ['mcq_id','=',$req->id]
])->count();

if($isExist <  1){
$mcq_record =  new MCQ_Record();
$mcq_record->record_id = $currentQuiz['recordId'];
$mcq_record->user_id = Session::get('user')->id;
$mcq_record->mcq_id = $id;
$mcq_record->selected_answer  = $req->answer;
if($req->answer  == McqModel::find($req->id)->correct_ans){
$mcq_record->is_correct = 1; //for correct answer
}else{
   $mcq_record->is_correct = 0;  //for wrong answer
}

if(!$mcq_record->save()){
    return "something went wrong";
}
}


   Session::put('currentQuiz', $currentQuiz);
if($mcqData){
     return view('mcq', [
        'quizName' =>  $currentQuiz['quizName'],
        'mcqData' => $mcqData
    ]);
}else{
    //this is fn we create in mcq_record model to join the table scopeWithMCQ() but not use scope word
    $resultData = MCQ_Record::WithMCQ()->where('record_id',$currentQuiz['recordId'])->get();
    $correctAnswers= MCQ_Record::where([
        ['record_id','=',$currentQuiz['recordId']],
        ['is_correct','=',1]
    ])->count();
    //change status of complete course
    $record = Record::find($currentQuiz['recordId']);
    if($record){
        $record->status = 2;
        $record->update();
    }
    return view('quiz-result',['resultData'=>$resultData,'correctAnswers'=>$correctAnswers]);
}

}

function userDetails(){
    //join WithQuiz() is in record model
    $quizRecord = Record::WithQuiz()->where('user_id',Session::get('user')->id)->get();
    return view('user-details',['quizRecord'=>$quizRecord ]);
}

//search quiz
function searchQuiz(Request $req){
$quizResult = QuizModel::withCount('Mcq')->where('name','Like','%' .$req->search.'%')->get();    
return view('quiz-search',['quizResult'=>$quizResult,'quiz'=>$req->search]);
}
}
