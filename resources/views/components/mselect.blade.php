@props([
    'size' => 12,
    'name' => 'sel',
    'title' => 'sel',
    'icon' => 'person',
    'value' => [],
    'multiple' => true,
])
@php
    $multiple = filter_var($multiple, FILTER_VALIDATE_BOOLEAN);
@endphp
<div class="col-md-{{$size}}">
    <div class="input-group">
        <span class="input-group-text">
            @if(!empty($icon))
            <i class="bi bi-{{ $icon }}"></i>
            @else
            {{ ucfirst($title) }}
            @endif
        </span>
        <select name="{{$name}}" id="{{$name}}" class="form-select"@if($multiple) multiple @endif>
        @foreach ($value as $key => $label)
            <option value="{{ $key }}">
            {{ str_replace('*', '', $label) }}
            </option>
        @endforeach
        </select>
    </div>
    <label class="error" for="{{$name}}"></label>
</div>

@push('scripts')
<script>
$(document).ready(function () {
    let $modalParent = $("#{{$name}}").closest(".modal");
    let options = {
        placeholder: "Select {{ ucfirst($title) }}",
        allowClear: true,
    };
    if ($modalParent.length) {
        options.dropdownParent = $modalParent;
    }
    $("#{{$name}}").select2(options);
});
</script>
@endpush