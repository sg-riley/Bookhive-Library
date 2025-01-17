@extends('user.layout.dashboard-user')

@section('title', 'Beranda')

@php
    $buku = [
        ['nama' => 'Bukan Cinta Monyet', 'penulis'=> 'Purnama Teduh, 2018', 'rating'=> '4,6/5'],
    ];
@endphp

@section('content')

<style>
    .container {
        display: flex;
        justify-content: flex-start;
        margin: 20px 10px 20px 20px;
    }

    .welcome-card {
        background: linear-gradient(to right, #4475f2, #04396e);
        color: white;
        width: 30rem;
        height: 20rem;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        margin: 20px;
        padding: 1rem;
    }

    .card {
        border-radius: 10px;
        flex-grow: 1;
        background: linear-gradient(to left, #026bd4, #04396e);
        margin-left: 20px;
        margin-top: 20px;
        margin-bottom: 20px;
        margin-right: -70px;;
    }

    .book-section {
        margin: 5px;
    }

    .book-title {
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: white;
        font-size: 20px;
        font-weight: bold;
        padding: 10px 0;
        text-align: center;
    }

    .book-container {
        display: flex; 
        overflow-x: auto;
        padding: 10px;
        gap: 20px;
        margin-top: 10px;
    }

    .book-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        width: 150px;
        text-align: center;
        flex: none;
        padding: 10px;
    }

    .book-card img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

    h1, h5 {
        font-family: 'Plus Jakarta Sans', sans-serif;
        margin-left: 50px;
        margin-bottom: 10px;
    }

    h1 {
        font-size: 22px;
    }

    .row-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 30px 40px 10px 20px;
    }

    .view-all {
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #026bd4;
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
        margin-right: 30px;
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column; 
            align-items: center; 
        }

        .welcome-card, .card {
            width: 100%;
            margin: 10px 0; 
        }

        .book-container {
            flex-wrap: wrap;
            justify-content: center;
        }

        .book-card {
            margin: 10px;
            width: 120px;
        }
    }
</style>

{{-- ===== INI UNTUK DORONG KONTEN KE BAWAH ===== --}}
<div class="h-5 m-4">
    <p class="text-light">.</p>
</div>

{{-- ===== INI ANIMASI HEADER ===== --}}
<div class="header-pages mt-3 mb-5"
    style="background: rgb(83,146,251);
        background: linear-gradient(90deg, rgb(83,146,251) 0%, rgb(199, 220, 255) 100%);">
        <span class="triangle" style="background: rgb(168, 200, 255);"></span>
        <h1 class="m-0 text-light">Dashboard User</h1>
    </div>

<div class="container">
    <div class="welcome-card">
        <div class="card-body">
            <h2 class="card-title mb-4">Selamat Datang</h5>
            <h4 id="fullname" class="card-title mb-2"></h5>
            <p class="card-text mb-4">Ayo, mulai petualangan membaca Anda hari ini! 
                Perpustakaan ini adalah tempat di mana setiap halaman membawa Anda 
                lebih dekat ke impian dan pengetahuan baru.</p>
        </div>
    </div>

    <div class="card">
        <div class="book-section">
            <h2 class="book-title">Buku Terbaru</h2>
            <div class="book-container">
                
            </div>
        </div>
    </div>
</div>

<div class="row card-container justify-content-center" style="margin-left: 20px; margin-right: 20px;">
    <div class="col-sm">
        <div class="card p-0 mx-3 mb-4" style="background: linear-gradient(146deg, rgb(245, 188, 55) 21%, rgb(255, 220, 137) 100%); color: white;">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class='bx bx-book bx-lg p-3'></i>
                    <div class="text-start mt-2">
                        <span class="m-0">Total Buku</span>
                        <h4 id="total-buku"><strong></strong></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm">
        <div class="card p-0 mx-3 mb-4" style="background: rgb(0,206,45);
                background: linear-gradient(146deg, rgba(0,206,45,1) 21%, rgb(58, 255, 101) 100%); color: white;">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class='bx bx-book-bookmark bx-lg p-3' ></i>
                    <div class="text-start mt-2">
                        <span class="m-0">Buku Dipinjam</span>
                        <h4 id="buku-dipinjam"><strong></strong></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm">
        <div class="card p-0 mx-3 mb-4" style="background: rgb(83,146,251);
                background: linear-gradient(146deg, rgba(83,146,251,1) 21%, rgba(137,182,255,1) 100%); color: white;">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-book-add bx-lg p-3'></i>
                    <div class="text-start mt-2">
                        <span class="m-0">Buku Didonasikan</span>
                        <h4 id="buku-didonasikan"><strong></strong></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm">
        <div class="card p-0 mx-3 mb-4" style="background: rgb(58,81,170);
                background: linear-gradient(146deg, rgba(58,81,170,1) 21%, rgba(73,102,216,1) 100%); color: white;">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-buildings bx-lg p-3'></i>
                    <div class="text-start mt-2">
                        <span class="m-0">Ruangan Dipinjam</span>
                        <h4 id="ruangan-dipinjam"><strong></strong></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row-header">
    <h1>Katalog Perpustakaan</h1>
