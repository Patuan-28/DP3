<div id="content_list">
    <div class="card rounded-0 bgi-no-repeat bgi-position-x-end bgi-size-cover" style="background-color: #663259;background-size: auto 100%; background-image: url({{asset('keenthemes/media/misc/taieri.svg')}})">
        <!--begin::body-->
        <div class="card-body container pt-10 pb-8">
            <!--begin::Title-->
            <div class="d-flex align-items-center">
                <h1 class="fw-bold me-3 text-white">Data Assign Penilai Detail</h1>
                <span class="fw-bold text-white opacity-50"></span>
            </div>
            <!--end::Title-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-column">
                <!--begin::Block-->
                <div class="d-lg-flex align-lg-items-center">
                    <!--begin::Simple form-->
                    <form id="content_filter">
                        <div class="rounded d-flex flex-column flex-lg-row align-items-lg-center bg-white p-5 w-xxl-850px h-lg-60px me-lg-10 my-5">
                            <!--begin::Row-->
                            <div class="row flex-grow-1 mb-5 mb-lg-0">
                                <!--begin::Col-->
                                <div class="col-lg-12 d-flex align-items-center mb-3 mb-lg-0">
                                    <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-gray-400 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-flush flex-grow-1" onkeyup="load_list(1);" name="keywords" placeholder="Pencarian..." />
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
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
                        {{-- <a class="fw-bold link-white fs-5" href="javascript:;" onclick="#">Tambah Data</a> --}}
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
                                <!--begin::Entry-->
                                <div class="d-flex flex-column-fluid mt-15">
                                    <!--begin::Container-->
                                    <div class="container">
                                        <!--begin::Card-->
                                        <div class="card card-custom gutter-b">
                                            <div class="card-header flex-wrap py-3">
                                                <div class="card-title">
                                                    <h1 class="card-label">
                                                        {{-- <span class="d-block text-muted pt-2 font-size-sm"><button class="btn btn-info" onclick="load_input('{{route('assignPenilai.create')}}')">+ Tambah Data</button></span></h1> --}}
                                                    </div>
                                                <div class="card-title">
                                                    <input type="text" name="" id="" class="form-control" placeholder="Cari.....">
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <!--begin: Datatable-->
                                                <table class="table table-bordered table-checkable" id="kt_datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>Role</th>
                                                            <th>Aksi</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($users as $user)
                                                        <tr>
                                                            <td>{{$user->name}}</td>
                                                            <td>{{$user->email}}</td>
                                                            <td>{{{$user->role == 's' ? 'a' : 'm'}}}</td>
                                                            <td>
                                                                <button onclick="load_input('{{route('admin.assignPenilai.show', $user->id)}}');" class="btn btn-primary btn-lg">Pilih</button>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
                                                                    <span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect></g></svg>
                                                                </a>
                                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete" onclick="handle_delete('{{route('admin.assignPenilai.destroy', $user->id)}}');">
                                                                    </span><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path><path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path></g></svg></span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <!--end: Datatable-->
                                            </div>
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Container-->
                                </div>
                                <!--end::Entry-->
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
