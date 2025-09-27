<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Logus Gaming Blog' }}</title>
    @vite('resources/css/app.css')

    {{-- Optional: Meta Tags für SEO --}}
    <meta name="description" content="{{ $description ?? 'Logus - Gaming Blog, Reviews und Community' }}">
    <meta name="keywords" content="Gaming, Blog, Reviews, Logus, Games">
</head>
<body class="bg-[#060606] text-white min-h-screen">
<div class="flex flex-col min-h-screen">
    <nav class="flex justify-between items-center px-8 lg:px-26 py-6 relative z-50">
        {{-- Logo --}}
        <div class="text-2xl lg:text-3xl">
            <a href="/" class="bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent font-bold hover:scale-105 transition-transform duration-300">
                𝓛𝓸𝓰𝓾𝓼
            </a>
        </div>

        {{-- Desktop Navigation --}}
        <div class="hidden lg:flex justify-around gap-x-12 font-bold text-lg">
            <x-nav-links href="/" :active="request()->is('/')">Home</x-nav-links>
            <x-nav-links href="/blog" :active="request()->is('blog*')">Blog</x-nav-links>
            <x-nav-links href="/members" :active="request()->is('members*')">Members</x-nav-links>
            <x-nav-links href="/games" :active="request()->is('games*')">Games</x-nav-links>
        </div>

        {{-- Account Section --}}
        <div class="hidden lg:flex items-center gap-4">
            @auth
                <div class="relative group">
                    <button class="flex items-center gap-2 bg-white/10 hover:bg-white/20 px-4 py-2 rounded-xl transition-colors">
                        <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-blue-500 rounded-full flex items-center justify-center text-sm">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <span>{{ auth()->user()->name }}</span>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    {{-- Dropdown Menu --}}
                    <div class="absolute right-0 mt-2 w-48 bg-gray-900/95 backdrop-blur-sm border border-white/10 rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                        <a href="/profile" class="block px-4 py-3 hover:bg-white/10 transition-colors rounded-t-xl">
                            👤 Profil
                        </a>
                        <a href="/profile" class="block px-4 py-3 hover:bg-white/10 transition-colors">
                            ⚙️ Einstellungen
                        </a>
                        <hr class="border-white/10">
                        <form method="POST" action="/logout" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-3 hover:bg-red-600/20 text-red-400 transition-colors rounded-b-xl">
                                🚪 Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="flex items-center gap-3">
                    <a href="/login" class="hover:text-purple-400 transition-colors">Login</a>
                    <a href="/register" class="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 px-4 py-2 rounded-xl transition-all duration-300 hover:scale-105">
                        Register
                    </a>
                </div>
            @endauth
        </div>

        {{-- Mobile Menu Button --}}
        <button id="mobile-menu-btn" class="lg:hidden flex flex-col gap-1 p-2">
            <span class="w-6 h-0.5 bg-white transition-all duration-300"></span>
            <span class="w-6 h-0.5 bg-white transition-all duration-300"></span>
            <span class="w-6 h-0.5 bg-white transition-all duration-300"></span>
        </button>
    </nav>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="lg:hidden fixed inset-0 bg-black/95 backdrop-blur-sm z-40 opacity-0 invisible transition-all duration-300">
        <div class="flex flex-col items-center justify-center h-full gap-8 text-xl">
            <a href="/" class="hover:text-purple-400 transition-colors">Home</a>
            <a href="/blog" class="hover:text-purple-400 transition-colors">Blog</a>
            <a href="/members" class="hover:text-purple-400 transition-colors">Members</a>
            <a href="/games" class="hover:text-purple-400 transition-colors">Games</a>

            @auth
                <hr class="w-32 border-white/20">
                <a href="/profile" class="hover:text-purple-400 transition-colors">Profil</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="text-red-400 hover:text-red-300 transition-colors">Logout</button>
                </form>
            @else
                <hr class="w-32 border-white/20">
                <a href="/login" class="hover:text-purple-400 transition-colors">Login</a>
                <a href="/register" class="bg-gradient-to-r from-purple-600 to-blue-600 px-6 py-3 rounded-xl">Register</a>
            @endauth
        </div>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="mx-8 lg:mx-26 mb-4 bg-green-600/20 border border-green-500/30 text-green-300 px-4 py-3 rounded-xl">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mx-8 lg:mx-26 mb-4 bg-red-600/20 border border-red-500/30 text-red-300 px-4 py-3 rounded-xl">
            ❌ {{ session('error') }}
        </div>
    @endif

    @if(session('challenge'))
        <div class="mx-8 lg:mx-26 mb-4 bg-orange-600/20 border border-orange-500/30 text-orange-300 px-4 py-3 rounded-xl">
            ⚔️ {{ session('challenge') }}
        </div>
    @endif

    {{-- Main Content --}}
    <main class="flex-1 px-8 lg:px-36 py-8">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-white/5 backdrop-blur-sm border-t border-white/10 mt-16">
        <div class="px-8 lg:px-36 py-12">
            <div class="grid md:grid-cols-4 gap-8">
                {{-- Logo & Description --}}
                <div class="md:col-span-2">
                    <div class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent mb-4">
                        𝓛𝓸𝓰𝓾𝓼
                    </div>
                    <p class="text-gray-400 mb-4">
                        Die ultimative Gaming-Community für Enthusiasten. Reviews, News, Diskussionen und mehr!
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-purple-600/20 rounded-full flex items-center justify-center transition-colors">
                            📧
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-blue-600/20 rounded-full flex items-center justify-center transition-colors">
                            🐦
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-red-600/20 rounded-full flex items-center justify-center transition-colors">
                            📺
                        </a>
                    </div>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h3 class="font-bold mb-4">Quick Links</h3>
                    <div class="space-y-2 text-gray-400">
                        <a href="/blog" class="block hover:text-white transition-colors">Blog</a>
                        <a href="/games" class="block hover:text-white transition-colors">Games</a>
                        <a href="/members" class="block hover:text-white transition-colors">Community</a>
                        <a href="#" class="block hover:text-white transition-colors">Reviews</a>
                    </div>
                </div>

                {{-- Legal --}}
                <div>
                    <h3 class="font-bold mb-4">Legal</h3>
                    <div class="space-y-2 text-gray-400">
                        <a href="#" class="block hover:text-white transition-colors">Impressum</a>
                        <a href="#" class="block hover:text-white transition-colors">Datenschutz</a>
                        <a href="#" class="block hover:text-white transition-colors">AGB</a>
                        <a href="#" class="block hover:text-white transition-colors">Kontakt</a>
                    </div>
                </div>
            </div>

            <hr class="border-white/10 my-8">

            <div class="flex flex-col md:flex-row justify-between items-center text-gray-400">
                <p>&copy; {{ date('Y') }} Logus Gaming Blog. Alle Rechte vorbehalten.</p>
                <p class="text-sm">Made with ❤️ for Gamers</p>
            </div>
        </div>
    </footer>
</div>

{{-- Mobile Menu JavaScript --}}
<script>
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuBtn.addEventListener('click', () => {
        const isVisible = mobileMenu.classList.contains('opacity-100');

        if (isVisible) {
            mobileMenu.classList.remove('opacity-100', 'visible');
            mobileMenu.classList.add('opacity-0', 'invisible');
        } else {
            mobileMenu.classList.remove('opacity-0', 'invisible');
            mobileMenu.classList.add('opacity-100', 'visible');
        }
    });

    // Close mobile menu when clicking on a link
    mobileMenu.addEventListener('click', (e) => {
        if (e.target.tagName === 'A') {
            mobileMenu.classList.remove('opacity-100', 'visible');
            mobileMenu.classList.add('opacity-0', 'invisible');
        }
    });
</script>
</body>
</html>
