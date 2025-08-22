@props([
    'name' => 'projAcrd',
    'data' => [],
])

<div class="accordion" id="projAcrd">
@foreach($data as $itm) 
    @php
        $headingId = "heading{$itm['id']}";
        $collapseId = "collapse{$itm['id']}";
    @endphp
    <div class="accordion-item">
        <h2 class="accordion-header" id="{{ $headingId }}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                data-bs-target="#{{ $collapseId }}" aria-expanded="true" aria-controls="{{ $collapseId }}">
                {{ $itm['name'] }}
            </button>
        </h2>
        <div id="{{ $collapseId }}" class="accordion-collapse collapse" aria-labelledby="{{ $headingId }}" data-bs-parent="#projAcrd">
            <div class="accordion-body">
                {!! $itm['description'] !!}
                <hr>
                <div class="mb-2">
                    <strong>Duration:</strong>
                    {{ $itm['start_date'] ? \Carbon\Carbon::parse($itm['start_date'])->format('d M Y') : 'N/A' }}
                    –
                    {{ $itm['end_date'] ? \Carbon\Carbon::parse($itm['end_date'])->format('d M Y') : 'N/A' }}
                </div>
                <div class="mb-2">
                    <strong>Members:</strong>
                    @if(!empty($itm['users']))
                        @foreach($itm['users'] as $uid)
                            <span class="badge bg-primary me-1">{{ $uid["uid"] ?? "-" }}</span>
                        @endforeach
                    @else
                        <em>No members assigned</em>
                    @endif
                </div>
            @if(!empty($itm['tasks']))
                @php
                    $opts = [
                        "rawdata"=>$itm['tasks']->map(function($t) {
                            return [
                                "title"=> $t->title,
                                "status"=> $t->status,
                                "user"=> $t->user->uid,
                            ];
                        }),
                    ];
                    $tbldata = [
                        [ 'data'=>'title' ], 
                        [ 'data'=>'user' ], 
                        [ 'data'=>'*status','className'=>'text-center' ], 
                    ];
                @endphp
                <x-table name="jobs_{{ $itm['id'] }}" title="Tasks" :data=$tbldata :opts=$opts />
            @endif                    
            </div>
        </div>
    </div>
@endforeach
</div>
