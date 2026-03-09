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
            Create Account
        </h2>

        <p class="text-center text-gray-500 mb-6">
            Sign up to start attempting quizzes
        </p>

        <!-- Error -->
        @error('user')
        <div class="bg-red-100 text-red-600 px-4 py-2 rounded-lg mb-4 text-sm">
            {{$message}}
        </div>
        @enderror


        <form action="/user-signup" method="post" class="space-y-5">

        @csrf

        <!-- Name -->
        <div>
            <label class="block text-gray-600 text-sm mb-2 font-medium">
                User Name
            </label>

            <input 
            type="text" 
            name="name" 
            placeholder="Enter your name"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none transition"
            />

            @error('name')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>

          <!-- Email -->
        <div>
            <label class="block text-gray-600 text-sm mb-2 font-medium">
                Email
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

        <!-- Confirm Password -->
        <div>
            <label class="block text-gray-600 text-sm mb-2 font-medium">
               Confirm Password
            </label>

            <input 
             type="password" 
             name="password_confirmation"
             placeholder="Confirm password"
             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none transition"
              />

           @error('password_confirmation')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>



        <!-- Button -->
        <button 
        type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition duration-300 shadow-md"
        >
            Create Account
        </button>


        <!-- Login Link -->
        <p class="text-center text-gray-500 text-sm mt-4">
            Already have an account?
            <a href="/login" class="text-blue-600 font-medium hover:underline">
                Login
            </a>
        </p>

        </form>

    </div>

</div>

</body>
</html>