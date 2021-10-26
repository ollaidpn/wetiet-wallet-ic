@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('refuelings.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.refuelings.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.refuelings.inputs.user_id')</h5>
                    <span>{{ optional($refueling->user)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.refuelings.inputs.shop_id')</h5>
                    <span
                        >{{ optional($refueling->shop)->shop_name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.refuelings.inputs.amount')</h5>
                    <span>{{ $refueling->amount ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.refuelings.inputs.token')</h5>
                    <span>{{ $refueling->token ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('refuelings.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Refueling::class)
                <a
                    href="{{ route('refuelings.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
