@extends('admin.layout.dasboard-layout')
@section('title', 'Admin | Home')

@php
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    $tanggal_sekarang = strftime("%A, %d %B %Y");

    $dummyData = [
            ['nama' => 'Yoga Nugroho', 'judul' => 'Belajar PHP', 'tanggal_pinjam' => '10 Oktober 2024'],
            ['nama' => 'Budi Pekerti', 'judul' => 'Tutorial Hacking', 'tanggal_pinjam' => '10 Oktober 2024'],
            ['nama' => 'Doni Silvester', 'judul' => 'The world Could End With Us', 'tanggal_pinjam' => '10 Oktober 2024'],
        ];

    $i = 0; 
@endphp



@section('content')

    <div class="h-5 m-4">
      <p class="text-light">.</p>
    </div>
    
    <div class="header-pages mt-3 mb-5"
    style="background: rgb(83,146,251);
        background: linear-gradient(90deg, rgb(83,146,251) 0%, rgb(199, 220, 255) 100%);">
        <span class="triangle" style="background: rgb(168, 200, 255);"></span>
        <h1 class="m-0 text-light">Dashboard Admin</h1>
    </div>

    <div class="row justify-content-between m-4">
        <div class="col">
            <div class="card shadow-sm d-flex flex-row rounded-3 border-0 mb-4"
                style="width: inherit; 
                background: linear-gradient(146deg, rgb(245, 188, 55) 21%, rgb(255, 220, 137) 100%);">
                <i class='bx bxs-buildings p-3 my-3 text-light' style="font-size: 5rem; text-align: center" ></i>
                <div class="card-body ps-0 my-3">
                  <p class="card-text pb-0 h2 text-light" style="font-size: 1.2rem">Jumlah Ruangan</p>
                  <p id="jumlah-ruangan" class="card-text text-light fw-semibold" style="font-size: 2rem"></p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow-sm d-flex flex-row rounded-3 border-0 mb-4" 
                style="width: inherit; 
                background: rgb(0,206,45);
                background: linear-gradient(146deg, rgba(0,206,45,1) 21%, rgb(58, 255, 101) 100%);">
                <i class='bx bxs-book-bookmark p-3 my-3 text-light' style="font-size: 5rem; text-align: center" ></i>
                <div class="card-body ps-0 my-3">
                  <p class="card-text pb-0 h2 text-light" style="font-size: 1.2rem">Jumlah Koleksi</p>
                  <p id="jumlah-koleksi" class="card-text text-light fw-semibold" style="font-size: 2rem"></p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow-sm d-flex flex-row rounded-3 border-0 mb-4" 
                style="width: inherit; 
                background: rgb(83,146,251);
                background: linear-gradient(146deg, rgba(83,146,251,1) 21%, rgba(137,182,255,1) 100%);">
                <i class='bx bxs-category-alt p-3 my-3 text-light' style="font-size: 5rem; text-align: center" ></i>
                <div class="card-body ps-0 my-3">
                  <p class="card-text pb-0 h2 text-light" style="font-size: 1.2rem">Jumlah Kategori</p>
                  <p id="jumlah-kategori" class="card-text text-light fw-semibold" style="font-size: 2rem"></p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow-sm d-flex flex-row rounded-3 border-0 mb-4" 
                style="width: inherit; 
                background: rgb(58,81,170);
                background: linear-gradient(146deg, rgba(58,81,170,1) 21%, rgba(73,102,216,1) 100%);">
                <i class='bx bxs-user-badge p-3 my-3 text-light' style="font-size: 5rem; text-align: center" ></i>
                <div class="card-body ps-0 my-3">
                  <p class="card-text pb-0 h2 text-light" style="font-size: 1.2rem">Jumlah Anggota</p>
                  <p id="jumlah-anggota" class="card-text text-light fw-semibold" style="font-size: 2rem"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-between m-4">
        <div class="col">
            
            <div class="card">
                <div class="card-header">
                  <h4>Laporan Hari Ini</h4>
                  
                  <p class="mt-2 mb-0">{{$tanggal_sekarang}}</p>
                </div>
                <div class="row justify-content-between">
                    <div class="col my-2">
                        <div class="card-body text-center">
                            <p class="card-title fw-bold text-primary">Admin Perpustakaan</p>
                            <p id="jumlah-admin" class="card-text fw-semibold fs-4"></p>
                        </div>
                    </div>
                    <div class="col my-2">
                        <div class="card-body text-center">
                            <p class="card-title fw-bold text-success">Peminjaman Buku</p>
                            <p class="card-text fw-semibold fs-4">12</p>
                        </div>
                    </div>
                    <div class="col my-2">
                        <div class="card-body text-center">
                            <p class="card-title fw-bold text-success">Pengembalian Buku</p>
                            <p class="card-text fw-semibold fs-4">9</p>
                        </div>
                    </div>
                    <div class="col my-2">
                        <div class="card-body text-center">
                            <p class="card-title fw-bold text-danger">Peminjaman Jatuh Tempo</p>
                            <p class="card-text fw-semibold fs-4">3</p>
                        </div>
                    </div>
              </div>
              </div>
        </div>
    </div>

    <div class="row justify-content-between m-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Jatuh Tempo Hari Ini</h4>
                </div>
                <div class="table-responsive p-3">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Tanggal Peminjaman</th>
                          </tr>
                        </thead>
                        <tbody class="table-group-divider">
                    
                          @forelse ( $dummyData as $data )
                            @php
                                $i++;
                            @endphp

                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $data['nama'] }}</td>
                                <td>{{$data['judul']}}</td>
                                <td>{{$data['tanggal_pinjam']}}</td>
                            </tr>
                            
                          @empty
                              <tr>
                                <td class="text-center pt-4" colspan="4">Tidak Ada Peminjaman Jatuh Tempo Hari Ini</td>
                              </tr>
                          @endforelse

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-between m-4">
        <h4 class="my-3">Peminjaman Bahan Pustaka Terpopuler</h4>
        
        <div class="col mb-3 mx-2">
            <div class="card position-relative rounded-3 border-0 shadow-sm" style="width: inherit; min-width: 13rem; max-width: 15rem;">
                <img src="{{asset('images/book0.jpg')}}" class="card-img-top rounded-3" alt="...">
                <div class="card-body overlay-text-solid rounded-bottom-3">
                  <h5 class="card-title">The Lord of the Rings: Tolkien</h5>
                  <p class="card-text">40 kali dipinjam </p>
                </div>
              </div>
        </div>
        <div class="col mb-3 mx-2">
            <div class="card position-relative rounded-3 border-0 shadow-sm" style="width: inherit; min-width: 13rem; max-width: 15rem;">
                <img src="{{asset('images/book01.jpg')}}" class="card-img-top rounded-3" alt="...">
                <div class="card-body overlay-text-solid rounded-bottom-3">
                  <h5 class="card-title">The Lord of the Rings: The Two Towers</h5>
                  <p class="card-text">32 kali dipinjam </p>
                </div>
              </div>
        </div>
        <div class="col mb-3 mx-2">
            <div class="card position-relative rounded-3 border-0 shadow-sm" style="width: inherit; min-width: 13rem; max-width: 15rem;">
                <img src="{{asset('images/book0.jpg')}}" class="card-img-top rounded-3" alt="...">
                <div class="card-body overlay-text-solid rounded-bottom-3">
                  <h5 class="card-title">The Lord of the Rings: Tolkien</h5>
                  <p class="card-text">40 kali dipinjam </p>
                </div>
              </div>
        </div>
        <div class="col mb-3 mx-2">
            <div class="card position-relative rounded-3 border-0 shadow-sm" style="width: inherit; min-width: 13rem; max-width: 15rem;">
                <img src="{{asset('images/book01.jpg')}}" class="card-img-top rounded-3" alt="...">
                <div class="card-body overlay-text-solid rounded-bottom-3">
                  <h5 class="card-title">The Lord of the Rings: The Two Towers</h5>
                  <p class="card-text">32 kali dipinjam </p>
                </div>
              </div>
        </div>
        <div class="col mb-3 mx-2">
            <div class="card position-relative rounded-3 border-0 shadow-sm" style="width: inherit; min-width: 13rem; max-width: 15rem;">
                <img src="{{asset('images/book0.jpg')}}" class="card-img-top rounded-3" alt="...">
                <div class="card-body overlay-text-solid rounded-bottom-3">
                  <h5 class="card-title">The Lord of the Rings: Tolkien</h5>
                  <p class="card-text">40 kali dipinjam </p>
                </div>
              </div>
        </div>
  
       
        
    </div>

    <div class="row justify-content-between m-4">
        <h4 class="my-3">Peminjaman Ruangan Terpopuler</h4>
        
        <div class="col mb-3 mx-2">
            <div class="card position-relative rounded-3 border-0 shadow-sm" style="width: inherit; min-width: 13rem; max-width: 15rem;">
                <img src="{{asset('images/discuss_room.jpg')}}" class="card-img-top rounded-3" alt="...">
                <div class="card-body overlay-text rounded-bottom-3">
                  <h5 class="card-title">Leissure Room 1</h5>
                  <p class="card-text">71 kali dipinjam </p>
                </div>
              </div>
        </div>
        <div class="col mb-3 mx-2">
            <div class="card position-relative rounded-3 border-0 shadow-sm" style="width: inherit; min-width: 13rem; max-width: 15rem;">
                <img src="{{asset('images/discuss_room2.jpg')}}" class="card-img-top rounded-3" alt="...">
                <div class="card-body overlay-text rounded-bottom-3">
                  <h5 class="card-title">Leissure Room 2</h5>
                  <p class="card-text">67 kali dipinjam </p>
                </div>
              </div>
        </div>
        <div class="col mb-3 mx-2">
            <div class="card position-relative rounded-3 border-0 shadow-sm" style="width: inherit; min-width: 13rem; max-width: 15rem;">
                <img src="{{asset('images/discuss_room.jpg')}}" class="card-img-top rounded-3" alt="...">
                <div class="card-body overlay-text rounded-bottom-3">
                  <h5 class="card-title">Discussion Room 1</h5>
                  <p class="card-text">53 kali dipinjam </p>
                </div>
              </div>
        </div>
        <div class="col mb-3 mx-2">
            <div class="card position-relative rounded-3 border-0 shadow-sm" style="width: inherit; min-width: 13rem; max-width: 15rem;">
                <img src="{{asset('images/discuss_room2.jpg')}}" class="card-img-top rounded-3" alt="...">
                <div class="card-body overlay-text rounded-bottom-3">
                  <h5 class="card-title">Discussion Room 2</h5>
                  <p class="card-text">49 kali dipinjam </p>
                </div>
              </div>
        </div>
        <div class="col mb-3 mx-2">
            <div class="card position-relative rounded-3 border-0 shadow-sm" style="width: inherit; min-width: 13rem; max-width: 15rem;">
                <img src="{{asset('images/discuss_room.jpg')}}" class="card-img-top rounded-3" alt="...">
                <div class="card-body overlay-text rounded-bottom-3">
                  <h5 class="card-title">Meeting Room 1</h5>
                  <p class="card-text">35 kali dipinjam</p>
                </div>
              </div>
        </div>
       
        
    </div>

    <div class="h-4" style="margin-bottom: 5rem;">
      <p class="text-light">.</p>
  </div>

  <script>
    //fetch bahan pustaka
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
        const jumlah = data.data.length;
        //console.log(jumlah);
        document.getElementById('jumlah-koleksi').innerText = jumlah;
    })
    .catch(error => {
        console.error('Error:', error);
    });

    //fetch kategori
    fetch('/api/kategori', {
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
        const jumlah = data.data.length;
        //console.log(jumlah);
        document.getElementById('jumlah-kategori').innerText = jumlah;
    })
    .catch(error => {
        console.error('Error:', error);
    });

    //fetch user
    fetch('/api/getAllUsers', {
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
        const jumlah = data.users.length;
        console.log(jumlah);
        document.getElementById('jumlah-anggota').innerText = jumlah;

    })
    .catch(error => {
        console.error('Error:', error);
    });

    //fetch admin
    fetch('/api/getAllAdmin', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}`,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
         
        const filteredUsers = data.users.filter(users => users.id_role === 2);
        const jmlAdmin = filteredUsers.length;
        console.log(jmlAdmin);
        document.getElementById('jumlah-admin').textContent = jmlAdmin;
    })
    .catch(error => {
        console.error('Error:', error);
    });

    //fetch ruangan
    fetch('/api/ruangan', {
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
        const jumlah = data.data.length;
        console.log(jumlah);
        document.getElementById('jumlah-ruangan').innerText = jumlah;
    })
    .catch(error => {
        console.error('Error:', error);
    });

  </script>

  
   
@endsection

<style>
    .card-body.overlay-text {
        position: absolute;
        bottom: 0; 
        left: 0;
        right: 0;
        background: rgb(0, 17, 61);
        background: linear-gradient(0deg, rgb(4, 11, 27) 0%, rgba(0, 15, 35, 0.6) 50%, rgba(0,87,180,0) 100%);
        color: white; 
        padding: 10px;
    }
    .card-body.overlay-text-solid {
        position: absolute;
        bottom: 0; 
        left: 0;
        right: 0;
        background: rgb(0, 17, 61);
        color: white; 
        padding: 10px;
    }

    .table-responsive {
        overflow-x: auto; 
        -webkit-overflow-scrolling: touch; 
    }
</style>
