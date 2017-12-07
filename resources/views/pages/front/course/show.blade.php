@extends('layouts.front.app')

@section('title')
    Belajar {{ $course->course->title }} | | {{ $course->title }}
@endsection

@section('styles')
    <style>
    .col-center{
        margin:0 auto;
    }
</style>
@endsection

@section('content')
    <!-- start Main Wrapper -->
    <div class="main-wrapper scrollspy-container">
    
        <div class="breadcrumb-wrapper">
        
            <div class="container">
                <div class="row xBread">
                
                    <div class="col-xs-12 col-sm-8">
                        <ol class="breadcrumb">
                            <li><a href="#">Beranda</a></li>
                            <li><a href="#">Seri</a></li>
                            <li><a href="{{ route('series.detail', $related->slug) }}">{{ $related->title }}</a></li>
                            <li class="active">{{ $course->title }}</li>
                        </ol>
                    </div>
                    
                    <div class="col-xs-12 col-sm-4 hidden-xs">
                        {{--  <p class="hot-line"> <i class="fa fa-phone"></i> Hot Line: 1-222-33658</p>  --}}
                    </div>
                    
                </div>
                
            </div>

        </div>
    
        <div class="equal-content-sidebar-wrapper detail-page-wrapper">
            
            <div class="equal-content-sidebar-by-gridLex right-sidebar">

                <div class="container">
                
                    <div class="GridLex-grid-noGutter-equalHeight">
                        
                        <div class="GridLex-col-9_sm-8_xs-12_xss-12">
                            
                            <div class="content-wrapper">
                        
                                <div class="watching-content-wrapper">

                                    <div class="flex-video vimeo mb-40"> 
                                        @guest
                                        <div class="center-block">
                                            <h2 style="text-align: center;margin-top: 190px;">Mau Nonton ? Gabung dulu ya, Sob :D</h2>
                                        </div>
                                        @else
                                            {!! $course->iframe !!}
                                        @endguest
                                    </div>
                                    <div class="watching-pager-wrapper">
                                        <ul class="watching-pager mb-30 clearfix">
                                            @guest
                                                <li class="prev">
                                                    <a href="{{ route('login') }}">
                                                        <h5 class="btn btn-primary">Masuk</h5>
                                                    </a>
                                                </li>
                                                <li class="next">
                                                    <a href="{{ route('login') }}">
                                                        <h5 class="btn btn-success">Daftar</h5>
                                                    </a>
                                                </li>
                                            @else
                                            <li class="prev">
                                                @if($prev)
                                                    <a href="{{ route('series.detail.show', [$related->slug,$prev->slug]) }}">
                                                        <span class="text-primary font12">Sebelumnya</span>
                                                        <h5>{{ $prev->title }}</h5>
                                                    </a>
                                                @endif
                                            </li>
                                            <li class="next">
                                                @if($next)
                                                    <a href="{{ route('series.detail.show', [$related->slug,$next->slug]) }}">
                                                        <span class="text-primary font12">Selanjutnya</span>
                                                        <h5>{{ $next->title }}</h5>
                                                    </a>
                                                @endif
                                            </li>
                                            @endguest
                                        </ul>
                                    </div>
                                    
                                    <div class="clear"></div>
                                    
                                    <div class="row xWatchDesc">
                        
                                        <div class="col-xss-12 col-xs-12">
                                        
                                            <div class="section-title text-left mb-20">
                                                <h3>Deskripsi</h3>
                                            </div>

                                            <p>{!! $course->desc !!}</p>

                                        </div>
                                        
                                        
                                        
                                    </div>
                        

                                </div>

                                <div class="review-content">

                                    <ul class="review-list">
													
                                        <li class="clearfix">
                                            <div id="disqus_thread"></div>
                                        </li>
                                        
                                    </ul>
												
                                </div>

                            </div>
                            
                            
                        </div>

                        <div class="GridLex-col-3_sm-4_xs-12_xss-12">
                        
                            <aside class="sidebar-wrapper pt-0-xs">

                                <div class="chapter-playlist-module mb-30">
                            
                                    <div class="chapter-playlist">
                                        <h5>{{ $course->course->title }}</h5>
                                        <ul class="playlist">
                                            @foreach($related->detail as $playlist)
                                                <li class="{{ $playlist->id == $course->id ? 'playing' : '' }} clearfix">
                                                    <a href="{{ route('series.detail.show', [$related->slug,$playlist->slug]) }}">
                                                        <span class="icon"><i class="fa {{ $playlist->id == $course->id ? 'fa-pause' : 'fa-play-circle' }}"></i></span>
                                                        {{ $playlist->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    
                                </div>
                                
                                <div class="sidebar-module clearfix">
                                    
                                    <div class="sidebar-header clearfix">
                                        <h4 class="mb-15">Instruktur</h4>
                                    </div>
                                    
                                    <a href="#" class="teacher-item-sm clearfix">
                                        <div class="image">
                                            <img src="{{ $related->user->image }}" alt="Man" />
                                        </div>
                                        <div class="content">
                                            <h3>{{ $related->user->name }}</h3>
                                            <p class="labeling">{{ $related->user->title }}</p>
                                        </div>
                                    </a>
                                    
                                </div>
                                
                            </aside>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>

            
        </div>
        
    </div>
    <!-- end Main Wrapper -->
@endsection

@section('scripts')
    <script>
        (function() { 
            var d = document, s = d.createElement('script');
            s.src = 'https://idstack.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@endsection