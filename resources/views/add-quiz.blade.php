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
    <input type="text" name="quiz" placeholder="Enter Quiz Name" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" />
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
   <h2 class="text-2xl text-center text-gray-800 mb-6">Add MCQs</h2>
   <form action=" " method="get" class="space-y-4">
    <div>
    <textarea name="question" placeholder="Enter Your Question Name" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" />
    </textarea>
</div>
<div>
    <input type="text" name="quiz" placeholder="Enter First Option" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" />
</div>
<div>
    <input type="text" name="quiz" placeholder="Enter Second Option" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" />
</div>
<div>
    <input type="text" name="quiz" placeholder="Enter Third Option" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" />
</div>
<div>
    <input type="text" name="quiz" placeholder="Enter Forth Option" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" />
</div>
<div>
    <select name="right_answer" placeholder="Enter Forth Option" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" />
<option>Select Right Answer</option>
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
</select>
</div>
 <button type="submit" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white">Add More</button>
  <button type="submit" class="w-full bg-green-500 rounded-xl px-4 py-2 text-white">Add & Submit</button>
   </form>
   @endif
    </div>
</div>
</body>
</html>