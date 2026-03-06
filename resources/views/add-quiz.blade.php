<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Categories</title>
     @vite('resources/css/app.css')
</head>
<body>
{{-- use navbar component --}}
<x-navbar name={{$name}}></x-navbar>
<div class="bg-gray-100 flex flex-col  items-center min-h-screen pt-10">
 <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">

    @if(!Session('quizDetails'))
   <h2 class="text-2xl text-center text-gray-800 mb-6">Add Quiz</h2> 
   <form action="/add-quiz" method="get" class="space-y-4">
    <div>
    <input type="text" name="quiz" placeholder="Enter Quiz Name" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" />
</div>
 <div>
    <select name="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" >
        <option>Select Category</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</div>
    <button type="submit" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white">Add</button>
   </form>
   @else
   {{-- next form  --}}
   <span class="text-green-500 font-bold">Quiz :</q>{{Session('quizDetails')->name}}</span>
   <p class="text-green-500 font-bold">Total Mcq : {{$totalMcq}}
    @if ($totalMcq >0)
    <a class="text-yellow-500 text-sm" href="show-quiz/{{Session('quizDetails')->id}}">Show MCQS</a>
    @endif
   </p>
   <h2 class="text-2xl text-center text-gray-800 mb-6">Add MCQs</h2>
   <form action="/add-mcq" method="post" class="space-y-4">
    @csrf
    <div>
    <textarea name="question" placeholder="Enter Your Question Name" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" />
    </textarea>
    @error('question')
    <div class=" text-white bg-red-500">
        {{$message}}
    </div>
    @enderror
</div>
<div>
    <input type="text" name="a" placeholder="Enter First Option" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" />
 @error('a')
    <div class=" text-white bg-red-500">
        {{$message}}
    </div>
    @enderror
</div>
<div>
    <input type="text" name="b" placeholder="Enter Second Option" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" />
 @error('b')
    <div class=" text-white bg-red-500">
        {{$message}}
    </div>
    @enderror
</div>
<div>
    <input type="text" name="c" placeholder="Enter Third Option" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" />
 @error('c')
    <div class=" text-white bg-red-500">
        {{$message}}
    </div>
    @enderror
</div>
<div>
    <input type="text" name="d" placeholder="Enter Forth Option" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" />
 @error('d')
    <div class=" text-white bg-red-500">
        {{$message}}
    </div>
    @enderror
</div>
<div>
    <select name="correct_ans" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
<option value="">Select Right Answer</option>
<option value="a">A</option>
<option value="b">B</option>
<option value="c">C</option>
<option value="d">D</option>
</select>
 @error('correct_ans')
    <div class=" text-white bg-red-500">
        {{$message}}
    </div>
    @enderror
</div>
 <button type="submit" value="add-more" name ="submit" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white">Add More</button>
  <button type="submit"  value="done" name="submit" class="w-full bg-green-500 rounded-xl px-4 py-2 text-white">Add & Submit</button>
  <a class="w-full block bg-red-500 rounded-xl text-center px-4 py-2 text-white"  href="/end-quiz">Finish Quiz</a>
   </form>
   @endif
    </div>
</div>
</body>
</html>