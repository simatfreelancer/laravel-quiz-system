<!DOCTYPE html>
<html lang="en">
<head>
    <title>Attempted Quiz</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

<x-user-navbar></x-user-navbar>

<div class="flex justify-center items-start min-h-screen py-10 px-4">

    <div class="w-full max-w-4xl bg-white shadow-xl rounded-2xl overflow-hidden">

        <!-- Header -->
        <div class="px-6 py-4 bg-gradient-to-r from-indigo-600 to-blue-500">
            <h2 class="text-2xl font-bold text-white tracking-wide">
                Attempted Quiz
            </h2>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">

                <!-- Head -->
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-4">S.No</th>
                        <th class="px-6 py-4">Quiz Name</th>
                        <th class="px-6 py-4">Status</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody class="divide-y divide-gray-200">

                    @foreach ($quizRecord as $key => $record)
                    <tr class="hover:bg-blue-50 transition duration-200">

                        <td class="px-6 py-4 font-semibold text-gray-700">
                            {{ $key+1 }}
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $record->name }}
                        </td>

                        <td class="px-6 py-4">

                            @if($record->status == 2)
                                <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">
                                    Completed
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold text-yellow-700 bg-yellow-100 rounded-full">
                                    Pending
                                </span>
                            @endif

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