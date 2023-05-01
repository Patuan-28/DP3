<div class="card rounded-0 bgi-no-repeat bgi-position-x-end bgi-size-cover" style="background-color: #663259;background-size: auto 100%; background-image: url({{asset('keenthemes/media/misc/taieri.svg')}})">
    <!--begin::body-->
    <div class="card-body container pt-10 pb-8">
        <!--begin::Title-->
        <ol class="breadcrumb text-muted fs-6 fw-bold">
            <li class="breadcrumb-item pe-3 text-white">Data Mahasiswa</li>
            <li class="breadcrumb-item px-3 text-white">
                @if ($siswa->id)
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
                        <!--begin::Label-->
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="nim" class="required form-label">NIM</label>
                                <input type="text" name="nim" id="nim" class="form-control form-control-solid" placeholder="NIM" value="{{$siswa->nim}}" />
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="name" class="required form-label">Nama</label>
                                <input type="text" name="name" id="nama" class="form-control form-control-solid" placeholder="Nama" value="{{$siswa->name}}" />
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="phone" class="required form-label">No HP</label>
                                <input type="text" name="phone" id="phone" class="form-control form-control-solid" placeholder="No HP" value="{{$siswa->phone}}"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="email" class="required form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control form-control-solid" placeholder="Email" value="{{$siswa->email}}"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="date_birth" class="required form-label">Tanggal Lahir</label>
                                <input type="text" id="date_birth" name="date_birth" class="form-control form-control-solid" placeholder="Tanggal Lahir" value="{{$siswa->date_birth}}"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="place_birth" class="required form-label">Tempat Lahir</label>
                                <input type="text" name="place_birth" class="form-control form-control-solid" placeholder="Tempat Lahir" value="{{$siswa->place_birth}}"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="religion" class="required form-label">Agama</label>
                                <select class="form-select" name="religion">
                                    <option SELECTED DISABLED>Pilih Agama</option>
                                    <option value="islam" {{$siswa->religion == "islam" ? 'selected' : ''}}>Islam</option>
                                    <option value="katolik" {{$siswa->religion == "katolik" ? 'selected' : ''}}>Katolik</option>
                                    <option value="protestan" {{$siswa->religion == "protestan" ? 'selected' : ''}}>Protestan</option>
                                    <option value="buddha" {{$siswa->religion == "buddha" ? 'selected' : ''}}>Buddha</option>
                                    <option value="hindu" {{$siswa->religion == "hindu" ? 'selected' : ''}}>Hindu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="address" class="required form-label">Alamat</label>
                                <textarea class="form-control" name="address">{{$siswa->address}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="email" class="required form-label">Jenis Kelamin</label>
                                <select name="gender" class="form-select">
                                    <option SELECTED DISABLED>Pilih Jenis Kelamin</option>
                                    <option value="l" {{$siswa->gender == "l" ? 'selected' : ''}}>Laki-Laki</option>
                                    <option value="p" {{$siswa->gender == "p" ? 'selected' : ''}}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="password" class="required form-label">Password</label>
                                <input type="password" name="password" class="form-control form-control-solid" placeholder="Password"/>
                            </div>
                        </div>
                        <div class="min-w-150px text-end">
                            @if ($siswa->id)
                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.siswa.update',$siswa->id)}}','PATCH','Simpan');" class="btn btn-primary">Simpan</button>
                            @else
                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.siswa.store')}}','POST','Simpan');" class="btn btn-primary">Simpan</button>
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
    number_only('nim');
    text_only('nama');
    number_only('phone');
    format_email('email');
</script>