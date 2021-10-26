<?php

namespace App\Http\Controllers\Api;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FavoriteResource;
use App\Http\Resources\FavoriteCollection;
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
            ->paginate();

        return new FavoriteCollection($favorites);
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

        return new FavoriteResource($favorite);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Favorite $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Favorite $favorite)
    {
        $this->authorize('view', $favorite);

        return new FavoriteResource($favorite);
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

        return new FavoriteResource($favorite);
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

        return response()->noContent();
    }
}
