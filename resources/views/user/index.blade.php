<x-layout>
    <div class="w-full">
        <div class="bg-white shadow-md rounded my-6">
            <table class="min-w-max w-full table-auto">
                <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">Member</th>
                    <th class="py-3 px-6">Email</th>
                    <th class="py-3 px-6">Joined</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                @forelse($users as $user)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6">
                            <a href="{{ route('user.edit', $user) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="{{ route('user.show', $user) }}">
                                &nbsp;{{ $user->name }}
                            </a>
                        </td>
                        <td class="py-3 px-6 text-center">
                            {{ $user->email }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            {{ $user->created_at->diffForHumans() }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">
                            No members added
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{ $users->links() }}
</x-layout>
