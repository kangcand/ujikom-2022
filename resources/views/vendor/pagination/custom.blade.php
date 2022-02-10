<link rel="stylesheet" href="{{ asset('/assets/front/html/css/fonts.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/front/html/css/crumina-fonts.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/front/html/css/normalize.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/front/html/css/grid.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/front/html/css/base.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/front/html/css/blocks.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/front/html/css/layouts.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/front/html/css/modules.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/front/html/css/widgets-styles.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/front/html/css/jquery.mCustomScrollbar.min.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/front/html/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/front/html/css/primary-menu.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/front/html/css/magnific-popup.css') }}">
<div class="row">
    <div class="col-lg-12">
        <nav class="navigation">
            @if ($paginator->hasPages())
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <a class="page-numbers prev" disabled>
                        <svg class="btn-next" disabled>
                            <use xlink:href="#arrow-left" disabled></use>
                        </svg>
                    </a>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-numbers prev" disabled>
                        <svg class="btn-next" disabled>
                            <use xlink:href="#arrow-left" disabled></use>
                        </svg>
                    </a>
                @endif
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                    @endif
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <a class="page-numbers current bg-border-color">{{ $page }}</a>
                            @else
                                <a class="page-numbers bg-border-color"
                                    href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-numbers next">
                        <svg class="btn-next">
                            <use xlink:href="#arrow-right"></use>
                        </svg>
                    </a>
                @else
                    <svg class="btn-next">
                        <use xlink:href="#arrow-right"></use>
                    </svg>
                @endif
            @endif
        </nav>
    </div>
</div>
