<x-layout>
    <h1 class="font-bold text-xl">Leaderboard</h1>
    <p>Top 10 average scores</p>

    <div class="w-full">
        <div class="bg-white shadow-md rounded my-6">
            <table class="min-w-max w-full table-auto">
                <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">Member</th>
                    <th class="py-3 px-6">Average Score</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                @for($i = 0; $i < count($topMembers); $i++)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6">
                            {{ $topMembers[$i]->name }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            {{ number_format($topMembers[$i]->average_score, 2) }}
                        </td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex">
        <div class="p-4">
            <p class="font-bold">Current Highest Score:</p>
            <p>Name: {{ $currentHighestStats['currentHighestName'] }}</p>
            <p>Score: {{ $currentHighestStats['currentHighestScore'] }}</p>
            <p>Date: {{ $currentHighestStats['currentHighestDate'] }}</p>
            <p>Against: {{ $currentHighestStats['currentHighestAgainst'] }}</p>
        </div>
        <div class="p-4">
            <p class="font-bold">Current Lowest Score:</p>
            <p>Name: {{ $currentLowestStats['currentLowestName'] }}</p>
            <p>Score: {{ $currentLowestStats['currentLowestScore'] }}</p>
            <p>Date: {{ $currentLowestStats['currentLowestDate'] }}</p>
            <p>Against: {{ $currentLowestStats['currentLowestAgainst'] }}</p>
        </div>
    </div>

</x-layout>
