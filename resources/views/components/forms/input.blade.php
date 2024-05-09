@php
    $id = $id ?? ($name ?? rand());
@endphp


<div class="{{ $colSize }}">
    <!-- form-label -->
    @if ($label)
        <label for="input_{{ $id }}" class="form-label">

            {{ $label }} 
            @if ($isRequired)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif
    @if (in_array($type, ['text', 'password', 'email', 'number', 'date', 'datetime-local', 'hidden', 'search']))
        <input value="{{ old($name, $value) }}" type="{{ $type }}"
            class="form-control @error($errorKey ?? $name) is-invalid @enderror {{ $class }}"
            id="input_{{ $id }}" name="{{ $name }}" {{ $attributes }} maxlength="{{ $maxLength }}"
            minlength="{{ $minLength }}" placeholder="{{ $placeholder }}"
            @if ($isRequired) required @endif>
    @elseif ($type == 'textarea')
        <textarea class="form-control @error($errorKey ?? $name) is-invalid @enderror" id="input_{{ $id }}"
            name="{{ $name }}" {{ $attributes }} maxlength="{{ $maxLength }}" minlength="{{ $minLength }}"
            placeholder="{{ $placeholder }}" @if ($isRequired) required @endif>{{ old($name, $value) }}</textarea>
    @else
        <div class="text-danger">
            <span>Invalid Input Type</span>
        </div>
    @endif


    @error($errorKey ?? $name)
        <div class="error invalid-feedback">{{ $errors->first($name) }}</div>
    @enderror

</div>
