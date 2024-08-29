@props(['name' => 'text'])
<div class="col-md-6">
    <input id="{{ $name }}" type="{{ $name }}" class="form-control @error($name) is-invalid @enderror"
        name="{{ $name }}" value="{{ old($name) }}" required autocomplete="{{ $name }}" autofocus>

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
