<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Quiz MCQs</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">

{{-- Navbar --}}
<x-navbar :name="$name" />

<div class="container mx-auto px-4 py-10">

    {{-- Back Button --}}
    <div class="mb-6">
        <a href="/add-quiz"
           class="inline-flex items-center gap-2 bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded-lg shadow-md transition duration-300">
            ← Back
        </a>
    </div>

    <h1 class="text-3xl font-bold text-center text-gray-800 mb-10">
        Quiz Name : {{$quizName}}
    </h1>

    @if(count($mcq) > 0)

        <div class="space-y-8">

            @foreach($mcq as $index => $question)
            <div class="bg-white shadow-md rounded-2xl p-6 border border-gray-200 hover:shadow-lg transition duration-300">

                {{-- Question --}}
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    Q{{ $index + 1 }}. {{ $question->question }}
                </h2>

                {{-- Options --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                    <div class="p-3 bg-gray-50 rounded-lg hover:bg-blue-50 transition">
                        A. {{ $question->a }}
                    </div>

                    <div class="p-3 bg-gray-50 rounded-lg hover:bg-blue-50 transition">
                        B. {{ $question->b }}
                    </div>

                    <div class="p-3 bg-gray-50 rounded-lg hover:bg-blue-50 transition">
                        C. {{ $question->c }}
                    </div>

                    <div class="p-3 bg-gray-50 rounded-lg hover:bg-blue-50 transition">
                        D. {{ $question->d }}
                    </div>

                </div>

                {{-- Correct Answer --}}
                <div class="mt-5">
                    <span class="inline-block bg-green-100 text-green-700 text-sm font-medium px-4 py-2 rounded-lg">
                        Correct Answer: {{ $question->correct_ans }}
                    </span>
                </div>

            </div>
            @endforeach

        </div>

    @else

        <div class="text-center text-gray-500 text-lg mt-20">
            No MCQs Found For This Quiz.
        </div>

    @endif

</div>

</body>
</html>