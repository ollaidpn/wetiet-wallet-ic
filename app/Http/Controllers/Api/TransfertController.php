<?php

namespace App\Http\Controllers\Api;

use App\Models\Transfert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransfertResource;
use App\Http\Resources\TransfertCollection;
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
            ->paginate();

        return new TransfertCollection($transferts);
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

        return new TransfertResource($transfert);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Transfert $transfert
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Transfert $transfert)
    {
        $this->authorize('view', $transfert);

        return new TransfertResource($transfert);
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

        return new TransfertResource($transfert);
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

        return response()->noContent();
    }
}
