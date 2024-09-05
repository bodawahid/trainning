@props([
    'type' => 'text',
    'label' => '',
    'step' => '',
    'name' => '',
    'value' => [
        'name_ar' => '',
        'name_en' => '',
        'description_en' => '',
        'description_ar' => '',
        'price' => '',
        'features_ar' => '',
        'features_en' => '',
        'image' => '',
        'identify' => '',
        'password' => '',
        'name' => '',
        'email' => '',
        'mobile_phone' => '',
    ],
    'accept' => '',
])
<div class="form-group">
    <label for="{{ $label }}" class="form-label">{{ $label }}</label>
    <input id="{{ $name }}" type="{{ $type }}" class="form-control @error($name) is-invalid @enderror"
        name="{{ $name }}" for="{{ $label }}" step="{{ $step }}"
        value="{{ old($name, $value["$name"]) }}" autocomplete="{{ $name }}"
        placeholder="{{ __('offers.Enter') . " $label" }}" accept="{{ $accept }}">
    {{-- not using ajax --}}
    {{-- @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror --}}
    {{-- using ajax --}}
    <div class="text text-danger error" id="{{ $name . '-error' }}" role="alert">
    </span>
</div>
