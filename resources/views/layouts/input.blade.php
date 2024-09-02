@props(['type' => 'text', 'label' => '', 'step' => '' , 'name'=>''])
<div class="form-group">
    <label for="{{ $label }}" class="form-label">{{ $label }}</label>
    <input id="{{ $name }}" type="{{ $type }}" class="form-control @error($name) is-invalid @enderror"
        name="{{ $name }}" for="{{ $label }}" step="{{ $step }}" value="{{ old($name) }}"
        autocomplete="{{ $name }}">

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
