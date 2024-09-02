@props(['name' => ''])
@error($name)
    <div class="text text-danger">
        {{ $message }}
    </div>
@enderror
