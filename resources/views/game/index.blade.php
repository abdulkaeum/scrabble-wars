<x-layout>
    <div class="text-bold">All Games</div>

    @foreach($games as $game)
        <ul>
            <li>{{ $game }}</li>
        </ul>
    @endforeach
</x-layout>
