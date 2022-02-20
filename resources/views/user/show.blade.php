<x-layout>
    <div class="text-lg bg-white p-4">
        {{ $user->name }}
    </div>

    <div class="mt-2 flex justify-between">
        <div class="p-3 w-80">
            <p>Member id: #{{ $user->id }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Joined: {{ $user->created_at->diffForHumans() }}</p>
        </div>
        <div class="p-3 flex-1">
            <p class="font-bold">Statistics</p>
            <p>Total games won #</p>
            <p>Total games lost #</p>
            <p>Average score #</p>
            <p>Highest score #</p>
            <ul class="ml-5">
                <li>Date: #</li>
                <li>Game: #</li>
                <li>Opponent: </li>
            </ul>
        </div>
    </div>
</x-layout>
