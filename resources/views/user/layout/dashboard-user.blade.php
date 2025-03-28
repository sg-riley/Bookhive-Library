@extends('user.index-user')

@section('title', 'Dashboard')

@section('body')
    @include('user.components.sidebar-user')
    
    <div class="main w-100">

        @include('user.components.navbar')

        @if (Request::is('dashboard-user'))
        <div class="container d-flex justify-content-center align-items-center"  style="height: 94vh;">
            <div class="card" data-aos="fade-up" data-aos-duration="1500" style="border-color: rgba(52,50,215,1);">
                <div class="card-header"
                    style=" background: rgb(52,50,215);
                    background: linear-gradient(147deg, rgba(52,50,215,1) 0%, rgba(143,174,255,1) 60%, rgba(68,117,242,1) 100%);"
                    >
                    <h4 class="card-title text-light pt-3 pb-1">SELAMAT DATANG</h4>
                </div>
                <div class="card-body mt-4 mb-1 d-flex">
                    <i class='bx bxs-user-circle bx-lg me-2' style="color: rgb(67, 116, 241);"></i>
                    <h2 class="card-title mx-2 align-self-center" style="font-weight: 600;" id="namaLengkap"></h2>
                </div>
                <div class="card-body mt-2 pb-0">
                    <p>Silahkan klik pada sidebar untuk mengakses halaman.</p>
                </div>
            </div>
        </div>
        @endif

        @yield('content')
        @include('admin.components.footer')
    </div>

    <script>

        //LOAD DATA DARI API KE FRONTEND
        document.addEventListener('DOMContentLoaded', () => {
            const userData = JSON.parse(localStorage.getItem('user'));
            //console.log(userData);

            document.getElementById('namaLengkap').innerText = userData.nama_lengkap;
            

        });
    </script>
@endsection