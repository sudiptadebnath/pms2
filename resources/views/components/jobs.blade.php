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
.card.cls-p { background-color:#fbfbfb !important;  }
.card.cls-s { background-color: rgb(244,255,244) !important;  }
.card.cls-c .text-status { color:green !important;  }
.card.cls-f .text-status { color:red !important;  }
.card.cls-a .text-status,.card.cls-a * { text-decoration: line-through;  }
</style>
@endpush
@endonce

<div class="col-md-{{ $size }}">
    <h5 class="d-flex border-1 border-bottom pb-2">
        {{ $title }}
    </h5>
    @foreach($data as $job)
    <div class="card w-100 mb-2 proj-{{ $job->project->id }} uid-{{ $job->user_id }}">
    <div class="card-body p-2 cls-{{ $job['status'] }}">
        <span class="badge bg-info text-white position-absolute top-0 end-0 m-0 p-1">
            {{ number_format($job->used_hour1 ?? 0, 1) }} / 
            {{ number_format($job->target_hour ?? 0, 1) }} H
        </span>
        <span class="badge bg-secondary text-white position-absolute start-50"
            style="top: 0; transform: translate(-50%, -30%);">
            {{ $job->user->uid ?? "-" }}
        </span>
        <div class="d-flex align-items-center flex-wrap">
            <strong class="me-2">{{ $job["title"] }}</strong> :&nbsp;
            <small class="text-muted">{{ $job->project->name }}</small>
        </div>
        <div class="mb-2 text-wrap bigtxt">
            {{ $job["description"] }}
        </div>
        <div class="d-flex justify-content-between flex-wrap">
        <button type="button" class="btn btn-link text-primary px-1" title="Comments"
        onclick="showComment('Comments',{{$job->project->id}},{{ $job->id }},{{ $job->user->id }})">
            <i class="bi bi-chat-dots"></i>
        </button>
        <div>
    @switch($job["status"])

        @case("p" /*PENDING*/ ) 
        <button class="btn btn-sm btn-primary" onclick="setTaskStat({{ $job['id'] }},'s')">Start</button>
        @break

        @case("s" /*STARTED*/ ) 
        <button class="btn btn-sm btn-primary" onclick="setTaskStat({{ $job['id'] }},'p')">Stop</button>
        <button class="btn btn-sm btn-primary" onclick="setTaskStat({{ $job['id'] }},'c')">Completed</button>
        <button class="btn btn-sm btn-primary" onclick="setTaskStat({{ $job['id'] }},'f')">Failed</button>
        <button class="btn btn-sm btn-primary" onclick="setTaskStat({{ $job['id'] }},'a')">Abandoned</button>
        @break

        @case("c" /*COMPLETED*/ ) 
        @case("f" /*FAILED*/ ) 
        @case("a" /*ABANDONED*/ ) 
        <div class="text-status">{{ taskStatDict()[$job["status"]] ?? "-" }}</div>
        @break

    @endswitch
        </div>
        </div>
    </div>
    </div>
    @endforeach

</div>

@once
@push('scripts')
<script>
function setTaskStat(tid,stat) {
    webserv("POST",`jobs/${tid}`, { stat }, function (d) {
        window.location.reload();
    });  
}
</script>
@endpush
@endonce