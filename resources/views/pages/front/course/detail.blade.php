@extends('layouts.front.app')

@section('title')
    Belajar {{ $course->title }}
@endsection

@section('content')
    <div class="main-wrapper scrollspy-container">
		
        <div class="breadcrumb-wrapper">
        
            <div class="container">
                <div class="row xBread">
                
                    <div class="col-xs-12 col-sm-8">
                        <ol class="breadcrumb">
                            <li><a href="#">Beranda</a></li>
                            <li><a href="#">Seri</a></li>
                            <li><a href="#">Daftar Seri</a></li>
                            <li class="active">{{ $course->title }}</li>
                        </ol>
                    </div>
                    
                    <div class="col-xs-12 col-sm-4 hidden-xs">
                        {{--  <p class="hot-line"> <i class="fa fa-phone"></i> Hot Line: 1-222-33658</p>  --}}
                    </div>
                    
                </div>
                
            </div>

        </div>
        
        <div class="course-detail-header">
        
            <div class="container">
                
                <div class="info clearfix">
                            
                    <div class="image">
                        <img src="{{ $course->image }}" alt="Image" class="img-responsive" />
                    </div>
                    <div class="content">
                        <h2>{{ $course->title }}</h2>
                    </div>
                    
                    <ul class="meta-list">
                        
                        <li>
                            <div class="meta-teacher clearfix">
                                <div class="image">
                                    <img src="{{ $course->user->image }}" alt="Images" />
                                </div>
                                <div class="content">
                                    <span class="text-muted mt-3 block">Instructor</span>
                                    <h6><a href="#" class="anchor">{{ $course->user->name }}</a></h6>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="meta-category">
                                <div class="content">
                                    <span class="text-muted mt-3 block">Subject</span>
                                    <h6>
                                        @foreach($course->subjects as $row)
                                            {{ $loop->first ? '' : ', ' }}
                                            <a href="course-detail-section-2.html" class="anchor">{{ $row->subject }}</a>
                                        @endforeach
                                    </h6>
                                </div>
                            </div>
                        </li>
                        
                        <li>
                            <div class="meta-category">
                                <div class="content">
                                    <span class="text-muted mt-3 block">Level</span>
                                    <h6>{{ $course->level->level }}</h6>
                                </div>
                            </div>
                        </li>
                        
                        <li>
                            <div class="meta-rating">
                                {{--  <span class="text-muted mt-3 block">Reviews</span>
                                <div class="rating-wrapper">
                                    <div class="rating-item">
                                        <input type="hidden" class="rating" data-filled="fa fa-star" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="3.5"/>
                                    </div>
                                    <span> (7 review)</span>
                                </div>  --}}
                            </div>
                        </li>
                        
                        <li class="meta-price">
                            <div class="price bg-danger">{{ $course->price }}</div>
                        </li>
                        
                    </ul>
                    
                </div>

            </div>
            
        </div>
    
        <div class="equal-content-sidebar-wrapper detail-page-wrapper">
            
            <div class="equal-content-sidebar-by-gridLex">

                <div class="container">
                
                    <div class="GridLex-grid-noGutter-equalHeight">
                        
                        <div class="GridLex-col-3_sm-4_xs-12_xss-12 hidden-xs">
                        
                            <aside class="sidebar-wrapper">
                        
                                <div class="scrollspy-sidebar alt-style-01">
                                
                                    <ul class="scrollspy-sidenav">
                                    
                                        <li class="heading"><h5>Menu</h5></li>
                                        <li>
                                        
                                            <ul class="nav faq-nav">
                                                <li><a href="#course-detail-section-0" class="anchor">Perkenalan</a></li>
                                                <li><a href="#course-detail-section-1" class="anchor">Pelajaran</a></li>
                                                <li><a href="#course-detail-section-2" class="anchor">Instruktur</a></li>
                                                <li><a href="#course-detail-section-3" class="anchor">Seri Lainnya</a></li>
                                            </ul>
                                            
                                        </li>

                                    </ul>
                                    
                                    <div class="clearfix mb-20 mt-30">
                                        <a href="{{ $course->detail->count() ? route('series.detail.show', [$course->slug,$course->detail->first()->slug]) : '#' }}" class="btn btn-primary btn-block btn-md">Mulai!</a>
                                    </div>
                                    
                                    
                                </div>

                            </aside>
                            
                        </div>
                        
                        <div class="GridLex-col-9_sm-8_xs-12_xss-12">
                            
                            <div class="content-wrapper">
                        
                                <div class="detail-content-wrapper">

                                    <div id="course-detail-section-0" class="course-detail-section">
                                        
                                        <div class="section-title text-left mb-20">
                                            <h3>Perkenalan</h3>
                                        </div>
                                        
                                        <div class="flex-video vimeo mb-40"> 
                                            {!! $course->detail->count() ? $course->detail->first()->iframe : 'Video' !!}
                                        </div>
                                        
                                        <div class="course-intro">
                                        
                                            <div class="listing-box clearfix">
                                            
                                                <h5>Ringkasan</h5>
                                                
                                                <ul class="listing-box-list">
                                                
                                                    <li>
                                                        <div class="row gap-10">
                                                            <div class="col-xs-5 col-sm-6"><i class="fa fa-bars mr-5"></i> Level</div>
                                                            <div class="col-xs-7 col-sm-6 text-right font600">{{ $course->level->level }}</div>
                                                        </div>
                                                    </li>
                                                    
                                                    <li>
                                                        <div class="row gap-10">
                                                            <div class="col-xs-5 col-sm-5"><i class="fa fa-calendar mr-5"></i> Dibuat</div>
                                                            <div class="col-xs-7 col-sm-7 text-right font600">{{ $course->created_at->format('d/m/Y') }}</div>
                                                        </div>
                                                    </li>
                                                    
                                                    <li>
                                                        <div class="row gap-10">
                                                            <div class="col-xs-5 col-sm-5"><i class="fa fa-pencil-square-o mr-5"></i> Total</div>
                                                            <div class="col-xs-7 col-sm-7 text-right font600">{{ $course->detail->count() }}  lessons</div>
                                                        </div>
                                                    </li>
                                                    
                                                </ul>
                                                
                                            </div>
                                        
                                        </div>

                                        <div id="description">
                                            {!! $course->desc !!}
                                        </div>
                                        
                                    </div>

                                    <div id="course-detail-section-1" class="course-detail-section">
										
                                        <div class="section-title text-left mb-20">
                                        
                                            <h3>List Pelajaran</h3>
                                
                                        </div>

                                        <div class="course-lession-wrapper-2">
                                        
                                            @foreach($course->detail as $lesson)
                                                <a href="{{ route('series.detail.show', [$course->slug,$lesson->slug]) }}" class="course-lession-item-2">
                                            
                                                    <div class="content-top">
                                                    
                                                        <div class="row">
                                                        
                                                            <div class="col-xs-12 col-sm-6 mb-15">
                                                            
                                                                <span class="lebal-lesson">{{ $lesson->title }}</span> 
                                                                {{--  <span class="label label-primary">Preview</span>  --}}
                                                                
                                                            </div>
                                                            
                                                            <div class="col-xs-12 col-sm-6 mb-15">
                                                                <div class="meta text-right text-left-xs">
                                                                    <i class="fa fa-video-camera"></i> video <span class="mh-5">
                                                                </div>
                                                            </div>
                                                        
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class="content">
                                                    
                                                        <p>{!! str_limit($lesson->desc, 200) !!}</p>

                                                    </div>
                                                
                                                </a>
                                            @endforeach
                                        
                                        </div>
                                        
                                    </div>

                                    <div id="course-detail-section-2" class="course-detail-section">
											
                                        <div class="section-title text-left mb-20">
                                            <h3>Profil Instruktur</h3>
                                        </div>
                                        
                                        <div class="teacher-item-list-02-wrapper">
                    
                                            <div class="teacher-item-list-02 clearfix">
                                            
                                                <div class="row gap-20">
                                                
                                                    <div class="col-xs-12 col-sm-3 col-md-2">
                                                    
                                                        <div class="image">
                                                            <img src="{{ $course->user->image }}" alt="Image" />
                                                        </div>
                                                        
                                                        <div class="clear"></div>
                                                        
                                                        <ul class="user-action">
                                                            
                                                            <li><a href="{{ $course->user->facebook ?? '#' }}" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                                            <li><a href="{{ $course->user->twitter ?? '#' }}" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                                            <li><a href="{{ $course->user->github ?? '#' }}" data-toggle="tooltip" data-placement="top" title="GitHub"><i class="fa fa-github"></i></a></li>
                                                            
                                                        </ul>
                                                                
                                                    </div>
                                                    
                                                    <div class="col-xs-12 col-sm-9 col-md-10">
                                                    
                                                        <div class="content">
                                                                
                                                            <h3><a href="#">{{ $course->user->name }}</a></h3>
                                                            <p class="labeling">{{ $course->user->title }}</p>
                                                            
                                                            <p class="short-info">{!! $course->user->desc !!}</p>
                                                            
                                                            <a href="#" class="btn btn-primary btn-inverse btn-sm">More about him</a>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>

                                            
                                        </div>
                                        
                                        <div class="clear mb-10"></div>

                                    </div>
                                    
                                    <div id="course-detail-section-3" class="course-detail-section">
										
                                        <div class="section-title text-left mb-20">
                                            <h3>Seri Terkait</h3>
                                        </div>
                                        
                                        <div class="course-item-wrapper alt-bg-white course-item-wrapper-mmb-45 gap-20">
                        
                                            <div class="GridLex-grid-noGutter-equalHeight">

                                                @if($relates)
                                                    @foreach($relates as $row)
                                                        <div class="GridLex-col-4_mdd-6_xs-6_xss-12">
                                                            <div class="course-item">
                                                                <a href="#">
                                                                    <div class="course-item-image">
                                                                        <img src="{{ $row->image }}" alt="Image" class="img-responsive" />
                                                                    </div>
                                                                    <div class="course-item-top clearfix">
                                                                        <div class="course-item-instructor">
                                                                            <div class="image">
                                                                                <img src="{{ $row->user->image }}" alt="Image" class="img-circle" />
                                                                            </div>
                                                                            <span>{{ $row->user->name }} </span>
                                                                        </div>
                                                                        <div class="course-item-price bg-danger">
                                                                            {{ $row->price }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="course-item-content">
                                                                        <div class="rating-wrapper">
                                                                            {{--  <div class="rating-item">
                                                                                <input type="hidden" class="rating" data-filled="fa fa-star" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="3.5"/>
                                                                            </div>
                                                                            <span> (7 review)</span>  --}}
                                                                        </div>
                                                                        <h3 class="text-primary">{{ $row->title }}</h3>
                                                                    </div>
                                                                    <div class="course-item-bottom clearfix">
                                                                        <div><i class="fa fa-folder-open-o"></i><span class="block"> {{ $course->subjects()->first()->subject }}</span></div>
                                                                        <div><i class="fa fa-pencil-square-o"></i><span class="block"> {{ $course->detail->count() }} Lessons</span></div>
                                                                        <div><i class="fa fa-check-square-o"></i><span class="block"> {{ $course->level->level }}</span></div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                
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