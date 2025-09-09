@extends('layout')
@section('titlepage', $post->title)
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
<section class="singleBlog">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="postThumb">
                    <img src="{{ asset('upload/' . $post->image) }}" alt="{{ $post->title }}"/>
                </div>
                <div class="sic_details clearfix">
                    <h3>{{ $post->title }}</h3>
                    <div class="sic_the_content clearfix">
                        <p>
                            {{ $post->content }}
                        </p>
                        
                    </div>
                    <div class="spMeta clearfix">
                        <div class="row">
                           
                            <div class="col-md-6">
                                <div class="socialShare">
                                    <a target="_blank" href="https://www.facebook.com/"><i class="icofont-facebook"></i></a>
                                    <a target="_blank" href="https://twitter.com/"><i class="icofont-twitter"></i></a>
                                    <a target="_blank" href="https://bebo.com/"><i class="icofont-bebo"></i></a>
                                    <a target="_blank" href="https://dribbble.com/"><i class="icofont-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
               
                
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <aside class="widget">
                        <h3 class="widget_title">Tin tức thịnh hành</h3>
                        @foreach($popularPosts as $post)

                        <div class="pp_post_item">
                        <img src="{{ asset('upload/' . $post->image) }}" alt="{{ $post->title }}" />
                        <h5><a href="{{ route('show_blog', $post->id) }}">{{ $post->title }}</a></h5>
                        <span>February 18, 2017</span>
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
        </div>
    </div>
</section>

@endsection
