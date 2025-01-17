
<aside id="sidebar">
    <div class="d-flex justify-content-center">
        <button class="toggle-btn" type="button">
            <img src="{{asset('images/BOOKHIVE_LOGOONLY.png')}}" alt="logo">
        </button>
       
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="{{url('beranda-user')}}" class="sidebar-link">
                <i class='bx bx-home-alt-2 bx-sm' ></i>
                <span class="sidebar-label pb-3">Beranda</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{url ('peminjaman-buku')}}" class="sidebar-link">
                <i class='bx bx-book-reader bx-sm' ></i>
                <span class="sidebar-label pb-3">Pinjam Buku</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{url ('riwayat-peminjaman')}}" class="sidebar-link">
                <i class='bx bx-receipt bx-sm'></i>
                <span class="sidebar-label pb-3">Riwayat Peminjaman</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{url ('donasi-buku')}}" class="sidebar-link">
                <i class='bx bx-donate-heart bx-sm' ></i>
                <span class="sidebar-label pb-3">Donasi Buku</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{url ('pengusulan-buku')}}" class="sidebar-link">
                <i class='bx bx-message-alt-add bx-sm'></i>
                <span class="sidebar-label pb-3">Usulkan Buku</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{url ('reservasi-ruangan')}}" class="sidebar-link">
                <i class='bx bx-buildings bx-sm'></i>
                <span class="sidebar-label pb-3">Reservasi Ruangan</span>
            </a>
        </li>   
       
    </ul>
    <div class="sidebar-footer">
        <a href="#" class="sidebar-link py-3" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <i class='bx bx-log-out bx-sm'></i>
            <span>Logout</span>
        </a>
    </div>

    {{-- ===== KONFIRMASI LOGOUT ===== --}}
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin logout?
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" onclick="handleLogout()">Logout</button>
                </div>
            </div>
        </div>
    </div>
    

</aside>

<style>
    .modal{
        z-index: 2000;
    }
    .modal-backdrop {
        z-index: 900; 
    }
</style>

<script>
    const openBtn = document.querySelector(".toggle-btn");
    const logo = openBtn.querySelector("img");

    openBtn.addEventListener("click", function () {
        document.querySelector("#sidebar").classList.toggle("expand");

        if(document.querySelector("#sidebar").classList.contains("expand")) {
            logo.src = "{{asset('images/BOOKHIVE_HORIZONTAL.png')}}";
            logo.style = "height: 2.5rem; width: auto; ";
        }else{
            logo.src = "{{asset('images/BOOKHIVE_LOGOONLY.png')}}";
        }
     
    });

    // ===== BALIK KE LANDING PAGE =====
    // document.getElementById('confirmLogout').addEventListener('click', function() {
    //     window.location.href = "{{ url('landing-page') }}"; 
    // });

    //FUNCTION UNTUK HANDLE LOGOUT
    function handleLogout() {
        const token = localStorage.getItem("token");

        fetch("{{ url('/api/logout') }}", {
            method: "POST",
            headers: {
                "Authorization": `Bearer ${token}`,
                "Accept": "application/json",
            },
        })
            .then(() => {
                localStorage.removeItem("token");
                alert("Logout berhasil!");
                window.location.href = "{{ url('landing-page') }}";
            })
            .catch(error => console.error("Error:", error));
    }


</script>