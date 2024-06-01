<div class="blog-card card">
    <div class="card-header blog-header">
        <div class="row">
            <div class="col-10">
                <div class="row g-3 ">
                    <div class="col-auto">
                        <img src="{{ Storage::url('users-avatar/avatar.png') }}" class="img-thumbnail" alt="...">
                    </div>
                    <div class="col-auto ">
                        <div class="my-2">
                            <h4 class="card-title text-muted">
                                {{ fullName($blog->user) }}</h4>
                            <h5 class=" text-muted">
                                {{ ucfirst(getRole($blog->user->getRoleNames())) }}</h5>
                            <p class="card-text text-end"><small class="text-body-secondary">Last updated
                                    {{ $blog->updated_at->diffForHumans() }}
                                </small></p>

                        </div>
                    </div>
                </div>
            </div>
            @if ($authId == $blog->user_id)
                <div class="col-2 my-auto">
                    <div class="row g-2">

                        <form action="{{ route('user.blog.edit', $blog) }}" class="d-grid text-end">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-outline-primary">Edit</button>
                        </form>
                        <form class="d-grid  text-end" method="POST" action="{{ route('user.blog.destroy', $blog) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="card-body">
        {{-- <div class="row g-3">
            <div class="">
                <img src="{{ asset($blogImgUrl) }}" alt="{{ $blogImgAlt }}" class="rounded col-md-6" />
            </div>
            <h5 class="card-title">{{ $blog->title }}</h5>
            <p class="card-text">{{ $blog->content }}</p>
        </div> --}}


        <div class="container-fluid pb-5">
            <div class="pb-3 col-12">
                {{-- <img src="{{ asset($blogImgUrl) }}" alt="{{ $blogImgAlt }}" class="rounded col-12 pb-2" />
                @if ($authId == $blog->user_id && $blogImgUrl == '')
                    <form>
                        <x-forms.input type="file" placeholder="Upload Image" name="image" />
                        <button type="submit" class="btn btn-outline-primary">Change Image</button>
                    </form>
                @endif --}}

                @if ($blog->getFirstMediaUrl() !== '')
                    <img src="{{ $blog->getFirstMediaUrl() }}" class="img-fluid rounded " style="max-height: 25rem;"
                        alt="{{ $blog->getFirstMedia()->name }}" />
                @elseif($blog->image !== null)
                    {{-- {{var_dump($blog->image) }} --}}
                    <img src="{{ $blog->image }}" class="img-fluid rounded  col-10" alt="Fake Image" />
                @else
                    @if ($authId == $blog->user_id)
                        <form method="POST" action="{{ route('user.blog.update', $blog) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <x-forms.input type="hidden" placeholder="Title" value="{{ $blog->title }}"
                                name="title" />
                            <x-forms.input type="hidden" value="{{ $blog->content }}" name="content" />
                            <x-forms.input type="file" placeholder="Upload Image" name="image" />
                            <button type="submit" class="btn btn-outline-primary">Upload Image</button>
                        </form>
                    @endif
                @endif

            </div>
            <h1 class="display-6 fw-bold">{{ $blog->title }}</h1>
            <p class="col-md-8 fs-4">{{ $blog->content }}</p>
        </div>


    </div>

    <div class="card-footer bg-transparent border-0 position-relative bottom-0 end-0">
        <div class="text-end">
            {{-- <a href="{{ route('blog.like', $blog) }}"
                class="btn btn-sm btn-link text-dark text-decoration-none">Like <span
                    class="badge text-bg-secondary">{{ $blog->likes_count }}</span></a> --}}

            <form class="d-inline" method="POST" action="{{ route('user.like.store') }}">
                @csrf
                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                {{-- <button type="submit" class="btn btn-sm btn-link text-dark text-decoration-none">
                    Like <span class="badge text-bg-secondary">{{ $blog->likes_count }}</span>
                </button> --}}

                <button type="submit" class="btn btn-sm btn-link text-dark text-decoration-none">

                    <span class="text-info">{{ $blog->authLiked ? 'Unlike' : 'Like' }}</span>
                    <span class="badge text-bg-secondary">{{ $blog->likes_count }}</span>
                    <!-- check if the blog has likes from auth user -->
                </button>
            </form>
            <a href="#" class="btn btn-sm btn-link text-dark text-decoration-none">Comment <span
                    class="badge text-bg-secondary">{{ $blog->comments_count }}</span></a>
            <a href="#" class="btn btn-sm btn-link text-dark text-decoration-none">Share <span
                    class="badge text-bg-secondary">4</span></a>
        </div>
    </div>
</div>
