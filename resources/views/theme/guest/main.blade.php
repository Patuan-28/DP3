<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	@include('theme.guest.head')
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-white">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Signup Welcome Message -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{asset('keenthemes/media/illustrations/progress-hd.png')}})">
				<!--begin::Content-->
				{{$slot}}
				<!--end::Content-->
				<!--begin::Footer-->
				{{-- @include('theme.guest.footer') --}}
				<!--end::Footer-->
			</div>
			<!--end::Authentication - Signup Welcome Message-->
		</div>
		<!--end::Main-->
		<!--begin::Javascript-->
		@include('theme.guest.js')
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>