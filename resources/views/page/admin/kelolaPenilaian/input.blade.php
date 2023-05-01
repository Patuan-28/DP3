<div class="card rounded-0 bgi-no-repeat bgi-position-x-end bgi-size-cover" style="background-color: #663259;background-size: auto 100%; background-image: url({{asset('keenthemes/media/misc/taieri.svg')}})">
    <!--begin::body-->
    <div class="card-body container pt-10 pb-8">
        <!--begin::Title-->
        <ol class="breadcrumb text-muted fs-6 fw-bold">
            <li class="breadcrumb-item pe-3 text-white">Data Staff</li>
            <li class="breadcrumb-item px-3 text-white">
                @if ($kelolaPenilaian->id)
                    Update Data
                @else
                    Tambah Data
                @endif
            </li>
            <li class="breadcrumb-item pe-3 "><a href="javascript:;" onclick="load_list(1);" class="pe-3 text-white">Kembali</a></li>
        </ol>
        <!--end::Title-->
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
                <form id="form_input">
                    <div class="row mb-7">
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="nama" class="required form-label">Deskripsi Penilaian</label>
                                <input type="text" name="nama" class="form-control form-control-solid" placeholder="Deskripsi Penilaian" value="{{$kelolaPenilaian->nama}}"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="kategori" class="required form-label">Kategori Penilaian</label>
                                <select class="form-select" name="kategori">
                                    <option value="Kompentensi Pedagogik" {{$kelolaPenilaian->kategori == "Kompentensi Pedagogik" ? 'selected' : ''}}>Kompentensi Pedagogik</option>
                                    <option value="Kompetensi Profesional" {{$kelolaPenilaian->kategori == "Kompentensi Profesional" ? 'selected' : ''}}>Kompetensi Profesional</option>
                                    <option value="Etika Moral dan Kepribadian" {{$kelolaPenilaian->kategori == "Etika Moral dan Kepribadian" ? 'selected' : ''}}>Etika Moral dan Kepribadian</option>
                                    <option value="Budaya Institusi dan Sosial Kemasyarakatan" {{$kelolaPenilaian->kategori == "Budaya Institusi dan Sosial Kemasyarakatan" ? 'selected' : ''}}>Budaya Institusi dan Sosial Kemasyarakatan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="nama" class="required form-label">Skor Penilaian</label>
                                <input type="text" name="skor" class="form-control form-control-solid" placeholder="Skor Penilaian" value="{{$kelolaPenilaian->skor}}"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="nama" class="required form-label">Rubik Penilaian</label>
                                <input type="text" name="rubik" class="form-control form-control-solid" placeholder="Rubik Penilaian" value="{{$kelolaPenilaian->rubik}}"/>
                            </div>
                        </div>
                        <div class="min-w-150px text-end">
                            @if ($kelolaPenilaian->id)
                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.kelolaPenilaian.update',$kelolaPenilaian->id)}}','PATCH','Simpan');" class="btn btn-primary">Simpan</button>
                            @else
                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.kelolaPenilaian.store')}}','POST','Simpan');" class="btn btn-primary">Simpan</button>
                            @endif
                        </div>
                        <!--end::Col-->
                    </div>
                </form>
                <!--end::Row-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<script type="text/javascript">
    obj_datepicker('#date_birth');
    number_only('nidn');
    text_only('nama');
    number_only('phone');
    format_email('email');
</script>