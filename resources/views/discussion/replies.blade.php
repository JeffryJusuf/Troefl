@foreach ($replies as $reply)
    <div class="list-group list-group-flush w-100">
        <div class="list-group-item list-group-item-action d-flex border-top border-dark-subtle pt-3 gap-3"
            aria-current="true">
            <div class="d-flex">
                @if ($reply->user->profile_picture)
                <div class="p-0">
                    <img src="{{ $reply->user->profile_picture_url }}" alt="" width="35" height="35" class="rounded-circle me-3">
                </div>
                @else
                    <img src="https://github.com/mdo.png" alt="" width="35" height="35" class="rounded-circle me-3">
                @endif
                <div class="row pe-5">
                    <div class="d-flex d-flex-column">
                        <h6>{{ $reply->user->username }}
                            @if($reply->user->is_admin)
                                <small class="text-secondary"> &#40;Administator&#41;</small>
                            @endif
                        </h6>
                        <small class="mx-2 fw-bold">·</small>
                        <small class="opacity-50">{{ $reply->created_at->diffForHumans() }}</small>
                    </div>
                    <article class="fs-6 lh-sm mb-3">{!! $reply->body !!}</article>
                </div>
            </div>
        </div>
    </div>
@endforeach
@auth
    @include('discussion.add-reply')
@endauth
