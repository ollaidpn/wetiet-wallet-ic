@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('transferts.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.transferts.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.transferts.inputs.user_id')</h5>
                    <span>{{ optional($transfert->user)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.transferts.inputs.to_phone')</h5>
                    <span>{{ $transfert->to_phone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.transferts.inputs.contact_id')</h5>
                    <span>{{ $transfert->contact_id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.transferts.inputs.amount')</h5>
                    <span>{{ $transfert->amount ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.transferts.inputs.roken')</h5>
                    <span>{{ $transfert->roken ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('transferts.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Transfert::class)
                <a
                    href="{{ route('transferts.create') }}"
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
