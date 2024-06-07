<!DOCTYPE html>
<html lang="">


<!-- Mirrored from retnews.netlify.app/homepage-v1 by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 May 2024 15:07:37 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	@include('layouts.partials.head')
</head>

<body>
    @include('layouts.partials.loading')

	@include('layouts.partials.header')

	<!-- Popular news -->
	<section>
		<!-- Popular news  header-->
        @yield('banner')
		<!-- End Popular news header-->

	</section>
	<!-- End Popular news -->

	<!-- Popular news category -->
	<section class="pt-0">
		<div class="popular__section-news">
			<div class="container">
                
                @yield('content')
				
			</div>
		</div>


		<!-- End Popular news category -->


		<div class="mx-auto">
            <!-- Pagination -->
            <div class="pagination-area">
                <div class="pagination wow fadeIn animated" data-wow-duration="2s" data-wow-delay="0.5s"
                    style="visibility: visible; animation-duration: 2s; animation-delay: 0.5s; animation-name: fadeIn;">
                    
                        @yield('pagination')

                </div>
            </div>
        </div>
	
    </section>
	<!-- End Popular news category -->


	@include('layouts.partials.footer')


	@include('layouts.partials.script')
</body>


<!-- Mirrored from retnews.netlify.app/homepage-v1 by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 May 2024 15:07:52 GMT -->
</html>