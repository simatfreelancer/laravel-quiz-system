<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
<x-user-navbar ></x-user-navbar>
<div class="flex flex-col min-h-screen items-center bg-gray-100">
    <h1 class="text-3xl text-green-900 pt-5">Quiz Result</h1>

    {{-- show categories --}}
     <div class="max-w-4xl mx-auto mt-10 bg-white shadow-lg rounded-xl overflow-hidden">
        <div class="px-6 py-4 border-b bg-gray-50">
        <h2 class="text-2xl font-semibold text-blue-600 text-center">
           {{$correctAnswers}} Out of {{count($resultData)}} Correct
        </h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            
            <!-- Table Head -->
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="px-6 py-3">S.No.</th>
                    <th class="px-6 py-3">Question</th>
                     <th class="px-6 py-3">Answer</th>
                    <th class="px-6 py-3">Result</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="text-gray-600">
                @foreach ($resultData as $key => $item)
                <tr class="border-t hover:bg-gray-50 transition">
                    <td class="px-6 py-3">{{ $key+1 }}</td>
                    <td class="px-6 py-3 font-medium">{{ $item->question }}</td>
                    <td class="px-6 py-3">{{ $item->selected_answer }}</td>
                     @if($item->is_correct)
                     <td class="px-6 py-3 text-green-500">Correct</td>
                     @else 
                      <td class="px-6 py-3 text-red-500">Incorrect</td>
                      @endif

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