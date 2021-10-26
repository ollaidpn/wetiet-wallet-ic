<?php

namespace App\Http\Controllers\Api;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RefuelingResource;
use App\Http\Resources\RefuelingCollection;

class ShopRefuelingsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Shop $shop)
    {
        $this->authorize('view', $shop);

        $search = $request->get('search', '');

        $refuelings = $shop
            ->refuelings()
            ->search($search)
            ->latest()
            ->paginate();

        return new RefuelingCollection($refuelings);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Shop $shop)
    {
        $this->authorize('create', Refueling::class);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|max:255',
            'token' => 'required|max:255|string',
        ]);

        $refueling = $shop->refuelings()->create($validated);

        return new RefuelingResource($refueling);
    }
}
