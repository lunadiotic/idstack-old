@extends('layouts.front.app')

@section('title')
    Kumpulan Tutorial Koding
@endsection

@section('content')
    <div class="main-wrapper scrollspy-container">
		
        <div class="breadcrumb-wrapper">
        
            <div class="container">
            
                <h1 class="page-title">Daftar Seri</h1>
                
                <div class="row xBread">
                
                    <div class="col-xs-12 col-sm-8">
                        <ol class="breadcrumb">
                            <li><a href="#">Beranda</a></li>
                            <li><a href="#">Seri</a></li>
                            <li class="active">Daftar Seri</li>
                        </ol>
                    </div>
                    
                </div>
                
            </div>

        </div>
    
        <div class="equal-content-sidebar-wrapper">
        
            <div class="equal-content-sidebar-by-gridLex">
            
                <div class="container">
                
                    <div class="GridLex-grid-noGutter-equalHeight">
            
                        <div class="GridLex-col-3_sm-4_xs-12_xss-12">

                            <div class="sidebar-wrapper pt-20-xs pb-0-xs">

                                <aside class="filter-sidebar">
                
                                    <div class="responsive-filter-wrapper">
                                
                                        <button type="button" class="navbar-toggle btn btn-primary collapsed btn-responsive-filter" data-toggle="collapse" data-target="#responsive-filter-box">Search Again &amp; Filter</button>
                                        
                                        <div class="clear"></div>

                                        <form action="{{ route('series.search') }}" method="GET">
                                            <div class="input-group">
                                                <input type="text" name="q" class="form-control placeholder-type-writter">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="button"><i class="ion-ios-search-strong"></i></button>
                                                </span>
                                            </div><!-- /input-group -->
                                        </form>

                                        </br>
                                        
                                        <div class="collapse navbar-collapse responsive-filter-box" id="responsive-filter-box">
                                        
                                            <div class="collapse-inner">

                                                <div class="sidebar-header clearfix">
                                                    <h4>Filter Pencarian</h4>
                                                    {{--  <a href="#" class="sidebar-reset-filter">reset filter</a>  --}}
                                                </div>
                                                
                                                <div class="sidebar-inner">
                                                
                                                    <div class="row gap-20">
                                                        
                                                        <div class="clear"></div>
                                                    
                                                        <div class="col-xss-12 col-xs-6 col-sm-12">
                                                        
                                                            <div class="sidebar-module clearfix">
                                                    
                                                                <h6 class="sidebar-title">Berdasarkan Pelajaran</h6>
                                                                <div class="sidebar-module-inner">
                                                                    @if($subject->count())
                                                                        @foreach($subject as $row)
                                                                            <div class="checkbox-block">
                                                                                <input id="property_type-{{ $row->id }}" name="property_type" type="checkbox" class="checkbox"/>
                                                                                <label class="" for="property_type-{{ $row->id }}">{{ $row->subject }} </label>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif                                                                    
                                                                </div>
                                                            
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="col-xss-12 col-xs-6 col-sm-12">
                                                        
                                                            <div class="sidebar-module clearfix">
                                                    
                                                                <h6 class="sidebar-title">Berdasarkan Kategori</h6>
                                                                
                                                                <div class="sidebar-module-inner">
                                                                    @if($software->count())
                                                                        @foreach($software as $row)
                                                                            <div class="checkbox-block">
                                                                                <input id="hotel_facilities-{{ $row->id }}" name="hotel_facilities" type="checkbox" class="checkbox"/>
                                                                                <label class="" for="hotel_facilities-{{ $row->id }}">{{ $row->software }}</label>
                                                                            </div>  
                                                                        @endforeach
                                                                    @endif 
                                                    
                                                                </div>
        
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="clear"></div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                    
                                    </div>
                                
                                </aside>
                                
                            </div>
                            
                        </div>

                        <div class="GridLex-col-9_sm-8_xs-12_xss-12">
                    
                            <div class="content-wrapper pt-20-xs">

                                
                                
                                <div class="course-list-item-wrapper alt">
                            
                                    @foreach($courses as $course)
                                        <div class="course-list-item">
                                    
                                            <div class="row gap-25">
                                            
                                                <div class="col-xss-12 col-xs-4 col-sm-4 col-md-4">
                                                
                                                    <div class="image">
                                                        <img src="{{ $course->image }}" alt="image" />
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="col-xss-12 col-xs-8 col-sm-8 col-md-8">
                                                
                                                    <div class="content">
                                                    
                                                        <h4><a href="{{ route('series.detail', $course->slug) }}">{{ $course->title }}</a></h4>
                                                        
                                                        <div class="content-inner">
                                                        
                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xss-7 col-xs-8 col-sm-8 col-md-6">
                                                                    <div class="course-instructor">
                                                                        <div class="image">
                                                                            <img src="{{ $course->user->image }}" alt="Image" class="img-circle" />
                                                                        </div>
                                                                        <span>{{ $course->user->name }}</span>
                                                                        
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-xss-5 col-xs-4 col-sm-4 col-md-3">
                                                                    {{--  <div class="rating-wrapper">
                                                                        <div class="rating-item">
                                                                            <input type="hidden" class="rating" data-filled="fa fa-star" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="3.5"/>
                                                                        </div>
                                                                        <span>(7 review)</span>
                                                                    </div>  --}}
                                                                </div>
                                                                
                                                                <div class="col-xss-12 col-xs-12 col-sm-12 col-md-3">
                                                                    <div class="price">
                                                                        {{ $course->price }}
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <p>{!! str_limit($course->desc, 100) !!}</p>
                                                        
                                                        <ul class="meta-list clearfix">
                                                            <li><i class="fa fa-folder-open-o"></i><span class="block"> {{ $course->subjects()->first()->subject }}</span></li>
                                                            <li><i class="fa fa-pencil-square-o"></i><span class="block"> {{ $course->detail->count() }} Lessons</span></li>
                                                            <li><i class="fa fa-check-square-o"></i><span class="block"> {{ $course->level->level }}</span></li>
                                                            <li class="btn-box"><a href="{{ route('series.detail', $course->slug) }}" class="btn btn-primary btn-form btn-inverse">details</a></li>
                                                        </ul>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            
                                            </div>
                                        
                                        </div>
                                    @endforeach

                                </div>

                                <div class="clear"></div>
                                
                                <div class="pager-wrappper clearfix">
                
                                    <div class="pager-innner">
                                    
                                        <div class="row">
                                                
                                            <div class="col-xs-12 col-sm-12 col-sm-6">
                                                <div class="pagination-text">Showing result {{ $courses->firstItem() }} to {{ $courses->lastItem() }} from {{ $courses->total() }} </div>
                                            </div>
                                            
                                            <div class="col-xs-12 col-sm-12 col-sm-6">
                                                <nav class="pager-right">
                                                    {{ $courses->links() }}
                                                </nav>
                                            </div>
                                        
                                        </div>
                                        
                                    </div>
                                    
                                </div>

                            
                            </div>
                        
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>

    </div>
@endsection