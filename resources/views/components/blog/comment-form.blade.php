<div class="comments card">
    <div class="comments__body card-body">
        <div class="comment__form">
            <form method="POST" enctype="multipart/form-data" action="{{ route('user.blog.comment.store', $blog) }}">
                @csrf
                @method('POST')
                <div class="row g-2">
                    <x-forms.input type="textarea" placeholder="Write your comment Hre" name="comment" />
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-sm btn-secondary">Post</button>
                    </div>
                </div>
            </form>
            <h1>{{ $commentId }}</h1>
        </div>
    </div>
</div>
