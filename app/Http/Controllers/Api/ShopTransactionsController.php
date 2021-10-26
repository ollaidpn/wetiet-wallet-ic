<?php

namespace App\Http\Controllers\Api;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use App\Http\Resources\TransactionCollection;

class ShopTransactionsController extends Controller
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

        $transactions = $shop
            ->transactions()
            ->search($search)
            ->latest()
            ->paginate();

        return new TransactionCollection($transactions);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Shop $shop)
    {
        $this->authorize('create', Transaction::class);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|max:255',
            'type' => 'required|max:255|string',
            'token' => 'required|max:255',
        ]);

        $transaction = $shop->transactions()->create($validated);

        return new TransactionResource($transaction);
    }
}
