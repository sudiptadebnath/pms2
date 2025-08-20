@extends('layouts.app')

@php
$jobsP = $jobs->where('status', 'p');
$jobsS = $jobs->where('status', 's');
$jobsC = $jobs->whereNotIn('status', ['p', 's']);
@endphp

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
<div class="container mb-3">
    <div class="d-flex flex-wrap gap-2 justify-content-between border-1 border-bottom pb-2">
        <h3 class="col-md-1">Jobs</h3> 
        <x-mselect size="5" icon="" name="project_id" title="Project" 
        :url="route('projects.withhrUsr')" multiple=false change="filterCards" />
        @if(hasRole("sam")) 
        <x-mselect size="5" icon="" name="user_id" title="User" 
        :url="route('users.withhr')" multiple=false change="filterCards" />
        @endif
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
function filterCards() {
    let proj = $('[name="project_id"]').val();
    let user = $('[name="user_id"]').val();

    $(".card").hide().filter(function () {
        let matchProj = !proj || $(this).hasClass("proj-" + proj);
        let matchUser = !user || $(this).hasClass("uid-" + user);
        return matchProj && matchUser;
    }).show();
}
</script>
@endsection
