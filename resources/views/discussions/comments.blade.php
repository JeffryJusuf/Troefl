@foreach ($comments as $comment)
    <div class="list-group list-group-flush w-100">
        <div class="list-group-item list-group-item-action d-flex border-bottom border-dark-subtle gap-3 pt-3"
            aria-current="true">
            <div class="d-flex">
                <img src="https://github.com/mdo.png" alt="" width="35" height="35"
                    class="rounded-circle me-3">
                <div class="row pe-5">
                    <div class="d-flex d-flex-column">
                        <h6>{{ $comment->user->username }}</h6>
                        <small class="mx-2 fw-bold">·</small>
                        <small class="opacity-50">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                    <article class="fs-6 lh-sm">{!! $comment->body !!}</article>
                    @include('discussions.replies', ['replies' => $comment->replies, 'comment_id' => $comment->id])
                </div>
            </div>
        </div>
    </div>
@endforeach
