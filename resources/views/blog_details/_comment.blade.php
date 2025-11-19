@php
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Facades\Auth;
    $isReply = !empty($comment->parent_id);
@endphp
@php
    // Styles: replies appear on the right; parents on the left.
    $wrapperStyle = $isReply ? 'margin-left:auto; margin-right:0; width:70%; opacity:0.95;' : '';
    $singleStyle = $isReply ? 'font-size:0.95rem;' : '';
@endphp
<div class="comment-list {{ $isReply ? 'child-comment' : '' }}" data-comment-id="{{ $comment->id }}" style="{{ $wrapperStyle }}">
    <div class="single-comment justify-content-between d-flex" style="{{ $singleStyle }}">
        <div class="user justify-content-between d-flex">
            <div class="thumb">
                @php
                    // Default avatar (public asset)
                    $avatar = asset('fe/img/blog/author.png');

                    // Prefer foto from the related user account, then any override/$comment->foto
                    $userFoto = optional($comment->user)->foto ?? null;
                    $rawFoto = $userFoto ?? ($foto ?? $comment->foto ?? null);
                    $f = is_string($rawFoto) ? trim($rawFoto) : '';

                    if ($f !== '') {
                        // Normalize windows backslashes
                        $fNorm = str_replace('\\', '/', $f);

                        // Full external URL
                        if (preg_match('#^https?://#i', $fNorm)) {
                            $avatar = $fNorm;
                        }
                        // patterns that point to storage paths -> convert to /storage/...
                        elseif (strpos($fNorm, 'storage/app/public/') !== false) {
                            $p = substr($fNorm, strpos($fNorm, 'storage/app/public/') + strlen('storage/app/public/'));
                            $avatar = url('/storage/' . ltrim($p, '/'));
                        } elseif (strpos($fNorm, 'public/storage/') !== false) {
                            $p = substr($fNorm, strpos($fNorm, 'public/storage/') + strlen('public/storage/'));
                            $avatar = url('/storage/' . ltrim($p, '/'));
                        } elseif (strpos($fNorm, 'storage/') === 0 || strpos($fNorm, '/storage/') === 0) {
                            $avatar = url('/' . ltrim($fNorm, '/'));
                        }
                        else {
                            // Try Storage disk first, then public path fallbacks
                            try {
                                if (Storage::exists($fNorm)) {
                                    $avatar = Storage::url($fNorm);
                                } elseif (Storage::exists('public/' . $fNorm)) {
                                    $avatar = Storage::url('public/' . $fNorm);
                                } elseif (file_exists(public_path(ltrim($fNorm, '/')))) {
                                    $avatar = asset(ltrim($fNorm, '/'));
                                } elseif (file_exists(public_path('storage/' . ltrim($fNorm, '/')))) {
                                    $avatar = asset('storage/' . ltrim($fNorm, '/'));
                                    } else {
                                    // Unknown/invalid path -> keep default avatar (use blog author image which exists)
                                    $avatar = asset('fe/img/blog/author.png');
                                }
                            } catch (\Throwable $e) {
                                $avatar = asset('fe/img/blog/author.png');
                            }
                        }
                    }
                @endphp
                <img class="comment-avatar" src="{{ $avatar }}" alt="User avatar" style="width:48px;height:48px;object-fit:cover;border-radius:50%;display:block;" onerror="this.onerror=null;this.src='{{ asset('fe/img/blog/author.png') }}';">
            </div>
            <div class="desc">
                <p class="comment">{{ $comment->comment }}</p>
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <div style="margin-right:12px;">
                            <h5 style="margin:0;"><a href="#">{{ $comment->name }}</a></h5>
                            <div style="color:#777; font-size:0.85rem;">{{ $comment->email ?? '' }}</div>
                        </div>
                        <p class="date" style="margin-left:8px;">{{ $comment->created_at->format('F j, Y \\a\\t g:ia') }}</p>
                    </div>
                        <div class="reply-btn" style="display:flex; gap:12px; align-items:center;">
                            <a href="#" class="btn-reply text-uppercase">REPLY</a>
                                @if($comment->replies && $comment->replies->count())
                                    <a href="#" class="btn-toggle-children text-secondary text-uppercase" data-id="{{ $comment->id }}" data-count="{{ $comment->replies->count() }}">MINIMIZE ({{ $comment->replies->count() }})</a>
                                @endif
                            @if(Auth::check() && $comment->user_id === Auth::id())
                                <a href="#" class="btn-delete text-danger text-uppercase" data-id="{{ $comment->id }}">DELETE</a>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Hidden reply form per comment (toggled by JS) --}}
    <div class="reply-form-wrapper" style="display:none; margin-top:10px;">
        <form class="form-contact comment_form reply-form" action="{{ route('blog.comments.store', $comment->blog->slug ?? request()->route('slug')) }}" method="POST">
            @csrf
            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
            <div class="form-group">
                <textarea class="form-control" name="comment" rows="3" placeholder="Write Reply" required></textarea>
            </div>
            <div class="form-group">
                <input class="form-control" name="name" type="text" placeholder="Name" required value="{{ Auth::check() ? Auth::user()->name : old('name') }}">
            </div>
                {{-- reply form does not need to show avatar here; removed stray img to avoid duplicates --}}
        </form>
    </div>

    <div class="children"></div>
    {{-- Render existing replies (if any) as children on the right --}}
    @if($comment->replies && $comment->replies->count())
        <div class="children expanded">
            @foreach($comment->replies as $reply)
                @include('blog_details._comment', ['comment' => $reply])
            @endforeach
        </div>
    @endif
</div>
