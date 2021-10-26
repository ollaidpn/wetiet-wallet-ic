<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tokenizer;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view('app.tokenizers.index', compact('tokenizers', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Tokenizer::class);

        $users = User::pluck('name', 'id');

        return view('app.tokenizers.create', compact('users'));
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

        return redirect()
            ->route('tokenizers.edit', $tokenizer)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tokenizer $tokenizer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Tokenizer $tokenizer)
    {
        $this->authorize('view', $tokenizer);

        return view('app.tokenizers.show', compact('tokenizer'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tokenizer $tokenizer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Tokenizer $tokenizer)
    {
        $this->authorize('update', $tokenizer);

        $users = User::pluck('name', 'id');

        return view('app.tokenizers.edit', compact('tokenizer', 'users'));
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

        return redirect()
            ->route('tokenizers.edit', $tokenizer)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('tokenizers.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
