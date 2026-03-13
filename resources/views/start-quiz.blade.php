<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quiz</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">

<x-user-navbar></x-user-navbar>

<div class="max-w-5xl mx-auto px-6 pt-28 pb-16">

    <!-- Quiz Card -->
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">

        <!-- Header -->
        <div class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white px-8 py-10 text-center">

            <h1 class="text-3xl font-bold mb-2">
                {{$quizName}}
            </h1>

            <p class="text-indigo-100 text-lg">
                This quiz contains 
                <span class="font-semibold text-white">{{$quizCount}}</span> questions
            </p>

            <p class="text-indigo-100 mt-1">
                Unlimited attempts allowed
            </p>

            <p class="mt-4 text-sm font-medium tracking-wide">
                🎯 Good Luck!
            </p>

        </div>


        <!-- Quiz Info Section -->
        <div class="px-10 py-10 text-center">

            <div class="grid md:grid-cols-2 gap-6 mb-10">

                <div class="bg-gray-50 rounded-xl p-6 border">
                    <h3 class="text-gray-500 text-sm uppercase tracking-wide">
                        Total Questions
                    </h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">
                        {{$quizCount}}
                    </p>
                </div>

                <div class="bg-gray-50 rounded-xl p-6 border">
                    <h3 class="text-gray-500 text-sm uppercase tracking-wide">
                        Attempts
                    </h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">
                        Unlimited
                    </p>
                </div>

            </div>


            <!-- Start Quiz Button -->
           @if (session('user'))
            <a href="/mcq/{{session('firstMCQ')->id}}/{{$quizName}}"
               class="inline-block text-white bg-indigo-600 hover:bg-indigo-700  font-semibold px-8 py-3 rounded-lg shadow-md transition duration-300">

               Start Quiz
            </a>
               @else
            <a href="/user-signup-quiz"
               class="inline-block text-white bg-indigo-600 hover:bg-indigo-700 font-semibold px-8 py-3 rounded-lg shadow-md transition duration-300">

               Signup to Start Quiz
            </a>
            <a href="/user-login-quiz"
               class="inline-block text-white bg-indigo-600 hover:bg-indigo-700 font-semibold px-8 py-3 rounded-lg shadow-md transition duration-300">

               Login to Start Quiz
            </a>
             @endif

        </div>

    </div>

</div>

</body>
</html>