@props([
'size' => 12,
'name' => 'tmce',
'title' => 'Enter content',
'height' => 100,
'value' => '',
'required' => false,
])
@php
    $required = filter_var($required, FILTER_VALIDATE_BOOLEAN);
@endphp

<div class="col-md-{{ $size }}">
    <label for="{{ $name }}" class="form-label">{{ ucfirst($title) }}</label>
    <textarea name="{{ $name }}" id="{{ $name }}">{{ old($name, $value) }}</textarea>
    <label class="error" for="{{ $name }}"></label>
</div>

@push('scripts')
<script>
$('#{{ $name }}').summernote({
    height: {{ $height }},
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        //['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['link', /*'picture', 'video',*/ 'table']], 
        //['view', ['codeview', 'help']]
    ]
});
</script>
@endpush
