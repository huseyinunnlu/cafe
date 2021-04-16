@extends('frontend.master')
@section('content')
<section class="section" id="about">
	<div class="container">
		<div class="row">
			<div class="section-heading ">
				<h3>Frames From Our Cafe</h3>
			</div>
			<div class="section-body">
				<div class="row">
					@foreach($galleries as $gallery)
					<div class="col-md-3 img-hover-zoom gallery-item">
						@if($gallery->type=='image')
						<a href="{{asset($gallery->url)}}"t target="__blank"><img src="{{asset($gallery->url)}}"  alt="This zooms-in really well and smooth"></a>
						@else
						<iframe src="{{asset($gallery->url)}}"></iframe>
						@endif
					</div>
					@endforeach
				</div>
			</div>
			<div class="paginate">
				{{$galleries->links()}}
			</div>
		</div>


	</div>
</section>
<style type="text/css">
	.section-body iframe,.section-body img{
		height: 100%;
		width: 100%;
		margin: 30px 0;
	}

	.gallery-item {
		margin: 20px 0;
	}

	.paginate{
		display: block;
		text-align: center;
		margin: 35px 0;
	}

	/* [1] The container */
	.img-hover-zoom {
		max-height: 300px; /* [1.1] Set it as per your need */
		overflow: hidden; /* [1.2] Hide the overflowing of child elements */
	}

	/* [2] Transition property for smooth transformation of images */
	.img-hover-zoom img {
		transition: transform 0.8s ease;
	}

	/* [3] Finally, transforming the image when container gets hovered */
	.img-hover-zoom:hover img {
		transform: scale(1.2);
	}
</style>
@stop