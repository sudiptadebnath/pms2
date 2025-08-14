@extends('layouts.app')

@section('styles')
<style>
.row > [class*='col-'] {
    border-right: 1px dashed #e8e8e8; /* color and thickness */
}

/* Remove border on last column in the row */
.row > [class*='col-']:last-child {
    border-right: none;
}
</style>
@endsection

@section('content')
<div class="container vw-100 mb-3">
    <div class="d-flex justify-content-between border-1 border-bottom pb-2">
        <h3>Jobs</h3> 
        <x-mselect size="6" icon="" name="project_id" title="Project" :value="$projects" multiple=false change="onProjChange" />
    </div>
</div>
<div class="container">
<div class="row">
    <x-jobs size="4" title="Pending" :data="$jobsP" />
    <x-jobs size="4" title="In Progress" :data="$jobsS" />
    <x-jobs size="4" title="Completed" :data="$jobsC" />
</div>
</div>
@endsection

@section("scripts")
<script>
function onProjChange(vl) {
    alert("under dev "+vl);
}
</script>
@endsection
