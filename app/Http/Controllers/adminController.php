<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\adminModel;
use App\Models\CategoryModel;
use App\Models\QuizModel;
use App\Models\McqModel;


class adminController extends Controller
{
    function adminlogin(Request $req){
    //    return $req->input();
    //     return 'admin login';
    //validation on form
    $validation = $req->validate([
          "name"=>"required",
          "password"=>"required"
    ]);
    $admin = adminModel::where([
        ['name',"=",$req->name],
        ['password',"=",$req->password]

    ])->first();

    if(!$admin){
        $validation = $req->validate([
        "user"=>"required",
        ],[
            "user.required"=>"User does not exist"
        ]);
    }
    // return view('admin');
    //return $req->name;
    Session::put('admin',$admin);
    return redirect('dashboard');
    }

    function dashboard(){
        $admin =    Session::get('admin');
        if($admin){
            return view('admin',['name'=>$admin->name]);
        }else{
            return redirect('admin-login');
        }

    }
    function categories(){
        $admin = Session::get("admin");
        $categories = CategoryModel::get();

        if($admin){
            return view('categories',['name'=>$admin->name,"categories"=>$categories]);
        }else{
            return redirect('admin-login');
        }
    }

    function logout(){
        Session::forget("admin");
        return redirect('admin-login');
    }

    //add category
    function addCategory(Request $req){
     //add validation duplecate entry [unique:categories,name = unique entry name fields pr categories table pr ]
        $validation = $req->validate([
        "category"=>"required | min:3 | unique:categories,name"
        ]);    
    $admin = Session::get('admin');
    $category = new CategoryModel();
    $category->name = $req->category;
    $category->creator=$admin->name;
    if($category->save()){
       Session::flash('category','Success: Category '.$req->category ."  Added Successfully ."); 
    }
    return redirect('admin-categories');
    }

    //delete category
    function deleteCategory($id){
    // echo $id;
    $isdeleted = CategoryModel::find($id)->delete();
    if($isdeleted){
        Session::flash('category',"Success:Category deleted successfully !");

    }
     return redirect('admin-categories');
    }

    // add quiz function
function addQuiz()
{
    $admin = Session::get("admin");

    if (!$admin) {
        return redirect('admin-login');
    }

    $categories = CategoryModel::get();
    $totalMcq = 0;

    // Get request parameters
    $quizName    = request('quiz');
    $category_id = request('category_id');

    // If quiz is being created for the first time
    if ($quizName && $category_id && !Session::has('quizDetails')) {

        $quiz = new QuizModel();
        $quiz->name = $quizName;
        $quiz->category_id = $category_id;

        if ($quiz->save()) {
            Session::put('quizDetails', $quiz);
            return redirect()->back(); // optional: refresh page after creation
        }
    }

    // If quiz already exists in session
    $quiz = Session::get('quizDetails');

    if ($quiz) {
        $totalMcq = McqModel::where('quiz_id', $quiz->id)->count();
    }

    return view('add-quiz', [
        'name'       => $admin->name,
        'categories' => $categories,
        'totalMcq'   => $totalMcq
    ]);
}

    //add mcqs 
    function addMCQs(Request $req){
        //validate form fields
        $req->validate([
            'question'=>"required |min:5",
            'a'=>"required",
            'b'=>"required ",
            'c'=>"required",
            'd'=>"required",
            'correct_ans'=>"required"

        ]);
       $mcq = new McqModel();
       $quiz = Session::get('quizDetails');
       $admin = Session::get('admin');
       $mcq->question= $req->question;
       $mcq->a=$req->a;
       $mcq->b = $req->b;
       $mcq->c = $req->c;
       $mcq->d = $req->d;
       $mcq->correct_ans = $req->correct_ans;
       $mcq->admin_id = $admin->id;
       $mcq->quiz_id = $quiz->id;
       $mcq->category_id = $quiz->category_id;
       if($mcq->save()){
        if($req->submit=="add-more"){
            return redirect(url()->previous());
        }else{
            Session::forget('quizDetails');
            return redirect('/admin-categories');
        }
       }

    }
  //end quiz
  function endQuiz(){
 Session::forget('quizDetails');
 return redirect('/admin-categories');
  }
    //show mcqs
    function showQuiz($id,$quizName){
   $admin = Session::get("admin");
   $mcq = McqModel::where('quiz_id',$id)->get();
        if($admin){
            return view('show-quiz',['name'=>$admin->name,"mcq"=>$mcq,'quizName'=>$quizName]);
        }else{
            return redirect('admin-login');
        }
    }

    //view quiz list
    function quizList($id,$category){
     $admin = Session::get("admin");
    $quizData = QuizModel::where('category_id',$id)->get();
        if($admin){
            return view('quiz-list',['name'=>$admin->name,"quizData"=>$quizData,'category'=>$category]);
        }else{
            return redirect('admin-login');
        }   
    }
}
 