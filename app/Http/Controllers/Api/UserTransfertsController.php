<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransfertResource;
use App\Http\Resources\TransfertCollection;

class UserTransfertsController extends Controller
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

        $transferts = $user
            ->transferts()
            ->search($search)
            ->latest()
            ->paginate();

        return new TransfertCollection($transferts);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', Transfert::class);

        $validated = $request->validate([
            'to_phone' => 'required|max:255',
            'contact_id' => 'nullable|numeric',
            'amount' => 'required|max:255',
            'roken' => 'required|max:255|string',
        ]);

        $transfert = $user->transferts()->create($validated);

        return new TransfertResource($transfert);
    }
}
