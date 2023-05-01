<x-guest-layout title="Welcome to {{config('app.name')}}">
    <div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-20">
        <!--begin::Logo-->
        <a href="javascript:;" class="mb-10 pt-lg-20">
            <img alt="Logo" src="{{asset('img/logo.png')}}" class="h-50px mb-5" />
        </a>
        <!--end::Logo-->
        <!--begin::Wrapper-->
        <div class="pt-lg-10">
            <!--begin::Logo-->
            <h1 class="fw-bolder fs-2qx text-dark mb-7">{{config('app.name')}}</h1>
            <!--end::Logo-->
            <!--begin::Message-->
            <div class="fw-bold fs-3 text-gray-400 mb-15">
                <p>Selamat Datang di Sistem Penilaian</p>
            </div>
            <!--end::Message-->
            <!--begin::Action-->
            <div class="text-center">
                <a href="staff/auth" class="btn btn-lg btn-primary fw-bolder">Log in Staf</a>
                <a href="siswa/auth" class="btn btn-lg btn-primary fw-bolder">Log in Mahasiswa</a>
            </div>
            <!--end::Action-->
        </div>
        <!--end::Wrapper-->
    </div>
</x-guest-layout>