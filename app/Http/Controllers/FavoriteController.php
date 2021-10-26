<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Requests\FavoriteStoreRequest;
use App\Http\Requests\FavoriteUpdateRequest;

class FavoriteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Favorite::class);

        $search = $request->get('search', '');

        $favorites = Favorite::search($search)
            ->latest()
            ->paginate(5);

        return view('app.favorites.index', compact('favorites', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Favorite::class);

        $users = User::pluck('name', 'id');

        return view('app.favorites.create', compact('users'));
    }

    /**
     * @param \App\Http\Requests\FavoriteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FavoriteStoreRequest $request)
    {
        $this->authorize('create', Favorite::class);

        $validated = $request->validated();

        $favorite = Favorite::create($validated);

        return redirect()
            ->route('favorites.edit', $favorite)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Favorite $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Favorite $favorite)
    {
        $this->authorize('view', $favorite);

        return view('app.favorites.show', compact('favorite'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Favorite $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Favorite $favorite)
    {
        $this->authorize('update', $favorite);

        $users = User::pluck('name', 'id');

        return view('app.favorites.edit', compact('favorite', 'users'));
    }

    /**
     * @param \App\Http\Requests\FavoriteUpdateRequest $request
     * @param \App\Models\Favorite $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(FavoriteUpdateRequest $request, Favorite $favorite)
    {
        $this->authorize('update', $favorite);

        $validated = $request->validated();

        $favorite->update($validated);

        return redirect()
            ->route('favorites.edit', $favorite)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Favorite $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Favorite $favorite)
    {
        $this->authorize('delete', $favorite);

        $favorite->delete();

        return redirect()
            ->route('favorites.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
