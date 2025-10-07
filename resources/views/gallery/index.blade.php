@extends('layout.master')
@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center mb-200" data-background="fe/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap pt-100">
                            <h2>Our Gallery</h2>
                            <nav aria-label="breadcrumb ">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Gallery</a></li> 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <div class="whole-wrap">
		<div class="container box_1170 mb-100">
            <div class="section-top-border">
				<div class="section-tittle section-tittle3">
                    <div class="front-text">
                        <h2 class="">Our Gallery</h2>
                    </div>
                    <span class="back-text">Portfolio</span>
                </div>
				<div class="row gallery-item">
					<div class="col-md-4">
						<a href="fe/img/elements/g1.jpg" class="img-pop-up">
							<div class="single-gallery-image" style="background: url(fe/img/elements/g1.jpg);"></div>
						</a>
					</div>
					<div class="col-md-4">
						<a href="fe/img/elements/g2.jpg" class="img-pop-up">
							<div class="single-gallery-image" style="background: url(fe/img/elements/g2.jpg);"></div>
						</a>
					</div>
					<div class="col-md-4">
						<a href="fe/img/elements/g3.jpg" class="img-pop-up">
							<div class="single-gallery-image" style="background: url(fe/img/elements/g3.jpg);"></div>
						</a>
					</div>
					<div class="col-md-6">
						<a href="fe/img/elements/g4.jpg" class="img-pop-up">
							<div class="single-gallery-image" style="background: url(fe/img/elements/g4.jpg);"></div>
						</a>
					</div>
					<div class="col-md-6">
						<a href="fe/img/elements/g5.jpg" class="img-pop-up">
							<div class="single-gallery-image" style="background: url(fe/img/elements/g5.jpg);"></div>
						</a>
					</div>
					<div class="col-md-4">
						<a href="fe/img/elements/g6.jpg" class="img-pop-up">
							<div class="single-gallery-image" style="background: url(fe/img/elements/g6.jpg);"></div>
						</a>
					</div>
					<div class="col-md-4">
						<a href="fe/img/elements/g7.jpg" class="img-pop-up">
							<div class="single-gallery-image" style="background: url(fe/img/elements/g7.jpg);"></div>
						</a>
					</div>
					<div class="col-md-4">
						<a href="fe/img/elements/g8.jpg" class="img-pop-up">
							<div class="single-gallery-image" style="background: url(fe/img/elements/g8.jpg);"></div>
						</a>
					</div>
				</div>
			</div>
        </div>
    </div>
@endsection
@section('client')
    @include('layout.client')
@endsection