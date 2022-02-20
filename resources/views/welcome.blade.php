<x-layout>
    <h1>Leaderboard</h1>
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
</x-layout>
