@extends('layout')
@section('titlepage', 'Blog')
@section('content')
<section class="page_banner">

    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <h2 class="banner-title">Tin tức</h2>
                <p class="breadcrumbs"><a href="{{ route('home') }}">Trang chủ</a><span>/</span>Trang tin tức</p>
            </div>

        </div>
    </div>
</section>
<section class="blogPage">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="sidebar lsb">
                    <aside class="widget">
                        <h3 class="widget_title">Tin tức thịnh hàng</h3>
                        @foreach($popularPosts as $post)
                        <div class="pp_post_item">
                        <span>{{ $post->updated_at->format('d/m/Y') }}</span>
                            <img src="{{ asset('upload/' . $post->image) }}" alt="{{ $post->title }}" />
                            <h5><a href="{{ route('show_blog', $post->id) }}">{{ $post->title }}</a></h5>
                        </div>
                        @endforeach
                    </aside>

                    <div class="widget widget_category_blogs">
                        <h3 class="widget_title">Danh mục</h3>
                        <ul>
                            @foreach($category_blogs as $category)
                            <li><a href="#">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="row"> <!-- Thêm hàng để hiển thị nhiều bài viết -->
                    @foreach($posts as $post) 
                    <div class="col-lg-6 col-md-6"> 
                        <div class="blog_item_02">
                            <img src="{{ asset('upload/' . $post->image) }}" alt="{{ $post->title }}" />
                            <div class="bp_content">
                            <span>{{ $post->updated_at->format('d/m/Y') }}</span>
                                <h3><a href="{{ route('show_blog', $post->id) }}">{{ $post->title }}</a></h3>
                                <a class="lr_more" href="{{ route('show_blog', $post->id) }}">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
