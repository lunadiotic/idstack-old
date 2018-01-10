@extends('layouts.front.app')

@section('content')
    <div class="main-wrapper scrollspy-container">
			<!-- start hero-header -->
			<div class="hero overlay-3" style="background-image:url('{{ url('/') }}/assets/front/images/hero-header/01.png');">
			
				<div class="container">
				
					<div class="row">
					
						<div class="main-search-wrapper">
					
							<h2 class="text-center">What course will you like to learn?</h2>
							<p class="lead text-center">Cari seri tutorial yang kamu butuhkan di sini.</p>

							<form action="{{ route('series.search') }}" method="GET">
								<div class="input-group">
									<input type="text" name="q" class="form-control placeholder-type-writter">
									<span class="input-group-btn">
										<button class="btn btn-primary" type="button"><i class="ion-ios-search-strong"></i></button>
									</span>
								</div><!-- /input-group -->
							</form>
						
							<div class="featured-sm-wrapper">
								
								<div class="GridLex-gap-30">
					
									<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
									
										<div class="GridLex-col-4_sm-4_xs-8_xss-12">
										
											<div class="featured-sm-item clearfix">
												
												<div class="icon">
													<i class="ion-clipboard"></i>
												</div>
												
												<div class="content">
													Lebih dari {{ number_format($courses->count()) }} seri yang tersedia
												</div>
												
											</div>
											
										</div>
										
										<div class="GridLex-col-4_sm-4_xs-8_xss-12">
										
											<div class="featured-sm-item clearfix">
											
												<div class="icon">
													<i class="ion-person-stalker"></i>
												</div>
												
												<div class="content">
													Terdapat {{ App\Models\User::count() }} peserta yang bergabung
												</div>
												
											</div>
											
										</div>
										
										<div class="GridLex-col-4_sm-4_xs-8_xss-12">
										
											<div class="featured-sm-item clearfix">
											
												<div class="icon">
													<i class="ion-ipad"></i>
												</div>
												
												<div class="content">
													Bebas belajar di manapun, kapanpun.
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
			<!-- end hero-header -->
	
			<!-- start Top Offer -->
			<section class="section bg-light">
			
				<div class="container">
				
					<div class="row">
					
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						
							<div class="section-title">
								<h2 class="text-center">Seri Terbaru</h2>
								<p>Pengalaman baru yang bisa kamu pelajari melalui karya-karya terbaru dari para ahlinya. Temukan selanjutnya di sini:</p>
							</div>
						</div>
					
					</div>
					
					<div class="course-item-wrapper gap-20">
					
						<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">

                            @php
                                $courses = $courses->orderBy('id', 'desc')->take(8)->get();
                            @endphp

                            @if($courses->count())
                                @foreach($courses as $course)
                                    <div class="GridLex-col-3_mdd-4_sm-6_xs-6_xss-12">
                                        <div class="course-item">
                                            <a href="{{ route('series.detail', $course->slug) }}">
                                                <div class="course-item-image">
                                                    <img src="{{ $course->image }}" alt="Image" class="img-responsive" />
                                                </div>
                                                <div class="course-item-top clearfix">
                                                    <div class="course-item-instructor">
                                                        <div class="image">
                                                            <img src="{{ $course->user->image }}" alt="Image" class="img-circle" />
                                                        </div>
                                                        <span>{{ ucwords($course->user->name) }} </span>
                                                    </div>
                                                    <div class="course-item-price bg-danger">
                                                        {{ $course->price }}
                                                    </div>
                                                </div>
                                                <div class="course-item-content">
                                                    {{--  <div class="rating-wrapper">
                                                        <div class="rating-item">
                                                            <input type="hidden" class="rating" data-filled="fa fa-star" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="3.5"/>
                                                        </div>
                                                        <span> (7 review)</span>
                                                    </div>  --}}
                                                    <h3 class="text-primary">{{ $course->title }}</h3>
                                                    <p>{!! str_limit($course->desc, 100) !!}</p>
                                                </div>
                                                <div class="course-item-bottom clearfix">
                                                    <div><i class="fa fa-folder-open-o"></i>
                                                        {{--  @foreach ($course->subjects as $subject)
                                                            <span class="block">{{ $subject->subject }}</span>
                                                        @endforeach  --}}
														{{ $course->subjects()->first()->subject }}
                                                    </div>
                                                    <div><i class="fa fa-pencil-square-o"></i>
                                                        <span class="block">{{ $course->detail->count() }} Lessons</span>
                                                    </div>
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
				
			</section>
			<!-- end Top Offer -->

			<div class="overflow-hidden">
			
				<div class="GridLex-grid-noGutter-equalHeight">
				
					<div class="GridLex-col-6_sm-12_xs-12 bg-img" style="background-image:url('{{ url('/') }}/assets/front/images/hero-header-slider/02.jpg'); background-position: top right">
					
						<div class="promo-box-03 overlay-danger">
						
							<div class="promo-box-03-inner">
							
								<h2 class="mb-25 text-white">Bergabunglah dengan peserta lainnya</h2>
								<p>Seru! Ikuti belajar bersama mereka dan temukan sahabat baru dalam hobi yang sama. </p>
								
								<a href="{{ route('register') }}" class="btn btn-primary">Gabung Sekarang</a>
								
							</div>
							
						</div>
						
					</div>
					
					<div class="GridLex-col-6_sm-12_xs-12 bg-img" style="background-image:url('{{ url('/') }}/assets/front/images/teacher-bg.jpg'); background-position: top right">
					
						<div class="promo-box-03 overlay-primary">
							
							<div class="promo-box-03-inner">
							
								<h2 class="mb-25 text-white">Ingin berbagi pengalaman dengan mereka ?</h2>
								<p>Kami beri kesempatan terbuka untuk para ahli dapat berkontribusi melalui media belajar bersama ini.</p>
								
								<a href="#" class="btn btn-danger">Ikuti Petunjuk</a>
							
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>

			{{--  <section class="section">
			
				<div class="container">
				
					<div class="row">
					
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						
							<div class="section-title">
								<h2 class="text-center">Apa Kata Mereka ?</h2>
								<p>Temukan hal yang menarik yang bisa ditemukan melalui pengalaman mereka bersama.</p>
							</div>
						</div>
					
					</div>
					
					<div class="testimonial-wrapper">
		
						<div class="GridLex-gap-30">
						
							<div class="GridLex-grid-noGutter-equalHeight">
							
								<div class="GridLex-col-4_sm-4_xs-12_xss-12">
								
									<div class="testimonial-item clearfix">
									
										<div class="testimonial-header">
										
											<div class="image">
												<div class="image-inner">
													<img src="{{ url('/') }}/assets/front/images/man/10.jpg" alt="Image" />
												</div>
											</div>
											
											<div class="name">
												<h5>Antony Robert</h5>
												<span>From Spain</span>
											</div>
											
										</div>
										
										<div class="content">
											<p>She meant new their sex could defer child. An lose at quit to life do dull. Moreover end horrible endeavor entrance any families. Income appear extent on of thrown in admire.</p>
										</div>
									
									</div>
									
								</div>
								
								<div class="GridLex-col-4_sm-4_xs-12_xss-12">
								
									<div class="testimonial-item clearfix">
									
										<div class="testimonial-header">
										
											<div class="image">
												<div class="image-inner">
													<img src="{{ url('/') }}/assets/front/images/man/10.jpg" alt="Image" />
												</div>
											</div>
											
											<div class="name">
												<h5>Mohammed Salem</h5>
												<span>From Turkey</span>
											</div>
											
										</div>
										
										<div class="content">
											<p>Consider now provided laughter boy landlord dashwood. Often voice and the spoke. No shewing fertile village equally prepare up females sentiments increasing particular.</p>
										</div>
									
									</div>
									
								</div>
								
								<div class="GridLex-col-4_sm-4_xs-12_xss-12">
								
									<div class="testimonial-item clearfix">
									
										<div class="testimonial-header">
										
											<div class="image">
												<div class="image-inner">
													<img src="{{ url('/') }}/assets/front/images/man/10.jpg" alt="Image" />
												</div>
											</div>
											
											<div class="name">
												<h5>Chaiyapatt Putsathit</h5>
												<span>From Thailand</span>
											</div>
											
										</div>
										
										<div class="content">
											<p>Advantages boisterous day excellence boy. Out between our two waiting wishing. Pursuit he he garrets greater towards amiable so placing. Abode shy shade she hours forth its use.</p>
										</div>
									
									</div>
									
								</div>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</section>
				
			<section class="section bg-light">
			
				<div class="container">
				
					<div class="row">
					
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						
							<div class="section-title">
								<h2 class="text-center">Kiriman Terbaru</h2>
							</div>
						</div>
					
					</div>
					
					<div class="recent-post-wrapper mt-10">
		
						<div class="GridLex-gap-30">
						
							<div class="GridLex-grid-noGutter-equalHeight">
							
								<div class="GridLex-col-4_sm-4_xs-12_xss-12">
								
									<div class="recent-post-item">
									
										<a href="#">
										
											<div class="heading clearfix">
												
												<div class="image">
													<img src="{{ url('/') }}/assets/front/images/post-grid/01.jpg" alt="image" />
												</div>
												<div class="date-posted">January<span>05</span></div>
												
											</div>
											
											<div class="content">
											
												<h4>Way devonshire expression saw travelling affronting</h4>
												
												<p class="recent-post-entry">Saved he do fruit woody of to. Met defective are allowance two perceived listening consulted contained. It chicken oh colonel pressed excited suppose to shortly...</p>
												
												<div class="recent-post-meta clearfix">
													<div>by: <span>Admin</span></div>
													<div>in: <span>Review Trip</span></div>
												</div>
												
											</div>
										
										</a>

									</div>
									
								</div>
								
								
								<div class="GridLex-col-4_sm-4_xs-12_xss-12">
								
									<div class="recent-post-item">
									
										<a href="#">
										
											<div class="heading clearfix">
												
												<div class="image">
													<img src="{{ url('/') }}/assets/front/images/post-grid/02.jpg" alt="image" />
												</div>
												<div class="date-posted">March<span>15</span></div>
												
											</div>
											
											<div class="content">
											
												<h4>Esteem put uneasy set piqued son depend her others</h4>
												
												<p class="recent-post-entry">Particular way thoroughly unaffected projection favourable mrs can projecting own. Thirty it matter enable become admire in giving. See resolved goodness felicity...</p>
												
												<div class="recent-post-meta clearfix">
													<div>by: <span>Admin</span></div>
													<div>in: <span>Review Trip</span></div>
												</div>
												
											</div>
										
										</a>

									</div>
									
								</div>
								
								<div class="GridLex-col-4_sm-4_xs-12_xss-12">
								
									<div class="recent-post-item">
									
										<a href="#">
										
											<div class="heading clearfix">
												
												<div class="image">
													<img src="{{ url('/') }}/assets/front/images/post-grid/03.jpg" alt="image" />
												</div>
												<div class="date-posted">March<span>22</span></div>
												
											</div>
											
											<div class="content">
											
												<h4>Delightful remarkably mr on announcing themselves</h4>
												
												<p class="recent-post-entry">Domestic confined any but son bachelor advanced remember. How proceed offered her offence shy forming. Returned peculiar pleasant but appetite differed she....</p>
												
												<div class="recent-post-meta clearfix">
													<div>by: <span>Admin</span></div>
													<div>in: <span>Review Trip</span></div>
												</div>
												
											</div>
										
										</a>

									</div>
									
								</div>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</section>  --}}
			
		</div>
@endsection