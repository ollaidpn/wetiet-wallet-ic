<?php

namespace App\Http\Controllers\Api;

use App\Models\Refueling;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RefuelingResource;
use App\Http\Resources\RefuelingCollection;
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
            ->paginate();

        return new RefuelingCollection($refuelings);
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

        return new RefuelingResource($refueling);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Refueling $refueling
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Refueling $refueling)
    {
        $this->authorize('view', $refueling);

        return new RefuelingResource($refueling);
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

        return new RefuelingResource($refueling);
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

        return response()->noContent();
    }
}
