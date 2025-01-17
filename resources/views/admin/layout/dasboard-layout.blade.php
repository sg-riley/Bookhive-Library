@extends('admin.index-admin')

@section('title', 'Dashboard')

@section('body')
    @include('admin.components.sidebar-admin')
    
    <div class="main w-100">
        
        @include('admin.components.navbar')
        
        @if (Request::is('admin-page'))
        <div class="container d-flex justify-content-center align-items-center"  style="height: 94vh;">
            <div class="card" data-aos="fade-up" data-aos-duration="1500" style="border-color: rgba(52,50,215,1);">
                <div class="card-header"
                    style=" background: rgb(52,50,215);
                    background: linear-gradient(147deg, rgba(52,50,215,1) 0%, rgba(143,174,255,1) 60%, rgba(68,117,242,1) 100%);"
                    >
                    <h4 class="card-title text-light pt-3 pb-1">SELAMAT DATANG</h4>
                </div>
                <div class="card-body mt-4 mb-1 d-flex">
                    <i class='bx bxs-user-badge bx-lg me-2' style="color: rgb(67, 116, 241);"></i>
                    <h2 class="card-title mx-2 align-self-center" style="font-weight: 600;" id="admin-name"></h2>
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
        document.addEventListener('DOMContentLoaded', () => {
            const user = JSON.parse(localStorage.getItem('user'));
            //console.log(user);
    
            if (!user || user.role !== 'admin') {
                alert("Anda tidak memiliki akses ke halaman ini!");
                window.location.href = "{{ url('landing-page') }}";
            }
    
            document.getElementById('admin-name').innerText = user.nama_lengkap;
        });
    </script>
    
@endsection