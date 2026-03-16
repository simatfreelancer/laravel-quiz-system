<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page</title>
    @vite('resources/css/app.css')
</head>
<body>
<x-user-navbar ></x-user-navbar>
<div class="flex flex-col min-h-screen items-center bg-gray-100">
    <h1 class="text-3xl text-green-900 pt-5">Check Your skills</h1>
    <div class="w-full max-w-md">
    <div class="relative top-5">
        <form action="search-quiz" type="get" >
            @csrf
        <input class="w-full px-4 py-3 text-gray-700 border border-gray-300 rounded-2xl shadow" type="text" 
        placeholder="Search Quiz...." name="search"/>              
        <button class="absolute right-2 top-3rkkfb">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
        </button>
        </form>
    </div>
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
                    <th class="px-6 py-3">Quiz Count</th>
                    <th class="px-6 py-3 text-center">Action</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="text-gray-600">
                @foreach ($categories as $key => $category)
                <tr class="border-t hover:bg-gray-50 transition">
                    <td class="px-6 py-3">{{ $key+1 }}</td>
                    <td class="px-6 py-3 font-medium">{{ $category->name }}</td>
                    <td class="px-6 py-3">{{ $category->creator }}</td>
                     <td class="px-6 py-3">{{ $category->quizzes_count }}</td>
                    <td class="px-6 py-3 text-center">
                         <a href="user-quiz-list/{{$category->id}}/{{ $category->name }}">
                       <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M607.5-372.5Q660-425 660-500t-52.5-127.5Q555-680 480-680t-127.5 52.5Q300-575 300-500t52.5 127.5Q405-320 480-320t127.5-52.5Zm-204-51Q372-455 372-500t31.5-76.5Q435-608 480-608t76.5 31.5Q588-545 588-500t-31.5 76.5Q525-392 480-392t-76.5-31.5ZM214-281.5Q94-363 40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200q-146 0-266-81.5ZM480-500Zm207.5 160.5Q782-399 832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280q113 0 207.5-59.5Z"/></svg>
                        
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
     </div>
</div>
<x-footer-user></x-footer-user>
</body>
</html>