@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('favorites.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.favorites.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.favorites.inputs.user_id')</h5>
                    <span>{{ optional($favorite->user)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.favorites.inputs.name')</h5>
                    <span>{{ $favorite->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.favorites.inputs.telephone')</h5>
                    <span>{{ $favorite->telephone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.favorites.inputs.has_account')</h5>
                    <span>{{ $favorite->has_account ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('favorites.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Favorite::class)
                <a href="{{ route('favorites.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
