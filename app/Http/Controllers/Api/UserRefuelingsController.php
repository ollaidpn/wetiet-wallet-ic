<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RefuelingResource;
use App\Http\Resources\RefuelingCollection;

class UserRefuelingsController extends Controller
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

        $refuelings = $user
            ->refuelings()
            ->search($search)
            ->latest()
            ->paginate();

        return new RefuelingCollection($refuelings);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', Refueling::class);

        $validated = $request->validate([
            'shop_id' => 'required|exists:shops,id',
            'amount' => 'required|max:255',
            'token' => 'required|max:255|string',
        ]);

        $refueling = $user->refuelings()->create($validated);

        return new RefuelingResource($refueling);
    }
}
