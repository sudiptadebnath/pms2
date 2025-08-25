@props([
    'id' => '1',
    'icon' => 'chat-dots',
    'title' => 'Chat',
    'style' => 'primary',
    'style2' => 'white',
    'pid' => null,
    'tid' => null,
    'uid' => null,
])

<span id='cmntbtn-{{ $id }}' type="button" class="btn btn-link text-{{ $style }} px-1 me-1 position-relative"
onclick='showComment("{{ $title }}","{{ $icon }}","bg-{{ $style }} text-{{ $style2 }}",{!! json_encode($pid) !!},{!! json_encode($tid) !!},{!! json_encode($uid) !!})'
title="{{ $title }}">
    <i class="bi bi-{{ $icon }}"></i>
    <span id='cmntbtn-cnt-{{ $id }}' class="chat-cnt bg-{{ $style }} text-{{ $style2 }}" style="display:none;"></span>
</span>

@push('scripts')
<script>
$(document).ready(function($) {
    function getcnt_{{ $id }}() {
        var cmnt_pid = {!! json_encode($pid) !!};
        var cmnt_tid = {!! json_encode($tid) !!};
        var cmnt_uid = {!! json_encode($uid) !!};
        webserv("POST", "{{ url('user/comments/cnts') }}", { cmnt_pid,cmnt_tid,cmnt_uid }, function ok(d) {
            let count = parseInt(d["data"] || 0);
            let $badge = $('#cmntbtn-cnt-{{ $style }}');
            if (count > 0) {
                $badge.html(count).show();
            } else {
                $badge.html(count).hide();
            }
        }, function() { /*hide errors*/ });
    }
    setInterval(getcnt_{{ $id }}, 5000);
    getcnt_{{ $id }}();
});

</script>
@endpush