</div>


<div class="row-header">
    <h5>Terpopuler di bulan ini</h5>
    <a href="#" class="view-all">Lihat Semua</a>
</div>

<div class="book-container" style="margin-left: 50px;">
    @for ($i=0; $i < 6; $i++)
    <div class="col">
        <div class="book-card">
            <img src="images/Bukan-Cinta-Monyet.jpg" alt="Buku: Bukan Cinta Monyet">
            <p style="font-size: 12px; margin-bottom:2px;">Bukan Cinta Monyet</p>
            <p style="font-size: 12px; margin-bottom:2px;">Purnama Teduh, 2018</p>
            <p style="font-size: 12px; margin-bottom:2px;">4.7/5</p>
        </div>
    </div>
    @endfor
</div>

<div class="row-header">
    <h5>Buku Akademik</h5>
    <a href="#" class="view-all">Lihat Semua</a>
</div>

<div class="book-container" style="margin-left: 50px;">
    @for ($i=0; $i < 6; $i++)
    <div class="col">
        <div class="book-card">
            <img src="images/Bukan-Cinta-Monyet.jpg" alt="Buku: Bukan Cinta Monyet">
            <p style="font-size: 12px; margin-bottom:2px;">Bukan Cinta Monyet</p>
            <p style="font-size: 12px; margin-bottom:2px;">Purnama Teduh, 2018</p>
            <p style="font-size: 12px; margin-bottom:2px;">4.7/5</p>
        </div>
    </div>
    @endfor
</div>

<div class="row-header">
    <h5>Novel</h5>
    <a href="#" class="view-all">Lihat Semua</a>
</div>

<div class="book-container" style="margin-left: 50px;">
    @for ($i=0; $i < 6; $i++)
    <div class="col">
        <div class="book-card">
            <img src="images/Bukan-Cinta-Monyet.jpg" alt="Buku: Bukan Cinta Monyet">
            <p style="font-size: 12px; margin-bottom:2px;">Bukan Cinta Monyet</p>
            <p style="font-size: 12px; margin-bottom:2px;">Purnama Teduh, 2018</p>
            <p style="font-size: 12px; margin-bottom:2px;">4.7/5</p>
        </div>
    </div>
    @endfor
</div>

<div class="row-header">
    <h5>Publikasi Ilmiah</h5>
    <a href="#" class="view-all">Lihat Semua</a>
</div>

<div class="book-container" style="margin-left: 50px;"> 
    @for ($i=0; $i < 6; $i++)
    <div class="col">
        <div class="book-card">
            <img src="images/Bukan-Cinta-Monyet.jpg" alt="Buku: Bukan Cinta Monyet">
            <p style="font-size: 12px; margin-bottom:2px;">Bukan Cinta Monyet</p>
            <p style="font-size: 12px; margin-bottom:2px;">Purnama Teduh, 2018</p>
            <p style="font-size: 12px; margin-bottom:2px;">4.7/5</p>
        </div>
    </div>
    @endfor
</div>

<div class="row-header">
    <h5>Pengembangan Diri</h5>
    <a href="#" class="view-all">Lihat Semua</a>
</div>

<div class="book-container" style="margin-left: 50px;"> 
    @for ($i=0; $i < 6; $i++)
    <div class="col">
        <div class="book-card">
            <img src="images/Bukan-Cinta-Monyet.jpg" alt="Buku: Bukan Cinta Monyet">
            <p style="font-size: 12px; margin-bottom:2px;">Bukan Cinta Monyet</p>
            <p style="font-size: 12px; margin-bottom:2px;">Purnama Teduh, 2018</p>
            <p style="font-size: 12px; margin-bottom:2px;">4.7/5</p>
        </div>
    </div>
    @endfor
</div>

{{-- ===== Jarak Untuk Footer ===== --}}
<div class="h-4" style="margin-bottom: 5rem;">
    <p class="text-light">.</p>
</div>

