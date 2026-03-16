<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
<x-user-navbar ></x-user-navbar>

<div class="max-w-6xl mx-auto px-6 pt-24 pb-12">

    <!-- Card Container -->
    <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden mt-10">

        <!-- Header -->
        <div class="px-8 py-6  from-indigo-600 to-blue-600 bg-gradient-to-tl">
            <h2 class="text-2xl font-bold  tracking-wide">
                Category Name: <span class="font-medium">Secrch ::{{ $quiz }}</span>
            </h2>
        </div>

        <!-- Table Section -->
        <div class="p-8">

            <div class="overflow-x-auto">
                <table class="w-full border-separate border-spacing-y-2">

                    <!-- Table Head -->
                    <thead>
                        <tr class="text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                            <th class="px-6 py-3">Quiz ID</th>
                            <th class="px-6 py-3">Name</th>
                             <th class="px-6 py-3">Mcq Count</th>
                            <th class="px-6 py-3 text-center">Action</th>
                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($quizResult as $data)
                        <tr class="bg-gray-50 hover:bg-gray-100 transition duration-200 rounded-lg shadow-sm">
                            
                            <td class="px-6 py-4 text-gray-700 font-medium rounded-l-lg">
                                {{ $data->id }}
                            </td>

                            <td class="px-6 py-4 text-gray-800">
                                {{ $data->name }}
                            </td>
                             <td class="px-6 py-4 text-gray-800">
                                {{ $data->mcq_count }}
                            </td>
                            <td class="px-6 py-3 text-center">
                                @if($data->mcq_count >0)
                        <a href="/start-quiz/{{$data->id}}/{{$data->name}}">
                        <button 
                            class="bg-blue-500 hover:bg-red-600 text-white px-4 py-1 rounded-lg text-sm transition">
                           Attempt Quiz
                        </button>
                        @endif
                        </a>
                    </td>


                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>

    </div>

</div>

</body>
</html>