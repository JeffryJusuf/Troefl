<div class="py-3">
    <form method="post" action="{{ route('comments.storeComment') }}">
        @csrf
        <div class="form-group">
            <textarea class="form-control @error('body') is-invalid @enderror custom-textarea" name="body" placeholder="Leave a Comment" required oninput="resizeTextarea(this)"></textarea>
            @error('body')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
        </div>
        <div class="form-group mt-3">
            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-dark">Add Comment</button>
            </div>
        </div>
    </form>
</div>

<script>
    function resizeTextarea(textarea) {
        textarea.style.height = 'auto'; // Reset the height
        textarea.style.height = textarea.scrollHeight + 'px'; // Set the height to the scroll height
    }
    
    // Initialize the textarea height on page load
    document.addEventListener('DOMContentLoaded', function() {
        const textarea = document.getElementById('question');
        resizeTextarea(textarea);
    });
</script>