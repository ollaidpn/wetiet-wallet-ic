<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transfert;
use Illuminate\Http\Request;
use App\Http\Requests\TransfertStoreRequest;
use App\Http\Requests\TransfertUpdateRequest;

class TransfertController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Transfert::class);

        $search = $request->get('search', '');

        $transferts = Transfert::search($search)
            ->latest()
            ->paginate(5);

        return view('app.transferts.index', compact('transferts', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Transfert::class);

        $users = User::pluck('name', 'id');

        return view('app.transferts.create', compact('users'));
    }

    /**
     * @param \App\Http\Requests\TransfertStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransfertStoreRequest $request)
    {
        $this->authorize('create', Transfert::class);

        $validated = $request->validated();

        $transfert = Transfert::create($validated);

        return redirect()
            ->route('transferts.edit', $transfert)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Transfert $transfert
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Transfert $transfert)
    {
        $this->authorize('view', $transfert);

        return view('app.transferts.show', compact('transfert'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Transfert $transfert
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Transfert $transfert)
    {
        $this->authorize('update', $transfert);

        $users = User::pluck('name', 'id');

        return view('app.transferts.edit', compact('transfert', 'users'));
    }

    /**
     * @param \App\Http\Requests\TransfertUpdateRequest $request
     * @param \App\Models\Transfert $transfert
     * @return \Illuminate\Http\Response
     */
    public function update(
        TransfertUpdateRequest $request,
        Transfert $transfert
    ) {
        $this->authorize('update', $transfert);

        $validated = $request->validated();

        $transfert->update($validated);

        return redirect()
            ->route('transferts.edit', $transfert)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Transfert $transfert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Transfert $transfert)
    {
        $this->authorize('delete', $transfert);

        $transfert->delete();

        return redirect()
            ->route('transferts.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
