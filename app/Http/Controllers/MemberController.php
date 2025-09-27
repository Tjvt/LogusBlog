<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberController extends Controller
{
/**
* Display all community members.
*/
public function index(Request $request): View
{
$members = User::when($request->search, function ($query, $search) {
$query->where('name', 'like', "%{$search}%")
->orWhere('email', 'like', "%{$search}%");
})
->when($request->level, function ($query, $level) {
$query->where('level', $level);
})
->withCount(['posts', 'games_played']) // Falls Sie diese Relationships haben
->orderByDesc('score') // Angenommen Sie haben ein score-Feld
->paginate(16);

$stats = [
'totalMembers' => User::count(),
'onlineMembers' => User::where('last_seen', '>', now()->subMinutes(15))->count(),
'newMembers' => User::where('created_at', '>', now()->subWeek())->count(),
];

return view('members.index', compact('members', 'stats'));
}

/**
* Display a specific member's profile.
*/
public function show(User $user): View
{
// Member-Statistiken laden
$user->load(['posts' => function($query) {
$query->published()->latest()->take(5);
}]);

$stats = [
'totalPosts' => $user->posts()->published()->count(),
'totalScore' => $user->score ?? 0,
'gamesPlayed' => $user->games_played_count ?? 0,
'joinDate' => $user->created_at,
'lastSeen' => $user->last_seen ?? $user->updated_at,
];

return view('members.show', compact('user', 'stats'));
}

/**
* Show current user's profile.
*/
public function profile(): View
{
$user = auth()->user();
return $this->show($user);
}

/**
* Challenge another member.
*/
public function challenge(User $user)
{
// Challenge-Logic hier implementieren
// Z.B. Challenge-Model erstellen oder direkte Weiterleitung zum Spiel

return redirect()
->route('games.space-shooter')
->with('challenge', "Du hast {$user->name} zu einem Duell herausgefordert!");
}

/**
* Update current user's profile.
*/
public function updateProfile(Request $request)
{
$request->validate([
'name' => 'required|string|max:255',
'bio' => 'nullable|string|max:500',
'favorite_game' => 'nullable|string|max:255',
]);

auth()->user()->update($request->only(['name', 'bio', 'favorite_game']));

return back()->with('success', 'Profil erfolgreich aktualisiert!');
}
}
