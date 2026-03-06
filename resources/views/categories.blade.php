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
@if(Session('category'))
<div class="bg-green-800 text-white pl-5">{{Session('category')}}</div>
@endif
<div class="bg-gray-100 flex flex-col  items-center min-h-screen pt-10">
 <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
   <h2 class="text-2xl text-center text-gray-800 mb-6">Add Category</h2> 
   <form action="/add-category" method="post" class="space-y-4">
   @csrf
    <div>
    <input type="text" name="category" placeholder="Enter Category Name" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" />
    @error('category')
    <div class="text-red-500">{{$message}}</div>     
   @enderror
</div>
    <button type="submit" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white">Add</button>
   </form>
    </div>
{{-- show categories --}}
     <div class="max-w-4xl mx-auto mt-10 bg-white shadow-lg rounded-xl overflow-hidden">
    
    <div class="px-6 py-4 border-b bg-gray-50">
        <h2 class="text-2xl font-semibold text-blue-600">
            Category List
        </h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            
            <!-- Table Head -->
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="px-6 py-3">S.No.</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Creator</th>
                    <th class="px-6 py-3 text-center">Action</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="text-gray-600">
                @foreach ($categories as $category)
                <tr class="border-t hover:bg-gray-50 transition">
                    <td class="px-6 py-3">{{ $category->id }}</td>
                    <td class="px-6 py-3 font-medium">{{ $category->name }}</td>
                    <td class="px-6 py-3">{{ $category->creator }}</td>
                    <td class="px-6 py-3 text-center">
                        <a href="category/delete/{{$category->id}}">
                        <button 
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded-lg text-sm transition">
                            Delete
                        </button>
                        </a>
                         <a href="quiz-list/{{$category->id}}/{{ $category->name }}">
                        <button 
                            class="bg-green-500 hover:bg-red-600 text-white px-4 py-1 rounded-lg text-sm transition">
                            View
                        </button>
                        
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

</div>

</body>
</html>