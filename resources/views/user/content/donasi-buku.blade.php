@extends('user.layout.dashboard-user')

@section('title', 'Donasi Buku')

@php
  $kategori = [
            'Fiksi',
            'Non-Fiksi',
            'Sains',
            'Sejarah',
            'Biografi'
    ];
@endphp

@section('content')


  <style>
    body {
      font-family: 'Plus Jakarta Sans' sans-serif;
    }
    .container {
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      display: flex;
      flex-direction: column;
    }
    .form-group {
      display: flex;
      align-items: flex-start;
      margin-bottom: 10px;
      width: 100%;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      width: 100%;
    }
    .form-group input[type="text"],
    .form-group input[type="number"],
    .form-group textarea,
    .form-group select {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ddd;
      border-radius: 3px;
      box-sizing: border-box;
    }
    .image-card {
      width: 60%;
      height: 40vh; 
      min-width: 10rem;
      min-height: 15rem;
      max-width: 20rem; 
      max-height: 25rem;
      
      
      border: 1px solid #ddd;
      border-radius: 5px;
      margin-right: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f9f9f9;
    }
    .image-card img {
      max-width: 100%;
      max-height: 100%;
    }
    button {
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
  </style>

  {{-- ===== INI UNTUK DORONG KONTEN KE BAWAH ===== --}}
  <div class="h-5 m-4">
      <p class="text-light">.</p>
  </div>

  {{-- ===== INI ANIMASI HEADER ===== --}}
  <div class="header-pages mt-3 mb-5" 
  style="background: rgb(237, 188, 72);
      background: linear-gradient(90deg, rgb(255, 199, 68) 0%, rgb(255, 230, 172) 100%);">
      <span class="triangle" style="background: rgb(255, 231, 174);"></span>
      <h1 class="m-0 text-light">Donasi Buku</h1>
  </div>

  
  <div class="card p-4 m-4">
      <div class="row mb-4">    
          <h2>Form Donasi Buku</h2>
      </div>
      <div class="d-flex flex-wrap">
        <form enctype="multipart/form-data" id="form-tambah-buku">
          <div class="col" style="max-width: 20rem;">
            <div class="form-group">
                <div class="">
                  <div class="image-card" id="image-card">
                    <img id="cover-image" src="" alt="Gambar Sampul Buku" style="display: none;">
                    <p id="no-image" style="display: block;">No Image</p>
                  </div>
                  <div class="form-group d-block my-4">
                    <label for="gambar-sampul">Gambar Sampul Buku</label>
                    <input type="file" id="gambar-sampul" onchange="previewImage(event)">
                  </div>
                </div>
            </div>
          </div>
          
          <div class="col">
              <div class="form-group d-block">
                  <label for="judul">Judul Buku</label>
                  <input type="text" id="judul" required>
              </div>

              <div class="col my-2">
                <div class="form-group d-block" style="min-width: 10rem;">
                    <label for="kategori">Kategori</label>
                    <select id="kategori" class="form-control" required>
                        <option value="">Pilih Kategori</option>
                    </select>
                </div>
              </div>

              <div class="form-group d-block">
                  <label for="isbn">ISBN</label>
                  <input type="text" id="isbn" required>
              </div>

              <div class="form-group d-block">
                  <label for="pengarang">Penulis</label>
                  <input type="text" id="penulis" required>
              </div>
            
          </div>
                
          </div>
          
          <div class="row">
            <div class="form-group d-block">
                <label for="penerbit">Penerbit</label>
                <input type="text" id="penerbit" required>
            </div>

            <div class="form-group d-block">
              <label for="tahun-terbit">Tahun Terbit</label>
              <input type="number" id="tahun-terbit" required>
            </div>
        
            <div class="form-group d-block">
              <label for="jumlah">Jumlah</label>
              <input type="number" id="jumlah" value="1" min="1" required>
            </div>
        
            <div class="form-group d-block">
              <label for="deskripsi">Deskripsi</label>
              <textarea id="deskripsi"></textarea>
            </div>
        
            {{-- <label for="status-pengajuan">Status Pengajuan : </label>
            <p id="status-pengajuan" style="color: red;">Tertunda</p> --}}
          </div>

          <button type="submit" id="simpan"> Simpan</button>
      </form>
    </div>


  {{-- ===== Jarak Untuk Footer ===== --}}
  <div class="h-4" style="margin-bottom: 5rem;">
    <p class="text-light">.</p>
  </div>

  {{-- buat loop kategori --}}
    
    <script>
      document.addEventListener('DOMContentLoaded', function () {
    
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
        
          if (data && data.data) {
              const kategoriSelect = document.getElementById('kategori');

            
              data.data.forEach(kategori => {
                  const option = document.createElement('option');
                  option.value = kategori.id_kategori; 
                  option.textContent = kategori.nama_kategori; 
                  kategoriSelect.appendChild(option);
              });
          }
      })
      .catch(error => {
          console.error('Error fetching kategori:', error);
      });
  });
  </script>


  <script>
    document.getElementById('form-tambah-buku').addEventListener('submit', async function(e) {
      e.preventDefault();
      $user = JSON.parse(localStorage.getItem('user'));
      
      const kategori = document.getElementById('kategori').value;
      const judul = document.getElementById('judul').value;
      const isbn = document.getElementById('isbn').value;
      const tahunTerbit = document.getElementById('tahun-terbit').value;
      const penulis = document.getElementById('penulis').value;
      const penerbit = document.getElementById('penerbit').value;
      const jumlah = document.getElementById('jumlah').value;
      const deskripsi = document.getElementById('deskripsi').value;
      const gambarSampul = document.getElementById('gambar-sampul').files[0];
      
      if (!kategori || !judul || !isbn || !tahunTerbit || !penulis || !penerbit || !jumlah || !gambarSampul) {
          alert("Harap lengkapi semua field!");
          return;
      }

      console.log(' Data:', kategori, judul, isbn, tahunTerbit, penulis, penerbit, jumlah, deskripsi, gambarSampul);

      const formData = new FormData();
      formData.append('id_pengguna', $user.id_pengguna);
      
      formData.append('id_kategori', kategori);
      
      formData.append('judul', judul);
      
      formData.append('isbn', isbn);
      formData.append('tahun_terbit', tahunTerbit);
      formData.append('penulis', penulis);
      formData.append('penerbit', penerbit);
      formData.append('deskripsi', deskripsi);
      formData.append('jumlah', jumlah);
      formData.append('status_pengajuan', null ?? ''); 
      formData.append('gambar_sampul', gambarSampul);

        
      try {
        console.log('Form Data:', formData);
        const response = await fetch('/api/donasi', {
          method: 'POST',
          headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}`,
            'Accept': 'application/json',
          },
          body: formData
        });
  
        const result = await response.json();
        console.log(result);
  
        if (response.ok) {
          alert('Donasi buku berhasil disimpan!');
          console.log('Response Data:', result);
          location.reload();
        
        } else {
          alert('Validasi gagal. Periksa input Anda.');
          console.error('Errors:', result.errors);
          location.reload();
        }
      } catch (error) {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat mengirim data.');
        location.reload();
      }
    });
  </script>
  


  <script>
    function previewImage(event) {
      const image = document.getElementById('cover-image');
      const noImage = document.getElementById('no-image');
      image.src = URL.createObjectURL(event.target.files[0]);
      image.style.display = 'block';
      noImage.style.display = 'none';
    }

    // document.getElementById('simpan').addEventListener('click', function() {
    //   const statusPengajuan = document.getElementById('status-pengajuan');
    //   statusPengajuan.textContent = 'Tersimpan';
    //   statusPengajuan.style.color = 'green';
    // });
  </script>

@endsection