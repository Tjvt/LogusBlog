{{-- resources/views/members/index.blade.php --}}
<x-layout>
    {{-- Hero Section --}}
    <section class="text-center py-16 relative overflow-hidden">
        {{-- Background Animation --}}
        <div class="absolute inset-0 overflow-hidden">
            @for($i = 0; $i < 30; $i++)
                <div class="absolute w-2 h-2 bg-purple-400/20 rounded-full animate-pulse"
                     style="left: {{ rand(0, 100) }}%; top: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 3000) }}ms;"></div>
            @endfor
        </div>

        <div class="relative z-10">
            <h1 class="text-5xl lg:text-7xl font-bold mb-6">
                <span class="bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent">Logus</span>
                Community
            </h1>
            <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Lerne unsere Gaming-Community kennen! Hier findest du alle Member, ihre Achievements und Gaming-Stats.
            </p>

            {{-- Quick Stats --}}
            <div class="flex justify-center gap-8 mb-8">
                <div class="text-center">
                    <div class="text-3xl font-bold text-purple-400">{{ $totalMembers ?? 247 }}</div>
                    <div class="text-gray-400 text-sm">Total Members</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-blue-400">{{ $onlineMembers ?? 18 }}</div>
                    <div class="text-gray-400 text-sm">Online Now</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-green-400">{{ $newMembers ?? 12 }}</div>
                    <div class="text-gray-400 text-sm">This Week</div>
                </div>
            </div>

            {{-- Search & Filter --}}
            <div class="max-w-2xl mx-auto flex flex-col md:flex-row gap-4">
                <div class="relative flex-1">
                    <x-input class="pl-12 w-full">Member suchen...</x-input>
                    <svg class="w-5 h-5 absolute left-4 top-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"></path>
                    </svg>
                </div>
                <select class="bg-white/10 border border-white/20 h-16 rounded-2xl text-white/80 px-4 focus:ring-2 focus:ring-purple-500 focus:outline-none">
                    <option value="">Alle Level</option>
                    <option value="beginner">Beginner</option>
                    <option value="advanced">Advanced</option>
                    <option value="pro">Pro Gamer</option>
                    <option value="legend">Legend</option>
                </select>
            </div>
        </div>
    </section>

    {{-- Top Performers --}}
    <section class="mb-16">
        <h2 class="text-3xl font-bold text-center mb-8 flex items-center justify-center gap-3">
            <span class="text-4xl">🏆</span>
            Top Performers
        </h2>

        <div class="grid md:grid-cols-3 gap-6 mb-8">
            {{-- 1st Place --}}
            <div class="bg-gradient-to-br from-yellow-600/20 to-orange-600/20 backdrop-blur-sm border-2 border-yellow-500/30 rounded-3xl p-6 text-center relative overflow-hidden hover:-translate-y-2 transition-all duration-300">
                <div class="absolute top-4 right-4 text-2xl">🥇</div>
                <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-gradient-to-br from-yellow-400 to-orange-500 flex items-center justify-center text-3xl font-bold shadow-lg">
                    🎮
                </div>
                <h3 class="text-xl font-bold mb-2">GameMaster_Pro</h3>
                <p class="text-gray-300 text-sm mb-3">Legend Rank</p>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-400">High Score:</span>
                        <span class="text-yellow-400 font-bold">127,350</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Games Won:</span>
                        <span class="text-green-400 font-bold">89%</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Streak:</span>
                        <span class="text-orange-400 font-bold">15 🔥</span>
                    </div>
                </div>
            </div>

            {{-- 2nd Place --}}
            <div class="bg-gradient-to-br from-gray-400/20 to-gray-600/20 backdrop-blur-sm border-2 border-gray-400/30 rounded-3xl p-6 text-center relative overflow-hidden hover:-translate-y-2 transition-all duration-300">
                <div class="absolute top-4 right-4 text-2xl">🥈</div>
                <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 flex items-center justify-center text-3xl font-bold shadow-lg">
                    ⚡
                </div>
                <h3 class="text-xl font-bold mb-2">SpeedRunner99</h3>
                <p class="text-gray-300 text-sm mb-3">Pro Rank</p>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-400">High Score:</span>
                        <span class="text-yellow-400 font-bold">98,720</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Games Won:</span>
                        <span class="text-green-400 font-bold">76%</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Streak:</span>
                        <span class="text-orange-400 font-bold">8</span>
                    </div>
                </div>
            </div>

            {{-- 3rd Place --}}
            <div class="bg-gradient-to-br from-orange-600/20 to-red-600/20 backdrop-blur-sm border-2 border-orange-500/30 rounded-3xl p-6 text-center relative overflow-hidden hover:-translate-y-2 transition-all duration-300">
                <div class="absolute top-4 right-4 text-2xl">🥉</div>
                <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center text-3xl font-bold shadow-lg">
                    🚀
                </div>
                <h3 class="text-xl font-bold mb-2">RetroGamer</h3>
                <p class="text-gray-300 text-sm mb-3">Pro Rank</p>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-400">High Score:</span>
                        <span class="text-yellow-400 font-bold">87,440</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Games Won:</span>
                        <span class="text-green-400 font-bold">72%</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Streak:</span>
                        <span class="text-orange-400 font-bold">12</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- All Members Grid --}}
    <section class="mb-16">
        <h2 class="text-3xl font-bold mb-8 flex items-center justify-between">
            <span>Alle Member</span>
            <div class="flex gap-2">
                <button class="bg-white/10 hover:bg-purple-600/20 px-4 py-2 rounded-lg text-sm transition-colors">
                    Grid
                </button>
                <button class="bg-white/10 hover:bg-purple-600/20 px-4 py-2 rounded-lg text-sm transition-colors">
                    Liste
                </button>
            </div>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            {{-- Sample Members --}}
            @php
                $sampleMembers = [
                    ['name' => 'AlexGamer', 'level' => 'Advanced', 'score' => 45620, 'status' => 'online', 'avatar' => '🎯'],
                    ['name' => 'PixelHunter', 'level' => 'Pro', 'score' => 67890, 'status' => 'offline', 'avatar' => '🎨'],
                    ['name' => 'CodeNinja', 'level' => 'Beginner', 'score' => 12340, 'status' => 'online', 'avatar' => '💻'],
                    ['name' => 'StarFighter', 'level' => 'Advanced', 'score' => 54320, 'status' => 'away', 'avatar' => '⭐'],
                    ['name' => 'GameQueen', 'level' => 'Pro', 'score' => 78910, 'status' => 'online', 'avatar' => '👑'],
                    ['name' => 'RetroKid', 'level' => 'Advanced', 'score' => 43210, 'status' => 'offline', 'avatar' => '🕹️'],
                    ['name' => 'SpaceExplorer', 'level' => 'Beginner', 'score' => 23450, 'status' => 'online', 'avatar' => '🚀'],
                    ['name' => 'PuzzleMaster', 'level' => 'Pro', 'score' => 65430, 'status' => 'offline', 'avatar' => '🧩'],
                ];
            @endphp

            @foreach($sampleMembers as $member)
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6 hover:-translate-y-1 hover:shadow-xl hover:shadow-purple-500/10 transition-all duration-300 group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center text-2xl shadow-lg">
                            {{ $member['avatar'] }}
                        </div>
                        <div class="flex items-center gap-2">
                            @if($member['status'] === 'online')
                                <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-xs text-green-400">Online</span>
                            @elseif($member['status'] === 'away')
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <span class="text-xs text-yellow-400">Away</span>
                            @else
                                <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
                                <span class="text-xs text-gray-400">Offline</span>
                            @endif
                        </div>
                    </div>

                    <h3 class="text-lg font-bold mb-2 group-hover:text-purple-400 transition-colors">
                        {{ $member['name'] }}
                    </h3>

                    <div class="space-y-2 text-sm mb-4">
                        <div class="flex justify-between">
                            <span class="text-gray-400">Level:</span>
                            <span class="font-medium
                                @if($member['level'] === 'Beginner') text-green-400
                                @elseif($member['level'] === 'Advanced') text-blue-400
                                @elseif($member['level'] === 'Pro') text-purple-400
                                @else text-yellow-400 @endif">
                                {{ $member['level'] }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Score:</span>
                            <span class="text-yellow-400 font-bold">{{ number_format($member['score']) }}</span>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 bg-purple-600/20 hover:bg-purple-600/40 py-2 px-3 rounded-lg text-sm transition-colors">
                            Profil
                        </button>
                        <button class="flex-1 bg-blue-600/20 hover:bg-blue-600/40 py-2 px-3 rounded-lg text-sm transition-colors">
                            Challenge
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Load More Button --}}
        <div class="text-center mt-8">
            <button class="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 px-8 py-4 rounded-xl font-bold transition-all duration-300 hover:scale-105">
                Mehr Member laden
            </button>
        </div>
    </section>

    {{-- Join Community CTA --}}
    <section class="bg-gradient-to-br from-purple-600/20 to-blue-600/20 backdrop-blur-sm border border-white/10 rounded-3xl p-8 lg:p-12 text-center">
        <h2 class="text-4xl font-bold mb-4">Werde Teil der Community! 🎮</h2>
        <p class="text-gray-300 mb-8 max-w-2xl mx-auto text-lg">
            Schließe dich hunderten von Gamern an, teile deine Erfolge, fordere andere heraus und klettere die Ranglisten hoch!
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-8">
            <a href="/register" class="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 hover:scale-105">
                Account erstellen
            </a>
            <a href="/login" class="border-2 border-white/20 hover:border-purple-400 hover:bg-white/5 py-4 px-8 rounded-xl font-bold transition-all duration-300">
                Einloggen
            </a>
        </div>

        {{-- Community Features --}}
        <div class="grid md:grid-cols-3 gap-6 mt-8">
            <div class="text-center">
                <div class="text-3xl mb-2">🏆</div>
                <h3 class="font-bold mb-2">Achievements</h3>
                <p class="text-gray-400 text-sm">Sammle Trophäen und zeige deine Erfolge</p>
            </div>
            <div class="text-center">
                <div class="text-3xl mb-2">⚔️</div>
                <h3 class="font-bold mb-2">Challenges</h3>
                <p class="text-gray-400 text-sm">Fordere andere Spieler heraus</p>
            </div>
            <div class="text-center">
                <div class="text-3xl mb-2">📊</div>
                <h3 class="font-bold mb-2">Statistiken</h3>
                <p class="text-gray-400 text-sm">Verfolge deinen Fortschritt</p>
            </div>
        </div>
    </section>
</x-layout>
