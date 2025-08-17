@props([
    'size' => 12,
    'name' => 'sel',
    'title' => 'sel',
    'icon' => 'person',
    'value' => [],
    'multiple' => true,
    'change' => '',
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
        <option value="">Select {{ ucfirst($title) }}</option>
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
    let $el = $("#{{$name}}");
    let $modalParent = $el.closest(".modal");
    let options = {
        placeholder: "Select {{ ucfirst($title) }}",
        allowClear: true,
    };
    if ($modalParent.length) {
        options.dropdownParent = $modalParent;
    }
    $el.select2(options);
    $el.on('change', function () {
        if ($(this).val() && $(this).find('option[value=""]').length) {
            $(this).find('option[value=""]').remove();
        }
        @if(!empty($change))
        {{$change}}($(this).val());
        @endif
    });
});
</script>
@endpush