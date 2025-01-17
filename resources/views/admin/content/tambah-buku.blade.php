@extends('admin.layout.dasboard-layout')
@section('title', 'Daftar Buku')

@php
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    $tanggal_sekarang = strftime("%A, %d %B %Y");


@endphp

@section('content')

    <div class="h-5 m-4">
        <p class="text-light">.</p>
    </div>

    <div class="header-pages mt-3 mb-5" 
    style="
        background: rgb(237, 188, 72);
        background: linear-gradient(90deg, rgb(255, 199, 68) 0%, rgb(255, 230, 172) 100%);">
        <span class="triangle" style="background: rgb(255, 231, 174);"></span>
        <h1 class="m-0 text-light">Kelola Data Buku</h1>
    </div>

    <div class="row justify-content-between m-4">
        <h4>Daftar Lengkap Buku Perpustakaan</h4>
        <div class="col">
            <div class="card">
                <div class="table-responsive p-3">
                    <table id="buku-table" class="table table-hover" data-pagination="true" data-page-size="10">
                        <thead class="card-header">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Buku</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">ISBN</th>
                            <th scope="col" style="text-align: start;">Jumlah</th>
                            <th scope="col">Detail</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody class="table-group-divider">

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-between m-4">
        <div class="col">
            <div class="card p-0">
                <div class="card-header">
                    <h2>Form Tambah Bahan Pustaka</h2>
                </div>
                <form enctype="multipart/form-data" id="form-tambah-buku">
                    <div class="row p-4">
                        <div class="col my-2">
                            <div class="form-group" style="min-width: 10rem;">
                                <label for="kategori">Kategori</label>
                                <select id="kategori" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col my-2">
                            <div class="form-group" style="min-width: 10rem;">
                                <label for="judul">Judul Buku</label>
                                <input type="text" id="judul" class="form-control" required>
                            </div>
                        </div>

                        <div class="col my-2">
                            <div class="form-group" style="min-width: 10rem;">
                                <label for="isbn">ISBN</label>
                                <input type="text" id="isbn" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row p-4">
                        <div class="col my-2">
                            <div class="form-group" style="min-width: 10rem;">
                                <label for="tahun-terbit">Tahun Terbit</label>
                                <input type="number" id="tahun-terbit" class="form-control" required>
                            </div>
                        </div>

                        <div class="col my-2">
                            <div class="form-group" style="min-width: 10rem;">
                                <label for="penulis">Penulis</label>
                                <input type="text" id="penulis" class="form-control" required>
                            </div>
                        </div>

                        <div class="col my-2">
                            <div class="form-group" style="min-width: 10rem;">
                                <label for="penerbit">Penerbit</label>
                                <input type="text" id="penerbit" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group p-4 my-2" style="min-width: 10rem;">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" class="form-control" style="min-height: 10rem;"></textarea>
                    </div>

                    <div class="row p-4">
                        <div class="col my-2">
                            <div class="form-group" style="min-width: 10rem;">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" id="jumlah" class="form-control" value="1" min="1" required>
                            </div>
                        </div>

                        <div class="col my-2">
                            <div class="form-group" style="min-width: 10rem;">
                                <label for="gambar-sampul">Gambar Sampul Buku</label>
                                <input type="file" id="gambar-sampul" class="form-control" onchange="previewImage(event)">
                            </div>
                        </div>

                        <div class="col my-2">
                            <div class="image-card" id="image-card" style="min-width: 10rem; min-height: 10rem; border: 1px solid #ddd; border-radius: 5px; display: flex; justify-content: center; align-items: center; background-color: #f9f9f9;">
                                <img id="cover-image" src="" alt="Gambar Sampul Buku" style="max-width: 100%; max-height: 100%; display: none;">
                                <p id="no-image" style="display: block;">No Image</p>
                            </div>
                        </div>
                    </div>

                    <div class="row p-4">
                        <div class="col my-2">
                            <button id="simpan" type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#konfirmasiModal">Simpan</button>
                        </div>
                    </div>

                    {{-- ===== MODAL KONFIRMASI TAMBAH BUKU =====  --}}
                    <div class="modal fade" id="konfirmasiModal" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menambah data buku ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary" id="tambah-buku">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <form>
            </div>  
        </div>
    </div>

    {{-- ===== MODAL DETAIL BUKU ===== --}}
    <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailLabel">Detail Bahan Pustaka</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container text-center mb-3">
                        <img id="modalGambar" src="" class="img-fluid" style="max-width: 50%; height: auto;">
                    </div>
                    <table class="table table-word-wrap">
                        <tr>
                            <th>ID Bahan Pustaka</th>
                            <td>:</td>
                            <td id="modalID"></td>
                        </tr>
                        <tr>
                            <th>Judul</th>
                            <td>:</td>
                            <td id="modalJudul"></td>
                        </tr>
                        <tr>
                            <th>ISBN</th>
                            <td>:</td>
                            <td id="modalISBN"></td>
                        </tr>
                        <tr>
                            <th>Tahun Terbit</th>
                            <td>:</td>
                            <td id="modalTahunTerbit"></td>
                        </tr>
                        <tr>
                            <th>Penulis</th>
                            <td>:</td>
                            <td id="modalPenulis"></td>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <td>:</td>
                            <td id="modalPenerbit"></td>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <td>:</td>
                            <td id="modalStok"></td>
                        </tr>
                        <tr>
                            <th rowspan="2">Deskripsi</th>
                            <td rowspan="2">:</td>
                            <td rowspan="2" id="modalDeskripsi"></td>
                        </tr>
                    
                        
                    </table>
                </div>
            </div>
        </div>
    </div>


    {{-- ===== MODAL HAPUS BUKU ===== --}}
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus bahan pustaka <strong id="judulBuku"></strong>?</p>
                    <input type="hidden" id="bahanPustakaID">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" onclick="deleteBahanPustaka()">Hapus</button>
                </div>
            </div>
        </div>
    </div>
  

    <div class="h-4" style="margin-bottom: 5rem;">
        <p class="text-light">.</p>
    </div>



    {{-- ===== DATATABLE===== --}}
    <script>
       $(document).ready(function() {
        const headers = {
            'Authorization': `Bearer ${localStorage.getItem('token')}`,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        };

        fetch('/api/bahan-pustaka', {
            method: 'GET',
            headers: headers
        })
        .then(response => response.json())
        .then(data => {
            const bahanPustakaList = data.data;

            $('#buku-table').DataTable({
                data: bahanPustakaList,
                columns: [
                    { 
                        data: null,
                        render: (data, type, row, meta) => meta.row + 1 
                    },
                    { data: 'id_bahan_pustaka' },
                    { data: 'judul' },
                    { data: 'nama_kategori' },
                    { data: 'isbn' },
                    { data: 'jumlah' },

                    { 
                        data: null,
                        render: (data) => `
                            <button class="btn btn-outline-primary btn-sm" onclick="showDetail(
                            '${data.id_bahan_pustaka}', 
                            '${data.judul}', 
                            '${data.isbn}', 
                            '${data.tahun_terbit}', 
                            '${data.penulis}', 
                            '${data.penerbit}', 
                            '${data.deskripsi}', 
                            '${data.jumlah}', 
                            '${data.gambar_sampul}')">Detail</button>
                        `
                    },
                    { 
                        data: null,
                        render: (data) => `
                            <button class="btn btn-outline-danger btn-sm" onclick="showHapusModal('${data.id_bahan_pustaka}', '${data.judul}')">Hapus</button>
                        `
                    }
                ],
                responsive: true,
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                language: {
                    searchPlaceholder: "Cari Bahan Pustaka",
                    zeroRecords: "Data bahan pustaka tidak tersedia."
                }
            });
        });
    });

    function showDetail(id, judul, isbn, tahun_terbit, penulis, penerbit, deskripsi, jumlah, gambar_sampul) {
        document.getElementById('modalID').textContent = id;
        document.getElementById('modalJudul').textContent = judul;
        document.getElementById('modalISBN').textContent = isbn;
        document.getElementById('modalTahunTerbit').textContent = tahun_terbit;
        document.getElementById('modalPenulis').textContent = penulis;
        document.getElementById('modalPenerbit').textContent = penerbit;
        document.getElementById('modalDeskripsi').textContent = deskripsi;
        document.getElementById('modalStok').textContent = jumlah;
        document.getElementById('modalGambar').src = '/storage/' + gambar_sampul;
        $('#modalDetail').modal('show');
    }


    function showHapusModal(id, judul) {
        $('#hapusModal').modal('show');
        $('#hapusModal #bahanPustakaID').val(id);
        $('#hapusModal #judulBuku').text(judul);
    }

    function deleteBahanPustaka() {
        const id = $('#hapusModal #bahanPustakaID').val();
        
        const headers = {
            'Authorization': `Bearer ${localStorage.getItem('token')}`,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        };

        fetch(`/api/bahan-pustaka/${id}`, {
            method: 'DELETE',
            headers: headers
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === "Bahan Pustaka deleted successfully") {
                alert('Bahan Pustaka berhasil dihapus');
                location.reload(); // Refresh halaman setelah hapus
            } else {
                alert('Gagal menghapus bahan pustaka');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });

        $('#hapusModal').modal('hide');
    }


    </script>

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



    {{-- ===== UNTUK FORM TAMBAH BUKU ===== --}}
    {{-- <script>
        function previewImage(event) {
            const image = document.getElementById('cover-image');
            const noImageText = document.getElementById('no-image');
            const [file] = event.target.files;
            
            if (file) {
                image.style.display = 'block';
                noImageText.style.display = 'none';
                image.src = URL.createObjectURL(file);
            } else {
                image.style.display = 'none';
                noImageText.style.display = 'block';
            }
        }

    
        document.getElementById('simpan').addEventListener('click', function() {
            $('#confirmModal').modal('show');
        });
    
        document.getElementById('confirmButton').addEventListener('click', function() {
            const statusPengajuan = document.getElementById('status-pengajuan');
            statusPengajuan.textContent = 'Tersimpan';
            statusPengajuan.style.color = 'green';
            $('#confirmModal').modal('hide');
            // Tunggu bek en
        });


      </script> --}}

      {{-- ===== HANDLE FORM ===== --}}
      <script>
        
        document.addEventListener('DOMContentLoaded', function() {
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
                const kategoriSelect = document.getElementById('kategori');
                if (data && data.data) {
                   
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
   
        document.getElementById('form-tambah-buku').addEventListener('submit', function (event) {
            event.preventDefault();

            const kategori = document.getElementById('kategori').value;
            const judul = document.getElementById('judul').value;
            const isbn = document.getElementById('isbn').value;
            const tahunTerbit = document.getElementById('tahun-terbit').value;
            const penulis = document.getElementById('penulis').value;
            const penerbit = document.getElementById('penerbit').value;
            const jumlah = document.getElementById('jumlah').value;
            const deskripsi = document.getElementById('deskripsi').value;
            const gambarSampul = document.getElementById('gambar-sampul').files[0];

            if (!kategori || !judul || !isbn || !tahunTerbit || !penulis || !gambarSampul) {
                alert("Semua kolom wajib diisi!");
                return;
            }

            const formData = new FormData();
            formData.append('id_kategori', kategori);
            formData.append('judul', judul);
            formData.append('isbn', isbn);
            formData.append('tahun_terbit', tahunTerbit);
            formData.append('penulis', penulis);
            formData.append('penerbit', penerbit);
            formData.append('deskripsi', deskripsi);
            formData.append('jumlah', jumlah);
            formData.append('gambar_sampul', gambarSampul);

            fetch('/api/bahan-pustaka', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${localStorage.getItem('token')}`
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert('Buku berhasil ditambahkan!');

                console.log(data);
                location.reload();
            })
            .catch(error => {
                alert('Terjadi kesalahan saat menambah buku.');
                console.error('Error adding book:', error);
            });
        });


        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('cover-image');
                const noImage = document.getElementById('no-image');
                output.src = reader.result;
                output.style.display = 'block';
                noImage.style.display = 'none';
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        
    </script>
   
@endsection

<style>
    .table-responsive {
        overflow-x: auto; 
        -webkit-overflow-scrolling: touch; 
    }
  
    .dt-container .dt-buttons .dt-button {
        all: unset;
        background: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 4px 10px;
        margin: 4px;
        transition: border-color 0.3s;
    }
  
    .dt-container .dt-buttons .dt-button:hover {
        all: unset;
        background: #fff;
        border: 1px solid #5392FB;
        border-radius: 5px;
        padding: 4px 10px;
        margin: 4px;
        color: #5392FB; 
    }
  
    .dt-container .dt-search {
        display: flex;
        justify-content: flex-end;
        margin: 4px;
        margin-bottom: 1rem;
    }
  
    label {  
      padding: 4px;
      margin-right: 2px;
    }
    .form-control {
        width: inherit;
    }
  
    .dt-search .form-control {
        max-width: 15rem;
    }
  
    .dt-info {
        text-align: end;
        margin: 4px;
        margin-top: 2rem;
    }
  
    .dt-paging .pagination {
        justify-content: flex-end;
        margin-bottom: 0;
    }
  
    .dt-container .dt-paging .dt-paging-button {
        padding:0 !important;
    }
  
  </style>
  