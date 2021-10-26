@php $editing = isset($refueling) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $refueling->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="shop_id" label="Shop" required>
            @php $selected = old('shop_id', ($editing ? $refueling->shop_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Shop</option>
            @foreach($shops as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="amount"
            label="Amount"
            value="{{ old('amount', ($editing ? $refueling->amount : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="token" label="Token" maxlength="255" required
            >{{ old('token', ($editing ? $refueling->token : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
