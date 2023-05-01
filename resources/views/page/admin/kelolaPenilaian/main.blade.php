<x-app-layout title="Data Kelola Penilaian">
    <!--begin::Search form-->
    <div id="content_list">
        <div class="card rounded-0 bgi-no-repeat bgi-position-x-end bgi-size-cover" style="background-color: #663259;background-size: auto 100%; background-image: url({{asset('keenthemes/media/misc/taieri.svg')}})">
            <!--begin::body-->
            <div class="card-body container pt-10 pb-8">
                <!--begin::Title-->
                <div class="d-flex align-items-center">
                    <h1 class="fw-bold me-3 text-white">Data Kelola Penilaian</h1>
                    <span class="fw-bold text-white opacity-50"></span>
                </div>
                <!--end::Title-->
                <!--begin::Wrapper-->
                <div class="d-flex flex-column">
                    <!--begin::Block-->
                    <div class="d-lg-flex align-lg-items-center">
                        <!--begin::Simple form-->
                        <form id="content_filter">
                            <div class="rounded d-flex flex-column flex-lg-row align-items-lg-center bg-body p-5 w-xxl-850px h-lg-60px me-lg-10 my-5">
                                <!--begin::Row-->
                                <div class="row flex-grow-1 mb-5 mb-lg-0" data-select2-id="select2-data-114-6u6h">
                                    <!--end::Col-->
                                
                                    <!--begin::Col-->
                                    <div class="col-lg-12 d-flex align-items-center mb-12 mb-lg-0" data-select2-id="select2-data-113-5sj0">
                                        <!--begin::Desktop separartor-->
                                        <div class="bullet bg-secondary d-none d-lg-block h-30px w-2px me-5"></div>
                                        <!--end::Desktop separartor-->
                                
                                        <i class="ki-outline ki-element-11 fs-1 text-gray-400 me-1"></i>
                                        <!--begin::Select-->
                                        <select class="form-select border-0 flex-grow-1 select2-hidden-accessible" name="fiter_keywords" id="filter" data-control="select2" data-hide-search="true" data-select2-id="select2-data-7-4wac" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                            <?php 
                                                $kelolaPenilaian = \App\Models\KelolaPenilaian::distinct()->get(['kategori']); 
                                            ?>
                                            @foreach ($kelolaPenilaian as $item)
                                                <option value="{{$item->kategori}}">{{$item->kategori}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                
                                    <!--begin::Col-->
                                
                                </div>
                                <!--end::Row-->
                                
                                <!--begin::Action-->
                                <div class="min-w-150px text-end">
                                    <button type="button" onclick="load_list(1);" class="btn btn-dark">Cari</button>
                                </div>
                                <!--end::Action-->
                                </div>
                            
                        </form>
                        <!--end::Simple form-->
                        <!--begin::Action-->
                        <div class="d-flex align-items-center">
                            <a class="btn btn-active-color-danger" href="javascript:;" onclick="load_input('{{route('admin.kelolaPenilaian.create')}}');">Tambah Data</a>
                        </div>
                        <!--end::Action-->
                    </div>
                    <!--end::Block-->
                </div>
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