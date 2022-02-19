<!doctype html>

<head>
    <title>Scrabble Wars</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
@include('partials._flash')

<div>
    <section class="px-8 py-10">
        <div class="mb-5 text-xl text-bold">
            <h1>Scrabble Wars</h1>
        </div>
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">
                <div class="bg-gray-200 p-5 rounded">
                    @include('partials._sidebar-links')
                </div>

                <div class="lg:flex-1 lg:mx-10 bg-gray-200 p-5 rounded">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </section>
</div>

<!-- AlpineJS -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
