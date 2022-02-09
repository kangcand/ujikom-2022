@extends('layouts.front')
@section('content')
    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Blog</h1>
            <ul class="breadcrumbs">
                <li class="breadcrumbs-item">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="seoicon-right-arrow"></i>
                </li>
                <li class="breadcrumbs-item active">
                    <span href="#">Blog</span>
                    <i class="seoicon-right-arrow"></i>
                </li>
            </ul>
        </div>
    </div>

    <!-- End Stunning header -->

    <!-- Overlay Search-->

    <div class="overlay_search">
        <div class="container">
            <div class="row">
                <div class="form_search-wrap">
                    <form>
                        <input class="overlay_search-input" placeholder="Type and hit Enter..." type="text">
                        <a href="#" class="overlay_search-close">
                            <span></span>
                            <span></span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End Overlay Search-->

    <!-- Blog posts-->

    <div class="container">
        <div class="row medium-padding120">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <main class="main">
                    @foreach ($article as $data)
                        <article class="hentry post post-standard has-post-thumbnail sticky">

                            <div class="post-thumb">
                                <img src="{{ $data->image() }}" style="width: 690px; height: 418px;" alt="seo">
                                <div class="overlay"></div>
                                <a href="{{ $data->image() }}" class="link-image js-zoom-image">
                                    <i class="seoicon-zoom"></i>
                                </a>
                                <a href="#" class="link-post">
                                    <i class="seoicon-link-bold"></i>
                                </a>
                            </div>

                            <div class="post__content">

                                <div class="post__author author vcard">
                                    <img src="{{ asset('assets/front/html/img/avatar6.png') }}" alt="author">
                                    Posted by

                                    <div class="post__author-name fn">
                                        <a href="#" class="post__author-link">{{ $data->User->name }}</a>
                                    </div>

                                </div>

                                <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        <a href="/blog/{{ $data->slug }}">{{ $data->title }}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{ $data->created_at }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">{{ $data->Category->name }}</a>
                                        </span>
                                    </div>

                                    <p class="post__text">
                                    </p>

                                    <a href="/blog/{{ $data->slug }}" class="btn btn-small btn--dark btn-hover-shadow">
                                        <span class="text">Continue Reading</span>
                                        <i class="seoicon-right-arrow"></i>
                                    </a>
                                </div>
                            </div>

                        </article>
                    @endforeach

                </main>

                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navigation">

                            <a href="#" class="page-numbers current bg-border-color"><span>1</span></a>
                            <a href="#" class="page-numbers bg-border-color"><span>2</span></a>
                            <a href="#" class="page-numbers bg-border-color"><span>3</span></a>
                            <a href="#" class="page-numbers bg-border-color"><span>4</span></a>
                            <a href="#" class="page-numbers next">
                                <svg class="btn-next">
                                    <use xlink:href="#arrow-right"></use>
                                </svg>
                            </a>

                        </nav>
                    </div>
                </div>
            </div>


            <!-- Sidebar-->
            @include('front.blog.blog-sidebar')
            <!-- End Sidebar-->


        </div>
    </div>

    <!-- End Blog posts-->

    <!-- Subscribe Form -->

    <div class="container-fluid bg-green-color">
        <div class="row">
            <div class="container">

                <div class="row">

                    <div class="subscribe scrollme">

                        <div class="col-lg-6 col-lg-offset-5 col-md-6 col-md-offset-5 col-sm-12 col-xs-12">
                            <h4 class="subscribe-title">Email Newsletters!</h4>
                            <form class="subscribe-form" method="post" action="import.php">
                                <input class="email input-standard-grey input-white" name="email" required="required"
                                    placeholder="Your Email Address" type="email">
                                <button class="subscr-btn">subscribe
                                    <span class="semicircle--right"></span>
                                </button>
                            </form>
                            <div class="sub-title">Sign up for new Seosignt content, updates, surveys & offers.</div>

                        </div>

                        <div class="images-block">
                            <img src="{{ asset('assets/front/html/img/subscr-gear.png') }}" alt="gear"
                                class="gear">
                            <img src="{{ asset('assets/front/html/img/subscr1.png') }}" alt="mail"
                                class="mail">
                            <img src="{{ asset('assets/front/html/img/subscr-mailopen.png') }}" alt="mail"
                                class="mail-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
