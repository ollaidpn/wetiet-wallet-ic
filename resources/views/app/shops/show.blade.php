@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('shops.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.shops.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.shops.inputs.user_id')</h5>
                    <span>{{ optional($shop->user)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shops.inputs.shop_name')</h5>
                    <span>{{ $shop->shop_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shops.inputs.description')</h5>
                    <span>{{ $shop->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shops.inputs.logo')</h5>
                    <span>{{ $shop->logo ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shops.inputs.telephone')</h5>
                    <span>{{ $shop->telephone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shops.inputs.email')</h5>
                    <span>{{ $shop->email ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('shops.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Shop::class)
                <a href="{{ route('shops.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
