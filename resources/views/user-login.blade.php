<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Signup</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">

<!-- Navbar -->
<x-user-navbar></x-user-navbar>

<!-- Signup Section -->
<div class="flex items-center justify-center pt-28 px-4">

    <div class="bg-white shadow-xl rounded-2xl w-full max-w-md p-8 border border-gray-200">

        <!-- Title -->
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">
            Login
        </h2>

        <p class="text-center text-gray-500 mb-6">
           Login to start attempting quizzes
        </p>



        <form action="/user-login" method="post" class="space-y-5">

        @csrf

      @csrf 

          <!-- Email -->
        <div>
            <label class="block text-gray-600 text-sm mb-2 font-medium">
              User  Email
            </label>

            <input 
            type="email" 
            name="email" 
            placeholder="Enter your email"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none transition"
            />

            @error('email')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>


        <!-- Password -->
        <div>
            <label class="block text-gray-600 text-sm mb-2 font-medium">
                Password
            </label>

            <input 
            type="password" 
            name="password"
            placeholder="Enter your password"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none transition"
            />

            @error('password')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>



        <!-- Button -->
        <button 
        type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition duration-300 shadow-md"
        >
           Login
        </button>


        <!-- Login Link -->
        <p class="text-center text-gray-500 text-sm mt-4">
            Want to create an account?
            <a href="/user-signup" class="text-blue-600 font-medium hover:underline">
               Signup
            </a>
        </p>

        </form>

    </div>

</div>

</body>
</html>