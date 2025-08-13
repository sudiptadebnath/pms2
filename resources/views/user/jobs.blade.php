@extends('layouts.app')
@section('content')
<div class="container vw-100 mb-3">
    <h3 class="d-flex border-1 border-bottom pb-2">
        Jobs 
        <x-mselect size="6" icon="" name="project_id" title="Choose Project" :value="$projects" multiple=false />
    </h3>
</div>
<div class="container">
<div class="row">
    <x-jobs size="4" title="Pending" :data="$jobs" />
    <x-jobs size="4" title="In Progress" :data="$jobs" />
    <x-jobs size="4" title="Completed" :data="$jobs" />
</div>
</div>
@endsection

