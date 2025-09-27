{{-- resources/views/games/index.blade.php --}}
<x-layout>
    {{-- Hero Section --}}
    <section class="text-center py-16">
        <h1 class="text-5xl lg:text-7xl font-bold mb-6">
            <span class="bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent">Logus</span> Games
        </h1>
        <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
            Spiele coole Browser-Games direkt hier! Keine Downloads, kein Stress - einfach losspielen!
        </p>
    </section>

    {{-- Featured Game --}}
    <section class="mb-16">
        <h2 class="text-3xl font-bold text-center mb-8">🌟 Featured Game</h2>

        <div class="bg-gradient-to-br from-purple-600/20 to-blue-600/20 backdrop-blur-sm border border-white/10 rounded-3xl p-8 hover:-translate-y-2 hover:shadow-2xl hover:shadow-purple-500/20 transition-all duration-300 group">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="bg-red-600 text-xs px-3 py-1 rounded-full font-bold animate-pulse">NEU</span>
                        <span class="text-gray-400">Action • Shooter</span>
                    </div>
                    <h3 class="text-4xl font-bold mb-4 group-hover:text-purple-400 transition-colors">🚀 Space Shooter</h3>
                    <p class="text-gray-300 mb-6 text-lg">
                        Verteidige die Galaxis gegen feindliche Aliens! Ein klassischer Arcade-Shooter mit modernen Grafiken und progressiven Levels. Wie lange kannst du überleben?
                    </p>

                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Tastatur-Steuerung</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Progressive Levels</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Score System</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Particle Effects</span>
                    </div>

                    <a href="/games/space-shooter"
                       class="inline-flex items-center gap-3 bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-purple-500/30">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                        </svg>
                        Jetzt spielen
                    </a>
                </div>

                <div class="relative">
                    <div class="bg-black/50 rounded-2xl p-4 border border-purple-500/30">
                        <div class="aspect-video bg-gradient-to-br from-gray-900 via-blue-900 to-black rounded-lg flex items-center justify-center relative overflow-hidden">
                            {{-- Game Preview Animation --}}
                            <div class="absolute inset-0">
                                @for($i = 0; $i < 20; $i++)
                                    <div class="absolute w-1 h-1 bg-white rounded-full animate-ping"
                                         style="left: {{ rand(10, 90) }}%; top: {{ rand(10, 90) }}%; animation-delay: {{ rand(0, 2000) }}ms;"></div>
                                @endfor
                            </div>

                            <div class="relative z-10 text-center">
                                <div class="text-6xl mb-4 animate-bounce">🚀</div>
                                <p class="text-gray-300">Spiel-Vorschau</p>
                            </div>
                        </div>
                    </div>

                    {{-- Stats --}}
                    <div class="flex justify-around mt-4 text-center">
                        <div>
                            <div class="text-2xl font-bold text-yellow-400">★ 4.8</div>
                            <div class="text-xs text-gray-400">Rating</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-green-400">1.2k</div>
                            <div class="text-xs text-gray-400">Plays</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-blue-400">15min</div>
                            <div class="text-xs text-gray-400">Avg. Zeit</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Coming Soon Games --}}
    <section class="mb-16">
        <h2 class="text-3xl font-bold text-center mb-8">🚧 Coming Soon</h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Game Card 1 --}}
            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden hover:-translate-y-1 transition-all duration-300 opacity-75">
                <div class="h-48 bg-gradient-to-br from-green-600 to-blue-600 flex items-center justify-center relative">
                    <div class="text-6xl">🎮</div>
                    <div class="absolute top-3 right-3 bg-yellow-600 text-xs px-2 py-1 rounded-full font-bold">BALD</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Puzzle Quest</h3>
                    <p class="text-gray-400 text-sm mb-4">Knifflige Rätsel und logische Herausforderungen warten auf dich!</p>
                    <div class="flex gap-2">
                        <span class="bg-white/10 px-2 py-1 rounded text-xs">Puzzle</span>
                        <span class="bg-white/10 px-2 py-1 rounded text-xs">Logic</span>
                    </div>
                </div>
            </div>

            {{-- Game Card 2 --}}
            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden hover:-translate-y-1 transition-all duration-300 opacity-75">
                <div class="h-48 bg-gradient-to-br from-red-600 to-orange-600 flex items-center justify-center relative">
                    <div class="text-6xl">🏎️</div>
                    <div class="absolute top-3 right-3 bg-yellow-600 text-xs px-2 py-1 rounded-full font-bold">SOON</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Racing Rush</h3>
                    <p class="text-gray-400 text-sm mb-4">High-Speed Racing Action mit atemberaubenden Strecken!</p>
                    <div class="flex gap-2">
                        <span class="bg-white/10 px-2 py-1 rounded text-xs">Racing</span>
                        <span class="bg-white/10 px-2 py-1 rounded text-xs">Speed</span>
                    </div>
                </div>
            </div>

            {{-- Game Card 3 --}}
            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden hover:-translate-y-1 transition-all duration-300 opacity-75">
                <div class="h-48 bg-gradient-to-br from-purple-600 to-pink-600 flex items-center justify-center relative">
                    <div class="text-6xl">🧙‍♂️</div>
                    <div class="absolute top-3 right-3 bg-blue-600 text-xs px-2 py-1 rounded-full font-bold">2025</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Magic Tower</h3>
                    <p class="text-gray-400 text-sm mb-4">Ein episches Fantasy-Adventure mit Magie und Monstern!</p>
                    <div class="flex gap-2">
                        <span class="bg-white/10 px-2 py-1 rounded text-xs">RPG</span>
                        <span class="bg-white/10 px-2 py-1 rounded text-xs">Fantasy</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Game Suggestions --}}
    <section class="bg-gradient-to-r from-purple-600/10 to-blue-600/10 backdrop-blur-sm border border-white/10 rounded-3xl p-8 text-center">
        <h2 class="text-3xl font-bold mb-4">🎯 Game-Vorschläge?</h2>
        <p class="text-gray-300 mb-6 max-w-2xl mx-auto">
            Hast du Ideen für neue Spiele? Wir sind immer auf der Suche nach coolen Game-Konzepten!
            Schreib uns deine Vorschläge und vielleicht wird dein Traum-Spiel Realität.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
            <x-input type="text" class="flex-1">Deine Spiel-Idee...</x-input>
            <button class="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 px-8 py-4 rounded-2xl font-bold transition-all duration-300 hover:scale-105">
                Vorschlagen
            </button>
        </div>

        {{-- Popular Game Types --}}
        <div class="mt-8">
            <p class="text-gray-400 mb-4">Beliebte Game-Kategorien:</p>
            <div class="flex flex-wrap justify-center gap-3">
                <span class="bg-white/10 px-4 py-2 rounded-full text-sm hover:bg-purple-600/20 transition-colors cursor-pointer">🎯 Arcade</span>
                <span class="bg-white/10 px-4 py-2 rounded-full text-sm hover:bg-purple-600/20 transition-colors cursor-pointer">🧩 Puzzle</span>
                <span class="bg-white/10 px-4 py-2 rounded-full text-sm hover:bg-purple-600/20 transition-colors cursor-pointer">🏁 Racing</span>
                <span class="bg-white/10 px-4 py-2 rounded-full text-sm hover:bg-purple-600/20 transition-colors cursor-pointer">⚔️ Action</span>
                <span class="bg-white/10 px-4 py-2 rounded-full text-sm hover:bg-purple-600/20 transition-colors cursor-pointer">🌍 Adventure</span>
                <span class="bg-white/10 px-4 py-2 rounded-full text-sm hover:bg-purple-600/20 transition-colors cursor-pointer">🧠 Strategy</span>
            </div>
        </div>
    </section>

    {{-- Quick Stats --}}
    <section class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="text-center p-6 bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl">
            <div class="text-3xl font-bold text-purple-400 mb-2">1</div>
            <div class="text-gray-400 text-sm">Verfügbare Spiele</div>
        </div>
        <div class="text-center p-6 bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl">
            <div class="text-3xl font-bold text-blue-400 mb-2">1.2k+</div>
            <div class="text-gray-400 text-sm">Gespielte Runden</div>
        </div>
        <div class="text-center p-6 bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl">
            <div class="text-3xl font-bold text-green-400 mb-2">350+</div>
            <div class="text-gray-400 text-sm">Aktive Spieler</div>
        </div>
        <div class="text-center p-6 bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl">
            <div class="text-3xl font-bold text-yellow-400 mb-2">3</div>
            <div class="text-gray-400 text-sm">Kommende Spiele</div>
        </div>
    </section>
</x-layout>
