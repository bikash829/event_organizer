<div class="comments card">
    <div class="comments__body card-body">
        <div class="comment__form">

            <form method="POST" enctype="multipart/form-data" action="{{ route('user.blog.comment.store', $blog) }}"
                class="form-comment" id="form_{{ $formId }}">

                @csrf
                @method('POST')
                <div class="row g-2">
                    @if ($commentId != null)
                        <input type="hidden" name="parent_id" value="{{ $commentId }}">
                    @endif
                    <x-forms.input type="textarea" placeholder="Write your comment Here" name="comment" />
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-sm btn-secondary">Post</button>
                    </div>
                </div>
            </form>
            {{-- <h1>{{ $commentId }}</h1> --}}
        </div>
    </div>
</div>
