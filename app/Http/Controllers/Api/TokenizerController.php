<?php

namespace App\Http\Controllers\Api;

use App\Models\Tokenizer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TokenizerResource;
use App\Http\Resources\TokenizerCollection;
use App\Http\Requests\TokenizerStoreRequest;
use App\Http\Requests\TokenizerUpdateRequest;

class TokenizerController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Tokenizer::class);

        $search = $request->get('search', '');

        $tokenizers = Tokenizer::search($search)
            ->latest()
            ->paginate();

        return new TokenizerCollection($tokenizers);
    }

    /**
     * @param \App\Http\Requests\TokenizerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TokenizerStoreRequest $request)
    {
        $this->authorize('create', Tokenizer::class);

        $validated = $request->validated();

        $tokenizer = Tokenizer::create($validated);

        return new TokenizerResource($tokenizer);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tokenizer $tokenizer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Tokenizer $tokenizer)
    {
        $this->authorize('view', $tokenizer);

        return new TokenizerResource($tokenizer);
    }

    /**
     * @param \App\Http\Requests\TokenizerUpdateRequest $request
     * @param \App\Models\Tokenizer $tokenizer
     * @return \Illuminate\Http\Response
     */
    public function update(
        TokenizerUpdateRequest $request,
        Tokenizer $tokenizer
    ) {
        $this->authorize('update', $tokenizer);

        $validated = $request->validated();

        $tokenizer->update($validated);

        return new TokenizerResource($tokenizer);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tokenizer $tokenizer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tokenizer $tokenizer)
    {
        $this->authorize('delete', $tokenizer);

        $tokenizer->delete();

        return response()->noContent();
    }
}
