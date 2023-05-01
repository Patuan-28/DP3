<x-app-layout title="Data User">
    <!--begin::Search form-->
    <div id="content_list">
        <div class="card rounded-0 bgi-no-repeat bgi-position-x-end bgi-size-cover" style="background-color: #663259;background-size: auto 100%; background-image: url({{asset('keenthemes/media/misc/taieri.svg')}})">
            <!--begin::body-->
            <div class="card-body container pt-10 pb-8">
                <!--begin::Title-->
                <div class="d-flex align-items-center">
                    <h1 class="fw-bold me-3 text-white">Profile Siswa</h1>
                    <span class="fw-bold text-white opacity-50"></span>
                </div>
                <!--end::Title-->
                <!--begin::Wrapper-->
                <!--end::Wrapper-->
            </div>
            <!--end::body-->
        </div>
        <!--end::Search form-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Container-->
            <div class="container" id="kt_content_container">
                <!--begin::details View-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <div class="col-sm-12 col-md-12">
                                <div class="table-responsive">
                                    <div id="list_result"></div>
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
    </div>
    <div id="content_input"></div>
    @section('custom_js')
    <script type="text/javascript">
        load_list(1);
    </script>
    @endsection
</x-app-layout>