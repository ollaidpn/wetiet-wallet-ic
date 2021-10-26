@php $editing = isset($transfert) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $transfert->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="to_phone"
            label="To Phone"
            value="{{ old('to_phone', ($editing ? $transfert->to_phone : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="contact_id"
            label="Contact Id"
            value="{{ old('contact_id', ($editing ? $transfert->contact_id : '')) }}"
            max="255"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="amount"
            label="Amount"
            value="{{ old('amount', ($editing ? $transfert->amount : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="roken" label="Roken" maxlength="255" required
            >{{ old('roken', ($editing ? $transfert->roken : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
