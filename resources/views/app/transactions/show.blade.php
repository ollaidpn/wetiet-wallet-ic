@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('transactions.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.transactions.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.transactions.inputs.user_id')</h5>
                    <span>{{ optional($transaction->user)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.transactions.inputs.shop_id')</h5>
                    <span
                        >{{ optional($transaction->shop)->shop_name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.transactions.inputs.amount')</h5>
                    <span>{{ $transaction->amount ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.transactions.inputs.type')</h5>
                    <span>{{ $transaction->type ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.transactions.inputs.token')</h5>
                    <span>{{ $transaction->token ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('transactions.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Transaction::class)
                <a
                    href="{{ route('transactions.create') }}"
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
