{{-- resources/views/members/show.blade.php --}}
<x-layout>
    <div class="max-w-4xl mx-auto">
        {{-- Profile Header --}}
        <div class="bg-gradient-to-br from-purple-600/20 to-blue-600/20 backdrop-blur-sm border border-white/10 rounded-3xl p-8 mb-8 relative overflow-hidden">
            {{-- Background Pattern --}}
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #667eea 0%, transparent 50%), radial-gradient(circle at 75% 75%, #764ba2 0%, transparent 50%);"></div>
            </div>

            <div class="relative z-10">
                <div class="flex flex-col lg:flex-row items-start gap-8">
                    {{-- Avatar & Basic Info --}}
                    <div class="flex flex-col items-center text-center lg:text-left">
                        <div class="w-32 h-32 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center text-5xl mb-4 shadow-2xl">
                            🎮
                        </div>

                        <div class="flex items-center gap-3 mb-2">
                            <h1 class="text-3xl font-bold">{{ $user->name }}</h1>
                            @if($user->isOnline())
                                <div class="flex items-center gap-1">
                                    <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                                    <span class="text-sm text-green-400">Online</span>
                                </div>
                            @else
                                <span class="text-sm text-gray-400">
                                    Zuletzt aktiv: {{ $stats['lastSeen']->diffForHumans() }}
                                </span>
                            @endif
                        </div>

                        <div class="flex items-center gap-2 mb-4">
                            <span class="bg-gradient-to-r from-purple-600 to-blue-600 px-4 py-2 rounded-full text-sm font-bold">
                                {{ $user->level ?? 'Beginner' }} Gamer
                            </span>
                            <span class="text-gray-400 text-sm">
                                Seit {{ $stats['joinDate']->format('M Y') }}
                            </span>
                        </div>

                        @auth
                            @if(auth()->id() !== $user->id)
                                <div class="flex gap-3">
                                    <form action="{{ route('members.challenge', $user) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-gradient-to-r from-red-600 to-orange-600 hover:from-red-700 hover:to-orange-700 px-6 py-3 rounded-xl font-bold transition-all duration-300 hover:scale-105">
                                            ⚔️ Challenge
                                        </button>
                                    </form>
                                    <button class="border border-white/20 hover:bg-white/10 px-6 py-3 rounded-xl transition-colors">
                                        💬 Message
                                    </button>
                                </div>
                            @endif
                        @endauth
                    </div>

                    {{-- Stats Cards --}}
                    <div class="flex-1 grid grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-4 text-center">
                            <div class="text-2xl font-bold text-yellow-400 mb-1">
                                {{ number_format($stats['totalScore']) }}
                            </div>
                            <div class="text-xs text-gray-400">Total Score</div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-4 text-center">
                            <div class="text-2xl font-bold text-green-400 mb-1">
                                {{ $stats['gamesPlayed'] }}
                            </div>
                            <div class="text-xs text-gray-400">Games Played</div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-4 text-center">
                            <div class="text-2xl font-bold text-blue-400 mb-1">
                                {{ $stats['totalPosts'] }}
                            </div>
                            <div class="text-xs text-gray-400">Blog Posts</div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-4 text-center">
                            <div class="text-2xl font-bold text-purple-400 mb-1">
                                #{{ $user->rank ?? '?' }}
                            </div>
                            <div class="text-xs text-gray-400">Global Rank</div>
                        </div>
                    </div>
                </div>

                {{-- Bio Section --}}
                @if($user->bio)
                    <div class="mt-6 p-4 bg-white/5 rounded-2xl border border-white/10">
                        <h3 class="font-bold mb-2 text-gray-300">Bio</h3>
                        <p class="text-gray-400">{{ $user->bio }}</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-8">
                {{-- Recent Activity --}}
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6">
                    <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
                        <span class="text-2xl">⚡</span>
                        Recent Activity
                    </h2>

                    <div class="space-y-4">
                        {{-- Sample Activity Items --}}
                        <div class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/10">
                            <div class="w-10 h-10 bg-green-600/20 rounded-full flex items-center justify-center">
                                🎯
                            </div>
                            <div class="flex-1">
                                <p class="font-medium">Achieved new high score in Space Shooter</p>
                                <p class="text-sm text-gray-400">2 hours ago • Score: 87,450</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/10">
                            <div class="w-10 h-10 bg-blue-600/20 rounded-full flex items-center justify-center">
                                📝
                            </div>
                            <div class="flex-1">
                                <p class="font-medium">Published a new blog post</p>
                                <p class="text-sm text-gray-400">1 day ago • "Die besten Gaming-Setups 2025"</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/10">
                            <div class="w-10 h-10 bg-purple-600/20 rounded-full flex items-center justify-center">
