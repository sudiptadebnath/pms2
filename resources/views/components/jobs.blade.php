@props([
    'size' => 12,
    'title' => 'Jobs',
    'url' => "",
    'data' => [],
    'opts' => [],
])

@once
@push('styles')
<style>
.cls-p { border-color:gray !important;  }
.cls-s { border-color:green !important;  }
.cls-c { border-color:black !important;  }
.cls-f { border-color:red !important;  }
.cls-a, .cls-a * { text-decoration: line-through;  }
</style>
@endpush
@endonce

<div class="col-md-{{ $size }}">
    <h5 class="d-flex border-1 border-bottom pb-2">
        {{ $title }}
    </h5>
    @foreach($data as $job)
    <div class="card w-100">
    <div class="card-body cls-{{ $job['status'] }}">
        <h5 class="card-title">{{ $job["title"] }}</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $job->project->name }}</h6>
        <p class="card-text">{{ $job["description"] }}</p>
    @switch($job["status"])
        @case("p" /*PENDING*/ ) 
        <button class="btn btn-sm btn-primary" onclick="setTaskStat({{ $job['id'] }},'s')">Start</button>
        @break
        @case("s" /*STARTED*/ ) 
        <button class="btn btn-sm btn-primary" onclick="setTaskStat({{ $job['id'] }},'c')">Completed</button>
        <button class="btn btn-sm btn-primary" onclick="setTaskStat({{ $job['id'] }},'f')">Failed</button>
        <button class="btn btn-sm btn-primary" onclick="setTaskStat({{ $job['id'] }},'a')">Abandoned</button>
        @break
        @case("c" /*COMPLETED*/ ) 
        @case("f" /*FAILED*/ ) 
        @case("a" /*ABANDONED*/ ) 
        <span class="text-primary">{{ taskStatDict()[$job["status"]] ?? "-" }}</span>
        @break
    @endswitch
    </div>
    </div>
    @endforeach

</div>

@once
@push('scripts')
<script>
function setTaskStat(pid,stat) {
    webserv("POST",`jobs/${id}`, { stat }, function (d) {
        window.location.reload();
    });  
}
</script>
@endpush
@endonce