<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FavoriteResource;
use App\Http\Resources\FavoriteCollection;

class UserFavoritesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $favorites = $user
            ->favorises()
            ->search($search)
            ->latest()
            ->paginate();

        return new FavoriteCollection($favorites);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', Favorite::class);

        $validated = $request->validate([
            'name' => 'required|max:255|string',
            'telephone' => 'required|max:255',
            'has_account' => 'nullable|max:255|string',
        ]);

        $favorite = $user->favorises()->create($validated);

        return new FavoriteResource($favorite);
    }
}
