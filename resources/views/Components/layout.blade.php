<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <title>Logus </title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#060606] text-white">
    <div class="">
        <nav class="flex justify-between px-26 py-4">
            <div class="text-2xl">
                𝓛𝓸𝓰𝓾𝓼
            </div>
            <div class="flex justify-around gap-x-12 font-bold text-lg">
                <x-nav-links>AboutUs</x-nav-links>
                <x-nav-links>Blog</x-nav-links>
                <x-nav-links>Member</x-nav-links>
                <x-nav-links>Games</x-nav-links>

            </div>
            <div>acc</div>
        </nav>

        <main class="px-36 py-8">
            {{ $slot }}


        </main>

    </div>


</body>
</html>







