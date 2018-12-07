<!DOCTYPE html>
<html lang="en">
<head>
@include('partials.header')

<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		@include('partials.nav')
			</header>

	<!-- Slide1 -->
	<section class="slide1">
		@include('partials.slider')
	</section>

	<!-- Banner -->
	<section class="banner bgwhite p-t-40 p-b-40">
		@include('partials.banner')
	</section>

	<!-- New Product -->
	<section class="newproduct bgwhite p-t-45 p-b-105">
		
			@include('partials.feature_product')
	</section>

	<!-- Banner2 -->
	<section class="banner2 bg5 p-t-55 p-b-55">
		@include('partials.collectionbook')
	</section>


	<!-- Blog -->
	<section class="blog bgwhite p-t-94 p-b-65">
		@include('partials.blog')
	</section>

	<!-- Instagram -->
	<section class="instagram p-t-20">
	 @include('partials.Instagram')
	</section>

	<!-- Shipping -->
	<section class="shipping bgwhite p-t-62 p-b-46">
		@include('partials.shippingdetails')
	</section>


	<!-- Footer -->
	@include('partials.footer')
</body>
</html>
