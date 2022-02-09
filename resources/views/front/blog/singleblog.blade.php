@extends('layouts.front')
@section('content')

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Blog Details</h1>
            <ul class="breadcrumbs">
                <li class="breadcrumbs-item">
                    <a href="index.html">Home</a>
                    <i class="seoicon-right-arrow"></i>
                </li>
                <li class="breadcrumbs-item active">
                    <span href="#">Blog Details</span>
                    <i class="seoicon-right-arrow"></i>
                </li>
            </ul>
        </div>
    </div>

    <!-- End Stunning Header -->

    <!-- Overlay Search -->

    <div class="overlay_search">
        <div class="container">
            <div class="row">
                <div class="form_search-wrap">
                    <form>
                        <input class="overlay_search-input" placeholder="Type and hit Enter..." type="text" />
                        <a href="#" class="overlay_search-close">
                            <span></span>
                            <span></span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End Overlay Search -->

    <!-- Post Details -->

    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <article class="hentry post post-standard-details">
                        <div class="post-thumb">
                            <img src="{{ $article->image() }}" style="width: 750px; height: 469px;" alt="seo" />
                        </div>

                        <div class="post__content">
                            <h2 class="h2 post__title entry-title">
                                <a href="#">{{ $article->title }}</a>
                            </h2>

                            <div class="post-additional-info">
                                <div class="post__author author vcard">
                                    <img src="{{ asset('assets/front/html/img/avatar-b-details.png') }}" alt="author" />
                                    Posted by

                                    <div class="post__author-name fn">
                                        <a href="#" class="post__author-link">Admin</a>
                                    </div>
                                </div>

                                <span class="post__date">
                                    <i class="seoicon-clock"></i>

                                    <time class="published" datetime="2016-03-20 12:00:00">
                                        {{ date('d M Y', strtotime($article->created_at)) }}
                                    </time>
                                </span>

                                <span class="category">
                                    <i class="seoicon-tags"></i>
                                    <a
                                        href="/blog-category/{{ $article->Category->slug }}">{{ $article->Category->name }}</a>
                                </span>
                            </div>
                            <div class="post__content-info">
                                <p class="post__text">
                                    {!! $article->content !!}
                                </p>

                                <div class="widget w-tags">
                                    <div class="tags-wrap">
                                        @foreach ($article->ArticleTag as $data)
                                            <a href="/blog-tag/{{ $data->slug }}"
                                                class="w-tags-item">{{ $data->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="socials">
                            Share:
                            <a href="" class="social__item">
                                <i class="seoicon-social-facebook"></i>
                            </a>
                            <a href="" class="social__item">
                                <i class="seoicon-social-twitter"></i>
                            </a>
                            <a href="" class="social__item">
                                <i class="seoicon-social-linkedin"></i>
                            </a>
                            <a href="" class="social__item">
                                <i class="seoicon-social-google-plus"></i>
                            </a>
                            <a href="" class="social__item">
                                <i class="seoicon-social-pinterest"></i>
                            </a>
                        </div>
                    </article>

                    <div class="blog-details-author">
                        <div class="blog-details-author-thumb">
                            <img src="{{ asset('assets/front/html/img/blog-details-author.png') }}" alt="Author" />
                        </div>

                        <div class="blog-details-author-content">
                            <div class="author-info">
                                <h5 class="author-name">
                                    {{ $article->user->name }}
                                </h5>
                            </div>
                            <p class="text">
                                Lorem ipsum dolor sit amet, consectetuer
                                adipiscing elit, sed diam nonummy nibh
                                euismod.
                            </p>
                            <div class="socials">
                                <a href="" class="social__item">
                                    <img src="{{ asset('assets/front/html/svg/circle-facebook.svg') }}" alt="facebook" />
                                </a>

                                <a href="" class="social__item">
                                    <img src="{{ asset('assets/front/html/svg/twitter.svg') }}" alt="twitter" />
                                </a>

                                <a href="" class="social__item">
                                    <img src="{{ asset('assets/front/html/svg/google.svg') }}" alt="google" />
                                </a>

                                <a href="" class="social__item">
                                    <img src="{{ asset('assets/front/html/svg/youtube.svg') }}" alt="youtube" />
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="pagination-arrow">
                        <a href="#" class="btn-prev-wrap">
                            <svg class="btn-prev">
                                <use xlink:href="#arrow-left"></use>
                            </svg>
                            <div class="btn-content">
                                <div class="btn-content-title">
                                    Next Post
                                </div>
                                <p class="btn-content-subtitle">
                                    Claritas Est Etiam Processus
                                </p>
                            </div>
                        </a>

                        <a href="#" class="btn-next-wrap">
                            <div class="btn-content">
                                <div class="btn-content-title">
                                    Previous Post
                                </div>
                                <p class="btn-content-subtitle">
                                    Duis Autem Velius
                                </p>
                            </div>
                            <svg class="btn-next">
                                <use xlink:href="#arrow-right"></use>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- End Post Details -->

                <!-- Sidebar-->
                @include('front.blog.blog-sidebar')
                <!-- End Sidebar-->
            </main>
        </div>
    </div>

    <!-- Subscribe Form -->

    <div class="container-fluid bg-green-color">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="subscribe scrollme">
                        <div class="col-lg-6 col-lg-offset-5 col-md-6 col-md-offset-5 col-sm-12 col-xs-12">
                            <h4 class="subscribe-title">
                                Email Newsletters!
                            </h4>
                            <form class="subscribe-form" method="post" action="import.php">
                                <input class="email input-standard-grey input-white" name="email" required="required"
                                    placeholder="Your Email Address" type="email" />
                                <button class="subscr-btn">
                                    subscribe
                                    <span class="semicircle--right"></span>
                                </button>
                            </form>
                            <div class="sub-title">
                                Sign up for new Seosignt content,
                                updates, surveys & offers.
                            </div>
                        </div>

                        <div class="images-block">
                            <img src="{{ asset('assets/front/html/img/subscr-gear.png') }}" alt="gear"
                                class="gear" />
                            <img src="{{ asset('assets/front/html/img/subscr1.png') }}" alt="mail"
                                class="mail" />
                            <img src="{{ asset('assets/front/html/img/subscr-mailopen.png') }}" alt="mail"
                                class="mail-2" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
