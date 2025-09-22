@extends('layouts.app')
@section('content')

<div class="container-fluid mb-3">
    <h5 class="d-flex border-1 border-bottom pb-2">Projects</h5>
    <x-projects :data=$projects />
</div>

@endsection