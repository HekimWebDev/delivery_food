<div class="form-group">
    <label for="{{ $property }}" class="form-label">{{ $name }}</label>
    <input class="form-control @error("$error" ?? "$property") is-invalid @enderror"
           name="{{ $property }}"
           type="{{ $type }}"
           id="{{ $property }}"
           value="{{ old($error ?? $property, $value ?? '') }}">
</div>
