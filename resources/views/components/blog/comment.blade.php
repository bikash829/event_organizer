<div class="comments card">

    <div class="comments__body card-body">
        <div class="comments__info card-title ">
            <div class="row">
                <div class="comments__user col-8"><strong>{{ fullName($comment->user) }}</strong>
                </div>
                @if ($authId == $blog->user_id || $authId == $comment->user_id)
                    <div class="comments__settings col-4 text-end">

                        <a class="pe-2 comment-edit btn  btn-sm btn-outline-primary "
                            href="{{ route('user.blog.comment.edit', [$blog, $comment]) }}">Edit</a>


                        <form method="POST" action="{{ route('user.blog.comment.destroy', [$blog, $comment]) }}"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-sm btn-outline-danger">
                        </form>
                        {{-- <a class="text-danger comment-delete"
                            href="{{ route('user.blog.comment.destroy', [$blog, $comment]) }}">Delete</a> --}}
                    </div>
                
                @endif
            </div>
        </div>
        <p class="comment-description">{{ $comment->comment }}</p>

    </div>
    <div class="card-footer bg-transparent border-0">
        <div class="row">
            <div class="col-6">
                <span
                    class="text-muted
                        text-decoration-none">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <div class="col-6   text-end">
                <form class="d-inline" method="POST" action="{{ route('user.like.store') }}">
                    @csrf
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                    <button type="submit" class="btn btn-sm btn-link text-dark text-decoration-none">
                        @if (count($comment->likes) > 0)
                            <span class="text-info">Unlike</span>
                        @else
                            <span class="text-info">Like</span>
                        @endif <span
                            class="badge text-bg-secondary">{{ $comment->likes_count }}</span>
                    </button>
                </form>



                @if ($isReply)
                    <a class="btn btn-sm btn-link text-dark text-decoration-none btnReply">
                        Reply
                    </a>
                @else
                    <button class="btn btn-sm btn-link text-dark text-decoration-none btnReplies">
                        Replies</button>
                @endif
                <span class="badge text-bg-secondary">{{ $comment->replies_count }}</span>
            </div>
        </div>
    </div>
</div>
