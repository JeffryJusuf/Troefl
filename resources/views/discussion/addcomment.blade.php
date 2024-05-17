<div class="py-3">
    <form method="post" action="{{ route('comments.storeComment') }}">
        @csrf
        <div class="form-group">
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" placeholder="Leave a Comment" required value="{{ old('body') }}"></textarea>
            @error('body')
                <div class="invalid-tooltip">
                    {{ $message }}
                </div>
            @enderror
            <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
        </div>
        <div class="form-group mt-3">
            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-dark mb-2">Add Comment</button>
            </div>
        </div>
    </form>
</div>