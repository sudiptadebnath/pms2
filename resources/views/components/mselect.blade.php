@props([
    'size' => 12,
    'name' => 'sel',
    'title' => 'sel',
    'icon' => 'person',
    'multiple' => true,
    'url' => '',
    'change' => '',
    'onload' => '', 
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
        <select name="{{$name}}" id="{{$name}}" class="form-select" @if($multiple) multiple @endif>
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
        minimumInputLength: 0,   // 🔹 allow fetch on open
        ajax: {
            url: "{{$url}}",
            dataType: 'json',
            delay: 250,
            cache: false,         // 🔹 always fresh data
            data: function (params) {
                let data = { q: params.term };
                @if(!empty($onload))
                Object.assign(data, {{$onload}}());
                @endif
                return data;
            },
            processResults: function (data) {
                //console.log("processResults",data);
                return {
                    results: data.map(item => ({
                        id: item.id,
                        text: item.name,
                        hours: item.hours
                    }))
                };
            },
        },
        templateResult: function (item) {
            if (!item.id) return item.text;
            return $(`
                <div>
                    <div><strong>${item.text}</strong></div>
                    <div style="font-size:12px; color:gray">${item.hours} Hr</div>
                </div>
            `);
        },
        templateSelection: function (item) {
            return item.text || item.id;
        }
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
        {{ $change }}($(this).val());
        @endif
    });
});
</script>
@endpush
