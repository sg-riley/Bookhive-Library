@php
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    $tanggal_sekarang = strftime("%A, %d %B %Y");
@endphp

<nav id="navbar" class="navbar navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="#">Navigasi</a>
        <div class="right d-flex">
            <div class="date-container mx-2 px-3" id="date-container">
                <p class="m-2" id="date">{{ $tanggal_sekarang }}</p>
                <i class='bx bx-calendar' style="font-size: 1.8rem; font-weight: 100;"></i>
            </div>
            <div class="profile-container" style="margin-right: 5.8rem;">
                <p class="m-2" id="profile"></p>
                <a class="navbar-brand m-1" href="{{url('profil-admin')}}">
                    <i class='bx bxs-user-circle align-middle' style="font-size: 2.1rem;"></i>
                </a>
            </div>
        </div>
    </div>
</nav>

<style>
    #navbar {
        background-color: #4475F2;
        width: 100%;
        position: fixed;
        top: 0;
        z-index: 100;
    }

    .navbar-brand {
        color: white;
    }

    .nav-link {
        color: white;
    }

    .profile-container {
        max-height: 2.5rem;
        display: flex;
        justify-content: end;
        align-items: center;
        background: #2C3761;
        border-radius: 3rem;
        padding: 0 5px;
        color: white;
    }

    .date-container {
        max-height: 2.5rem;
        display: flex;
        justify-content: end;
        align-items: center;
        background: #fff;
        border-radius: 3rem;
        padding: 0 5px;
        color: #2C3761;
    }
</style>

<script>
    function toggleElements() {
        const width = window.innerWidth;
        const dateContainer = document.getElementById('date-container');
        const profileContainer = document.querySelector('.profile-container');
        const navbarBrand = document.querySelector('.navbar-brand');

        if (width < 768) {
            dateContainer.style.display = 'none';
            navbarBrand.style.display = 'none';
        } else {
            dateContainer.style.display = 'flex';
            navbarBrand.style.display = 'block';
        }
    }

    window.addEventListener('resize', toggleElements);
    window.addEventListener('load', toggleElements);

    //LOAD DATA DARI API KE FRONTEND
    document.addEventListener('DOMContentLoaded', () => {
        const userData = JSON.parse(localStorage.getItem('user'));
        //console.log(userData);

        document.getElementById('profile').innerText = userData.nama_lengkap;
    });
</script>
