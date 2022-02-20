<x-layout>

    <div class="text-bold">Add Member</div>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <div class="mt-4 mb-4">
            <label for="name">

            </label>

            <input
                class="rounded px-4 w-96 py-2 bg-gray-50  border border-gray-200 text-gray-700 focus:bg-white focus:outline-none"
                type="text"
                name="name"
                id="name"
                placeholder="Member name"
                value="{{ old('name') }}"
                required
            >

            @error('name')
            <div class="text-red-700 text-sm mb-3">
                <p>
                    {{ $message }}
                </p>
            </div>
            @enderror

            <div class="mt-4 mb-4">
                <label for="email">

                </label>

                <input
                    class="rounded px-4 w-96 form-input py-2 bg-gray-50 border border-gray-200 text-gray-700 focus:bg-white focus:outline-none"
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Email address"
                    value="{{ old('email') }}"
                    required
                >

                @error('email')
                <div class="text-red-700 text-sm mb-3">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror

                <div class="mt-4">
                    <button class="bg-gray-800 text-gray-200 px-3 py-2 rounded mt-1">
                        Add member
                    </button>
                </div>
            </div>
    </form>
</x-layout>
