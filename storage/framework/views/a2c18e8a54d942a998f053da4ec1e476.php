<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="modal fade" id="commentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header py-1">
                <p class="modal-title"><i class="bi bi-chat-dots me-2"></i><span id="commentModalTitle">Comments</span></p>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body p-1">
                <!-- Chat History -->
                <div id="commentModal-chat-history" class="chat-history"></div>

                <!-- Message Input -->
                <div class="d-flex align-items-center">
                <form id="commentForm" enctype="multipart/form-data" method="POST" 
                action="/comments/add" class="d-flex w-100" onsubmit="return putComment();">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="cmnt_pid" name="cmnt_pid">
                    <input type="hidden" id="cmnt_tid" name="cmnt_tid">
                    <input type="hidden" id="cmnt_uid" name="cmnt_uid">

                    <label for="file" class="btn btn-outline-secondary me-1 mb-0">
                        <i class="bi bi-paperclip"></i>
                    </label>
                    <input type="file" id="file" name="file[]" class="d-none" multiple>

                    <input type="text" id="msg" name="msg" class="form-control me-1" placeholder="Type your message...">

                    <button type="submit" class="btn btn-primary" id="commentModal-send">
                        <i class="bi bi-send"></i>
                    </button>
                </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>

let bspth = "<?php echo e(asset("public/storage/comments")); ?>";

function showComment(title="Comment", icon="bi-chat-dots", style="bg-primary text-white", cmnt_pid=null, cmnt_tid=null, cmnt_uid =null) {

    $("#commentModalTitle").html(title);

    $("#commentModalTitle").closest('.modal-title').find("i")
        .removeClass(function (index, className) {
            return (className.match(/(^|\s)(bi)-\S+/g) || []).join(' ');
        })
        .addClass("bi-"+icon);
    $("#commentModalTitle").closest('.modal-header')
        .removeClass(function (index, className) {
            return (className.match(/(^|\s)(bg|text)-\S+/g) || []).join(' ');
        })
        .addClass(style);
    $("#commentModalTitle").closest('.modal-header').find('.btn-close')
        .removeClass(function (index, className) {
            return (className.match(/(^|\s)(btn-close)-\S+/g) || []).join(' ');
        })
        .addClass(style.replace(/\b(?:bg|text)-\S+\b/g, "").trim());
    $("#commentModalTitle").closest('.modal').find('.modal-body').find('button')
        .removeClass(function (index, className) {
            return (className.match(/(^|\s)(bg|text)-\S+/g) || []).join(' ');
        })
        .addClass(style);

    var modalEl = $('#commentModal');
    if (modalEl.length === 0) return;
    $('#cmnt_pid').val(cmnt_pid);
    $('#cmnt_tid').val(cmnt_tid);
    $('#cmnt_uid').val(cmnt_uid);
    webserv("POST","comments/getall",{cmnt_pid,cmnt_tid,cmnt_uid}, handleComments);
    var modal = bootstrap.Modal.getOrCreateInstance(modalEl[0]);
    modal.show();
}

function handleComments(data,append=false) {
    var chatHistory = $('#commentModal-chat-history');
    if(!append) chatHistory.empty();
    let his = data["data"];
    his.forEach(function(h) {
        chatHistory.append(fmtComment(h));
    });
    chatHistory.scrollTop(chatHistory[0].scrollHeight);    
}

function fmtComment(cmnt) {
    let content = '';
    if (cmnt.typ === 'att') {
        content = `
            <a href="${bspth}/${cmnt.message}" target="_blank" class="text-decoration-none">
                <i class="bi bi-paperclip me-1"></i>${cmnt.message.split('/').pop()}
            </a>
        `;
    } else content = `<span>${cmnt.message}</span>`;

    return `
        <div class="mb-2">
            <small class="text-muted">
                ${cmnt.from_user.uid} • ${cmnt.created_at}
            </small><br>
            ${content}
        </div>
    `;
}

function putComment() {
    let msg = $('#msg').val().trim();
    if (!msg) return false;
    webserv("POST","comments/add",new FormData($("#commentForm")[0]), function(data) {
        handleComments(data,true);
        $('#msg').val('');
    });
    return false;
}

</script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\wamp64\www\pms2\resources\views/components/comments.blade.php ENDPATH**/ ?>