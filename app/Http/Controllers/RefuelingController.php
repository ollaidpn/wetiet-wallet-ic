<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shop;
use App\Models\Refueling;
use Illuminate\Http\Request;
use App\Http\Requests\RefuelingStoreRequest;
use App\Http\Requests\RefuelingUpdateRequest;

class RefuelingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Refueling::class);

        $search = $request->get('search', '');

        $refuelings = Refueling::search($search)
            ->latest()
            ->paginate(5);

        return view('app.refuelings.index', compact('refuelings', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Refueling::class);

        $users = User::pluck('name', 'id');
        $shops = Shop::pluck('shop_name', 'id');

        return view('app.refuelings.create', compact('users', 'shops'));
    }

    /**
     * @param \App\Http\Requests\RefuelingStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RefuelingStoreRequest $request)
    {
        $this->authorize('create', Refueling::class);

        $validated = $request->validated();

        $refueling = Refueling::create($validated);

        return redirect()
            ->route('refuelings.edit', $refueling)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Refueling $refueling
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Refueling $refueling)
    {
        $this->authorize('view', $refueling);

        return view('app.refuelings.show', compact('refueling'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Refueling $refueling
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Refueling $refueling)
    {
        $this->authorize('update', $refueling);

        $users = User::pluck('name', 'id');
        $shops = Shop::pluck('shop_name', 'id');

        return view(
            'app.refuelings.edit',
            compact('refueling', 'users', 'shops')
        );
    }

    /**
     * @param \App\Http\Requests\RefuelingUpdateRequest $request
     * @param \App\Models\Refueling $refueling
     * @return \Illuminate\Http\Response
     */
    public function update(
        RefuelingUpdateRequest $request,
        Refueling $refueling
    ) {
        $this->authorize('update', $refueling);

        $validated = $request->validated();

        $refueling->update($validated);

        return redirect()
            ->route('refuelings.edit', $refueling)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Refueling $refueling
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Refueling $refueling)
    {
        $this->authorize('delete', $refueling);

        $refueling->delete();

        return redirect()
            ->route('refuelings.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
