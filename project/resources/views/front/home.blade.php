@extends('layouts.front')

@section('content')
	<!-- Hero Area Start -->
	<section class="hero-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
				    
				   
				    
				    
				    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				    
                      <ol class="carousel-indicators">
						@foreach($sliders as $slider)
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="@if($loop->first) active @endif"></li>
						@endforeach
                      </ol>
                      
                      <div class="carousel-inner">
						@foreach($sliders as $slider)
                        <div class="carousel-item @if($loop->first) active @endif">
                          <img src="{{  asset('assets/front/images/'.$slider->image) }}" class="d-block w-100" alt="{{ $slider->image }}">
                        </div>
						@endforeach
                      </div>

					
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                         <span class="mybtn1">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="mybtn1">
                            <span class="carousel-control-next-icon " aria-hidden="true"></span></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                    
                     <div class="content" style="padding-top:5em;">
						<!--<div class="heading-area">-->
						<!--	<h1 class="title">-->
						<!--			{{ $ps->header_btxt }}-->
						<!--	</h1>-->
						<!--	<p class="sub-title">-->
						<!--			{{ $ps->header_stxt }}-->
						<!--	</p>-->
						<!--</div>-->
						<form id="searchForm" action="{{ route('front.cars') }}" method="get">
							<ul class="select-list">
								<li>
									<div class="car-brand">
										<select class="js-example-basic-single" name="brand_id[]">
											<option value="" selected disabled>{{ $langg->lang9 }}</option>
											@foreach ($brands as $key => $brand)
											<option value="{{ $brand->id }}">{{ $brand->name }}</option>
											@endforeach
										</select>
									</div>
								</li>
								<li>
									<div class="car-condition">
										<select class="js-example-basic-single" name="condition_id">
											<option value="" selected disabled>{{ $langg->lang10 }}</option>
											@foreach ($conditions as $key => $condition)
											<option value="{{ $condition->id }}">{{ $condition->name }}</option>
											@endforeach
										</select>
									</div>
								</li>
								<!--<li>-->
								<!--	<div class="car-price">-->
								<!--		<select class="js-example-basic-single sel-price">-->
								<!--			<option value="" selected disabled>{{ $langg->lang11 }}</option>-->
								<!--			@foreach ($pricings as $key => $pricing)-->
								<!--			<option value="{{ $pricing->id }}">{{ $pricing->minimum }} - {{ $pricing->maximum }}</option>-->
								<!--			@endforeach-->
								<!--		</select>-->
								<!--		<input type="hidden" name="minprice" value="">-->
								<!--		<input type="hidden" name="maxprice" value="">-->
								<!--	</div>-->
								<!--</li>-->
								<li>
									<button type="submit" class="mybtn1" style="width: 100%; outline: 0;">{{ $langg->lang12 }}</button>
								</li>
							</ul>
						</form>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!-- Hero Area End -->
	
	<!-- Featured Cars Area Start -->
	<section class="latestCars">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-md-10">
					<div class="section-heading">
						<h2 class="title">
							{{ $ps->latest_btxt }}
						</h2>
						<p class="text">
							{{ $ps->latest_stxt }}
						</p>
					</div>
				</div>
			</div>
			<div class="row">
					<div class="col-lg-3 col-md-6">
						<a class="car-info-box" href="https://infonewdaihatsu.com/OTR/pages">
							<div class="img-area">
									<img class="light-zoom" src="https://daihatsu.co.id/images/info/price.svg" alt="">
							</div>
							<div class="content">
								<h4 class="title">
									Harga OTR
								</h4>
								
								<div class="footer-area">
									<p>Cek daftar harga mobil Daihatsu di sini.</p>
								</div>
							</div>
						</a>
					</div>
					
					<div class="col-lg-3 col-md-6">
						<a class="car-info-box" href="https://infonewdaihatsu.com/Persyaratan%20KREDIT/pages">
							<div class="img-area">
									<img class="light-zoom" src="https://daihatsu.co.id/images/info/quotes.svg" alt="">
							</div>
							<div class="content">
								<h4 class="title">
									Persyaratan Kredit
								</h4>
								
								<div class="footer-area">
									<p>Data persyaratan kredit bisa cek disini.</p>
								</div>
							</div>
						</a>
					</div>
					
					<div class="col-lg-3 col-md-6">
						<a class="car-info-box" href="https://daihatsu.co.id/shopping/dealer/" target="_blank">
							<div class="img-area">
									<img class="light-zoom" src="https://daihatsu.co.id/images/info/dealer.svg" alt="">
							</div>
							<div class="content">
								<h4 class="title">
									Find Dealer
								</h4>
								
								<div class="footer-area">
									<p>Temukan lokasi dealer Daihatsu terdekat.</p>
								</div>
							</div>
						</a>
					</div>
					
					<div class="col-lg-3 col-md-6">
						<a class="car-info-box" href="https://infonewdaihatsu.com/BROSUR/pages">
							<div class="img-area">
									<img class="light-zoom" src="https://daihatsu.co.id/images/info/brocure.svg" alt="">
							</div>
							<div class="content">
								<h4 class="title">
									Brosure
								</h4>
								
								<div class="footer-area">
									<p>Dapatkan informasi tentang produk Daihatsu.</p>
								</div>
							</div>
						</a>
					</div>
					
					
			</div>
			<div class="row justify-content-center mt-3">
				@if (count($lcars) == 2)
					<a href="{{ route('front.cars') }}" class="mybtn1">
						{{ $langg->lang15 }}
					</a>
				@endif
			</div>
		</div>
	</section>
	<!-- Featured Cars Area End -->

	<!-- Featured Cars Area Start -->
	<section class="featuredCars">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-md-10">
					<div class="section-heading">
						<h2 class="title">
							{{ $ps->featured_btxt }}
						</h2>
						<p class="text">
							{{ $ps->featured_stxt }}
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach ($fcars as $key => $fcar)
					<div class="col-lg-4 col-md-6">
							<a class="car-info-box" href="{{ route('front.details', $fcar->id) }}">
									<div class="img-area">
											<img class="light-zoom" src="{{asset('assets/front/images/cars//featured/'.$fcar->featured_image)}}" alt="">
									</div>
									<div class="content">
										<h4 class="title">
											{{ $fcar->title }}
										</h4>
										<ul class="top-meta">
											<li>
												<i class="far fa-eye"></i> {{ $fcar->views }} {{ $langg->lang13 }}
											</li>
											<li>
												<i class="far fa-clock"></i> {{ time_elapsed_string($fcar->created_at) }}
											</li>
										</ul>
										<ul class="short-info">
											<li class="north-west" title="Model Year">
												<img src="{{asset('assets/front/images/calender-icon.png')}}" alt="">
												<p>{{ $fcar->year }}</p>
											</li>
											<li class="north-west" title="Mileage">
												<img src="{{asset('assets/front/images/road-icon.png')}}" alt="">
												<p>{{ $fcar->mileage }}</p>
											</li>
											<li class="north-west" title="Top Speed (KMH)">
												<img src="{{asset('assets/front/images/transformar.png')}}" alt="">
												<p>{{ $fcar->top_speed }}</p>
											</li>
										</ul>
										<div class="footer-area">
											<div class="left-area">
												@if (empty($fcar->sale_price))
													<p class="price">
														{{ $fcar->currency_symbol }} {{ number_format($fcar->regular_price, 0, '', ',') }}
													</p>
												@else
													<p class="price">
														{{ $fcar->currency_symbol }} {{ number_format($fcar->sale_price, 0, '', ',') }} <del>{{ $fcar->currency_symbol }} {{ number_format($fcar->regular_price, 0, '', ',') }}</del>
													</p>
												@endif

											</div>
											<div class="right-area">
												<p class="condition">
													{{ $fcar->condtion->name }}
												</p>
											</div>
										</div>
									</div>
							</a>
					</div>
				@endforeach
			</div>
			<div class="row justify-content-center mt-3">
				@if (count($fcars) == 6)
					<a href="{{ route('front.cars') . '?type=featured' }}" class="mybtn1">
						{{ $langg->lang15 }}
					</a>
				@endif
			</div>
		</div>
	</section>
	<!-- Featured Cars Area End -->

	

	<!-- Testimonial Area Start -->
	@if (!!empty($testimonials))
	<section class="testimonial">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-md-10">
					<div class="section-heading">
						<h2 class="title">
							{{ $ps->testimonial_title }}
						</h2>
						<p class="text">
							{{ $ps->testimonial_subtitle }}
						</p>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-10">
					<div class="testimonial-slider">
						@foreach ($testimonials as $key => $testimonial)
							<div class="single-testimonial">
									<div class="people">
											<div class="img">
													<img src="{{asset('assets/images/testimonials/'.$testimonial->image)}}" alt="">
											</div>
											<h4 class="title">{{ $testimonial->name }}</h4>
											<p class="designation">{{ $testimonial->rank }}</p>
										</div>
									<div class="review-text">
										<p>
												"{{ $testimonial->comment }}"
										</p>
									</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
	@endif
	<!-- Testimonial Area End -->

	<!-- Blog Area Start -->
	@if ($blogs ==NULL)  
	<section class="blog">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-md-10">
					<div class="section-heading">
						<h2 class="title">
							{{ $ps->blog_btxt }}
						</h2>
						<p class="text">
							{{ $ps->blog_stxt }}
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="blog-slider">

						@foreach ($blogs as $key => $blog)
							<div class="single-blog">
								<div class="img">
									<img src="{{asset('assets/images/blogs/'.$blog->photo)}}" alt="">
								</div>
								<div class="content">
									<a href="{{ route('front.blogshow', $blog->id) }}">
										<h4 class="title">
											{{strlen($blog->title) > 60 ? substr($blog->title, 0, 60) . '...' : $blog->title}}
										</h4>
									</a>
									<ul class="top-meta">
										<li>
											<a href="#">
													<i class="far fa-user"></i> {{ $langg->lang16 }}
											</a>
										</li>
										<li>
											<a href="#">
													<i class="far fa-calendar"></i> {{ date ( 'jS M, Y' , strtotime($blog->created_at) ) }}
											</a>
										</li>
									</ul>
									<div class="text">
										<p>
												{{ (strlen(strip_tags($blog->details)) > 140) ? substr(strip_tags($blog->details), 0, 140) . '...' : strip_tags($blog->details) }}
										</p>
									</div>
									<a href="{{ route('front.blogshow', $blog->id) }}" class="link">{{ $langg->lang17 }}<i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
						@endforeach

					</div>
				</div>
			</div>
		</div>
	</section>
	@endif
	
	<!-- Blog Area End -->
@endsection


@section('scripts')
<script>
	$(".sel-price").on('change', function() {
		let url = '{{ url('/') }}/prices/' + $(this).val();
		// console.log(url);
		$.get(
			url,
			function(data) {
				console.log(data);
				$("input[name='minprice']").val(data.minimum);
				$("input[name='maxprice']").val(data.maximum);
			}
		)
	});
</script>
@endsection
