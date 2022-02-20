<ul>
    <li>
        <a class="text-lg mb-4 block hover:text-blue-400 {{ Request::routeIs('user.index') ? 'text-blue-400' : '' }}"
           href="{{ route('user.index') }}">
            <i class="fas fa-user-plus mr-2"></i> Members
        </a>
    </li>
    <li>
        <a class="text-lg mb-4 block hover:text-blue-400 {{ Request::routeIs('user.create') ? 'text-blue-400' : '' }}"
           href="{{ route('user.create') }}">
            <i class="fas fa-user mr-2"></i> Add Member
        </a>
    </li>
    <li>
        <a class="text-lg mb-4 block hover:text-blue-400 {{ Request::routeIs('game.create') ? 'text-blue-400' : '' }}"
           href="{{ route('game.create') }}">
            <i class="fas fa-gamepad mr-2"></i> Add Game
        </a>
    </li>
    <li>
        <a class="text-lg mb-4 block hover:text-blue-400 {{ Request::routeIs('home') ? 'text-blue-400' : '' }}"
           href="/">
            <i class="fas fa-chart-bar mr-2"></i> Leaderboard
        </a>
    </li>
</ul>