<script>

    //fetch user
    fetch('/api/getUser', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}`,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        //console.log(data);
        const nama = data.nama_lengkap;
        console.log(nama);
        document.getElementById('fullname').innerText = nama;

    })
    .catch(error => {
        console.error('Error:', error);
    });

    //fetch buku
    fetch('/api/bahan-pustaka', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}`,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        //console.log(data);
        const allData = data.data;
        const jumlah = allData.length;
        document.getElementById('total-buku').innerText = jumlah;
        const sortedData = allData.sort((a, b) => b.id - a.id);
        const bukuTerbaru = sortedData.slice(0, 6);
        tampilkanBukuTerbaru(bukuTerbaru);
        

    })
    .catch(error => {
        console.error('Error:', error);
    });

    function tampilkanBukuTerbaru(bukuTerbaru) {
        const bookContainer = document.querySelector('.book-container');

        bookContainer.innerHTML = '';

        bukuTerbaru.forEach(buku => {
            const bookCard = document.createElement('div');
            bookCard.classList.add('book-card');

            const bookImage = document.createElement('img');
            bookImage.src = `/storage/${buku.gambar_sampul}`; 
            bookImage.alt = `Sampul Buku: ${buku.judul}`;

            bookCard.appendChild(bookImage);
            bookContainer.appendChild(bookCard);
        });
    }

    // function tampilkanBukuTerbaru(bukuTerbaru) {
    //     const bookContainer = document.querySelector('.book-container');

    //     bukuTerbaru.forEach(buku => {
    //         const bookCard = document.createElement('div');
    //         bookCard.classList.add('book-card');

    //         const bookImage = document.createElement('img');
    //         bookImage.src = `/storage/${buku.gambar_sampul}`;
    //         bookImage.alt = `Buku: ${buku.judul}`;

    //         const bookTitle = document.createElement('p');
    //         bookTitle.textContent = buku.judul; 

    //         bookCard.appendChild(bookImage);
    //         bookCard.appendChild(bookTitle);

    //         bookContainer.appendChild(bookCard); 
    //     });
    // }

    //fetch donasi
    fetch('/api/donasi', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}`,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        //console.log(data);
        const user = JSON.parse(localStorage.getItem('user'));
        const filteredData = data.data.filter(donasi => donasi.nama_pengguna === user.nama_lengkap);
        
        console.log(filteredData);
        const jumlah = filteredData.length;
        document.getElementById('buku-didonasikan').innerText = jumlah;
        

    })
    .catch(error => {
        console.error('Error:', error);
    });


    //fetch peminjaman
    fetch('/api/peminjaman', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}`,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        const user = JSON.parse(localStorage.getItem('user'));
        const fData = data.data.filter(peminjaman => peminjaman.id_pengguna === user.id_pengguna);
        const jumlah = fData.length;
        document.getElementById('buku-dipinjam').innerText = jumlah;
        
        const peminjamanData = data.data;

        const currentMonth = new Date().getMonth() + 1; 
        const currentYear = new Date().getFullYear();  

        const filteredData = peminjamanData.filter(peminjaman => {
            const peminjamanDate = new Date(peminjaman.tanggal_peminjaman);
            return peminjamanDate.getMonth() + 1 === currentMonth && peminjamanDate.getFullYear() === currentYear;
        });

        const countByBuku = {};

        filteredData.forEach(item => {
            const idBuku = item.id_bahan_pustaka;
            if (!countByBuku[idBuku]) {
                countByBuku[idBuku] = { 
                    judul: item.bahan_pustaka.judul, 
                    jumlah: 0 
                };
            }
            countByBuku[idBuku].jumlah += 1;
        });

    
        const sortedBuku = Object.values(countByBuku)
            .sort((a, b) => b.jumlah - a.jumlah)
            .slice(0, 6);

       
        const listBukuTeratas = document.getElementById('buku-teratas');
        listBukuTeratas.innerHTML = ''; 

        sortedBuku.forEach(buku => {
            const listItem = document.createElement('li');
            listItem.textContent = `${buku.judul} - ${buku.jumlah} kali dipinjam`;
            listBukuTeratas.appendChild(listItem);
        });
    })
    .catch(error => {
        console.error('Error:', error);
    });


    //fetch riwayat reservasi
    fetch('/api/reservasi', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}`,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        //console.log(data);
        const user = JSON.parse(localStorage.getItem('user'));
        const filteredData = data.data.filter(reservasi => reservasi.id_pengguna === user.id_pengguna);
        
        console.log(filteredData);
        const jumlah = filteredData.length;
        document.getElementById('ruangan-dipinjam').innerText = jumlah;
        

    })
    .catch(error => {
        console.error('Error:', error);
    });




</script>

@endsection