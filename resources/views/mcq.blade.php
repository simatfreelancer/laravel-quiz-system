<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quiz</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

<x-user-navbar></x-user-navbar>

<div class="flex flex-col items-center min-h-screen pt-10 px-4">

    <h1 class="text-3xl text-center text-green-800 font-bold mb-2">
        {{$quizName}}
    </h1>

    <h2 class="text-lg text-gray-600 mb-6">
       Total Questions  : {{session('currentQuiz')['totalMcq']}}
    </h2>
    <h2 class="text-lg text-gray-600 mb-6">
        {{session('currentQuiz')['currentMcq']}}
       of {{session('currentQuiz')['totalMcq']}}
    </h2>

    <div class="w-full max-w-xl bg-white p-6 rounded-xl shadow-lg">

        <h3 class="text-lg font-semibold text-gray-800 mb-4">
            {{$mcqData->question}}
        </h3>

        <form action="/submit-next/{{$mcqData->id}}"  method="post" class="space-y-3">
         @csrf
         <input type="hidden" name="id" value="{{$mcqData->id}}" />
            <label class="flex items-center border p-3 rounded-lg hover:bg-gray-50 cursor-pointer hover:text-blue-100 mt-4">
                <input type="radio" name="answer" class="mr-3 text-indigo-600" value="a" required>
                <span>
                    {{$mcqData->a}}
                </span>
            </label>

            <label class="flex items-center border p-3 rounded-lg hover:bg-gray-50 cursor-pointer hover:text-blue-100 mt-4">
                <input type="radio" name="answer" class="mr-3 text-indigo-600" value="b">
                <span>
                   {{$mcqData->b}}
                </span>
            </label>

            <label class="flex items-center border p-3 rounded-lg hover:bg-gray-50 cursor-pointer hover:text-blue-100 mt-4">
                <input type="radio" name="answer" class="mr-3 text-indigo-600" value="c">
                <span>
                    {{$mcqData->c}}
                </span>
            </label>

            <label class="flex items-center border p-3 rounded-lg hover:bg-gray-50 cursor-pointer hover:text-blue-100 ">
                <input type="radio" name="answer" class="mr-3 text-indigo-600" value="d">
                <span>
                    {{$mcqData->d}}
                </span>
            </label>

            <button
                type="submit"
                class="w-full mt-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg transition">
                Submit Anser and Next 
            </button>

        </form>

    </div>

</div>
<x-footer-user></x-footer-user>
</body>
</html>