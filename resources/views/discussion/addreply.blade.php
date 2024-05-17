<div class="py-3">
    <form method="post" action="{{ route('replies.storeReply') }}">
        @csrf
        <div class="form-group">
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" placeholder="Leave a Reply" required value="{{ old('body') }}"></textarea>
            @error('body')
                <div class="invalid-tooltip">
                    {{ $message }}
                </div>
            @enderror
            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
        </div>
        <div class="form-group mt-3">
            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-dark mb-2">Add Reply</button>
            </div>
        </div>
    </form>
</div>