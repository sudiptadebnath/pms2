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
                <div class="mb-2">
                    <strong>Tasks:</strong>
                    @if(!empty($itm['tasks']))
                        <ul class="list-group list-group-flush small">
                            @foreach($itm['tasks'] as $tsk)
                                <li class="list-group-item d-flex justify-content-between align-items-center px-2 py-1">
                                    <span>{{ $tsk['title'] ?? 'Untitled Task' }}</span>
                                    <span>{{ $tsk['user']['uid'] ?? 'User' }}</span>
                                    <span class="badge bg-{{ ($tsk['status'] ?? '') === 'done' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($tsk['status'] ?? 'pending') }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <em>No tasks added</em>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
