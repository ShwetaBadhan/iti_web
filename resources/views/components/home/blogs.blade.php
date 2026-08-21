<!-- blog-post-area -->
<section class="blog__post-area-eight section-pt-140 section-pb-110">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="section__title text-center mb-50">
                    <span class="sub-title">News & Blogs</span>
                    <h2 class="title bold">Our Latest News Feed</h2>
                    <p>Stay updated with our latest news, tips, and industry insights.</p>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            @if(isset($blogs) && $blogs->isNotEmpty())
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog__post-item-six shine__animate-item">
                            <div class="blog__post-thumb-six">
                                <a href="{{ route('blog.details', $blog->slug) }}" class="shine__animate-link">
                                    <!-- ✅ Dynamic Blog Image -->
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                                </a>
                            </div>
                            <div class="blog__post-content-six">
                                <div class="blog__post-meta">
                                    <ul class="list-wrap">
                                        <!-- ✅ Dynamic Date -->
                                        <li><i class="flaticon-calendar"></i>{{ $blog->created_at->format('d F, Y') }}</li>
                                        <!-- ✅ Dynamic Author -->
                                        <li><i class="flaticon-user-1"></i>by <a href="{{ route('blog.details', $blog->slug) }}">{{ $blog->author ?? 'Admin' }}</a></li>
                                    </ul>
                                </div>
                                <!-- ✅ Dynamic Title (Limited to ~60 chars for clean UI) -->
                                <h2 class="title">
                                    <a href="{{ route('blog.details', $blog->slug) }}">
                                        {{ \Illuminate\Support\Str::limit($blog->title, 60) }}
                                    </a>
                                </h2>
                                <a href="{{ route('blog.details', $blog->slug) }}" class="btn arrow-btn">
                                    Read More <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center py-4">
                    <p class="text-muted">No blog posts available at the moment.</p>
                </div>
            @endif
        </div>
    </div>
</section>
<!-- blog-post-area-end -->