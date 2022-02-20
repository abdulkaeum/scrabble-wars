<x-layout>
    <div class="text-bold">Add Game</div>

    <form action="{{ route('game.store') }}" method="POST">
        @csrf

        <div class="mt-4 mb-4">

            <label>
                <select name="player_one" required
                        class="rounded px-4 form-input py-2 bg-gray-50 border border-gray-200 text-gray-700 focus:bg-white focus:outline-none">
                    <option value="null">Select player one</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </label>

            <label for="score_one">
                <input
                    class="rounded px-4 text-center py-2 bg-gray-50  border border-gray-200 text-gray-700 focus:bg-white focus:outline-none"
                    type="number"
                    name="score_one"
                    id="score_one"
                    placeholder="Player one score"
                    value="{{ old('score_one') }}"
                    required
                >
            </label>

            @error('score_one')
            <div class="text-red-700 text-sm mb-3">
                <p>
                    {{ $message }}
                </p>
            </div>
            @enderror

            <div class="mt-4 mb-4">

                <label>
                    <select name="player_two" required
                            class="rounded px-4 form-input py-2 bg-gray-50 border border-gray-200 text-gray-700 focus:bg-white focus:outline-none">
                        <option value="null">Select player two</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </label>

                <label for="score_two">
                    <input
                        class="rounded px-4 text-center form-input py-2 bg-gray-50 border border-gray-200 text-gray-700 focus:bg-white focus:outline-none"
                        type="number"
                        name="score_two"
                        id="score_two"
                        placeholder="Player two score"
                        value="{{ old('score_two') }}"
                        required
                    >
                </label>

                @error('score_two')
                <div class="text-red-700 text-sm mb-3">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror

                <div class="mt-4">
                    <button class="bg-gray-800 text-gray-200 px-3 py-2 rounded mt-1">
                        Add game
                    </button>
                </div>
            </div>
    </form>
</x-layout>
