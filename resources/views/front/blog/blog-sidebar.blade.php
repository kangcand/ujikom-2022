 <div class="col-lg-3 col-lg-offset-1 col-md-4 col-sm-12 col-xs-12">
     <aside aria-label="sidebar" class="sidebar sidebar-right">
         <div class="widget">
             <form class="w-search">
                 <input class="email search input-standard-grey" required="required" placeholder="Search" type="search">
                 <button class="icon">
                     <i class="seoicon-loupe"></i>
                 </button>
             </form>
         </div>

         <div class="widget w-post-category">
             <div class="heading">
                 <h4 class="heading-title">Post Category</h4>
                 <div class="heading-line">
                     <span class="short-line"></span>
                     <span class="long-line"></span>
                 </div>
             </div>
             <div class="post-category-wrap">
                 @foreach ($category as $data)
                     @if ($data->article->count() > 0)
                         <div class="category-post-item">
                             <span class="post-count">{{ $data->article->count() }}</span>
                             <a href="/blog-category/{{ $data->slug }}" class="category-title">{{ $data->name }}
                                 <i class="seoicon-right-arrow"></i>
                             </a>
                         </div>
                     @endif
                 @endforeach
             </div>
         </div>

         <div class="widget w-latest-news">
             <div class="heading">
                 <h4 class="heading-title">Latest News</h4>
                 <div class="heading-line">
                     <span class="short-line"></span>
                     <span class="long-line"></span>
                 </div>
             </div>

             <div class="latest-news-wrap">
                 @foreach ($latestblog as $data)
                     <div class="latest-news-item">
                         <div class="post-additional-info">

                             <span class="post__date">
                                 <i class="seoicon-clock"></i>
                                 <time class="published" datetime="2016-04-23 12:00:00">
                                     {{ $data->created_at->format('d M Y') }}
                                 </time>
                             </span>
                         </div>

                         <h5 class="post__title entry-title ">
                             <a href="/blog/{{ $data->slug }}">{{ $data->title }}</a>
                         </h5>
                     </div>
                 @endforeach
             </div>

             <a href="{{ url('blog') }}" class="btn btn-small btn--dark btn-hover-shadow">
                 <span class="text">All News</span>
                 <i class="seoicon-right-arrow"></i>
             </a>
         </div>


         <div class="widget w-tags">
             <div class="heading">
                 <h4 class="heading-title">Popular Tags</h4>
                 <div class="heading-line">
                     <span class="short-line"></span>
                     <span class="long-line"></span>
                 </div>
             </div>

             <div class="tags-wrap">
                 @foreach ($tags as $tag)
                     <a href="/blog-tag/{{ $tag->slug }}" class="w-tags-item">{{ $tag->name }}</a>
                 @endforeach
             </div>
         </div>
     </aside>
 </div>
