@extends('admin.layout.dasboard-layout')
@section('title', 'Pengembalian Buku')


@php
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    $tanggal_sekarang = strftime("%A, %d %B %Y");
@endphp

@section('content')

    <div class="h-5 m-4">
      <p class="text-light">.</p>
    </div>

    <div class="header-pages mt-3 mb-5" 
    style="background: rgb(117, 91, 250);
        background: linear-gradient(90deg, rgb(70, 72, 233) 0%, rgb(171, 173, 255) 100%);">
        <span class="triangle" style="background: rgb(165, 166, 255);"></span>
        <h1 class="m-0 text-light">Pengembalian Buku</h1>
    </div>

    <div class="row justify-content-between m-4">
        <h4>Pengembalian Jatuh Tempo Hari Ini</h4>
        <div class="col">
            <div class="card">
                <div class="table-responsive p-3">
                    <table id="jatuh-tempo" class="table table-hover" data-pagination="true" data-page-size="10">
                        <thead class="card-header">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Tanggal Peminjaman</th>
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
        <h4>Pengembalian Terlambat</h4>
        <div class="col">
            <div class="card">
                <div class="table-responsive p-3">
                    <table id="terlambat" class="table table-hover" data-pagination="true" data-page-size="10">
                        <thead class="card-header">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Jatuh Tempo</th>
                            <th scope="col">Jumlah Denda</th>
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
        <h4>Riwayat Pengembalian</h4>
        <div class="col">
            <div class="card">
                <div class="table-responsive p-3">
                    <table id="riwayat-peminjaman" class="table table-hover" data-pagination="true" data-page-size="10">
                        <thead class="card-header">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Tanggal Dipinjam</th>
                            <th scope="col">Tanggal Dikembalikan</th>
                            <th scope="col">Detail</th>
                          </tr>
                        </thead>
                        <tbody class="table-group-divider">
                    


                        </tbody>
                      </table>
                </div>
                
            </div>
        </div>
    </div>

    <div class="h-4" style="margin-bottom: 5rem;">
      <p class="text-light">.</p>
  </div>

    {{-- ===== MODAL ===== --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pengembalian</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="cotainer">
                <div class="row">
                  <div class="col-4">
                    <p class="my-1">ID Peminjaman</p>
                    <p class="my-1">Nama Peminjam</p>
                    <p class="my-1">Judul Buku</p>
                    <p class="my-1">Tanggal Pinjam</p>
                    <p class="my-1">Jatuh Tempo</p>
                    <p class="my-1">Tanggal Kembali</p>
                    <p class="my-1">Denda</p>
                    <p class="my-1">Rating</p>
                    <p class="my-1">Ulasan</p>
                  </div>
                  <div class="col-1">
                    <p class="my-1">:</p>
                    <p class="my-1">:</p>
                    <p class="my-1">:</p>
                    <p class="my-1">:</p>
                    <p class="my-1">:</p>
                    <p class="my-1">:</p>
                    <p class="my-1">:</p>
                    <p class="my-1">:</p>
                    <p class="my-1">:</p>
                  </div>
                  <div class="col-7">
                    <p class="my-1">PB11</p>
                    <p class="my-1">Melon Husky</p>
                    <p class="my-1">Cara Menjadi Kaya</p>
                    <p class="my-1">20 Oktober 2024</p>
                    <p class="my-1">27 Oktober 2024</p>
                    <p class="my-1">29 Oktober 2024</p>
                    <p class="my-1">Rp 2.000</p>
                    <p class="my-1">5</p>
                    <p class="my-1">Buku bagus, saya sekarang tau cara menjadi kaya</p>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>

      {{-- ===== MODAL DETAIL Pengembalian ===== --}}
      <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDetailLabel">Detail Pengembalian Buku</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <p class="my-1">ID Pengembalian</p>
                                <p class="my-1">Nama Peminjam</p>
                                <p class="my-1">Judul Buku</p>
                                <p class="my-1">Tanggal Pinjam</p>
                                <p class="my-1">Jatuh Tempo</p>
                                <p class="my-1">Tanggal Kembali</p>
                                <p class="my-1">Denda</p>
                                <p class="my-1">Rating</p>
                                <p class="my-1">Ulasan</p>
                            </div>
                            <div class="col-1">
                                <p class="my-1">:</p>
                                <p class="my-1">:</p>
                                <p class="my-1">:</p>
                                <p class="my-1">:</p>
                                <p class="my-1">:</p>
                                <p class="my-1">:</p>
                                <p class="my-1">:</p>
                                <p class="my-1">:</p>
                                <p class="my-1">:</p>
                            </div>
                            <div class="col-7">
                              <p class="my-1" id="modalId"></p>
                              <p class="my-1" id="modalNama"></p>
                              <p class="my-1" id="modalJudul"></p>
                              <p class="my-1" id="modalTanggalPinjam"></p>
                              <p class="my-1" id="modalJatuhTempo"></p>
                              <p class="my-1" id="modalTanggalKembali"></p>
                              <p class="my-1" id="modalDenda"></p>
                              <p class="my-1" id="modalRating"></p>
                              <p class="my-1" id="modalUlasan"></p>
                          </div>
                          
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
      </div>
      
      

      {{-- ===== TABEL ===== --}}

      <script>
        function updateStatusPeminjaman(id, status) {
            if (!confirm(`Apakah Anda yakin ingin mengonfirmasi pengembalian buku ini?`)) return;

            fetch(`/api/update-status/${id}`, {
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${localStorage.getItem('token')}`,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ status_peminjaman: status, tanggal_pengembalian: new Date() })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Gagal memperbarui status peminjaman.');
                }
                return response.json();
            })
            .then(() => {
                alert('Status peminjaman berhasil diperbarui.');
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memperbarui status peminjaman.');
            });
        }

        $(document).ready(function() {
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
                const peminjaman = data.data;

                $('#jatuh-tempo').DataTable({
                    data: peminjaman.filter(item => item.status_peminjaman === 'diterima'),
                    responsive: true,
                    paging: true,
                    columns: [
                        { data: null, render: (data, type, row, meta) => meta.row + 1 },
                        { data: 'id_peminjaman' },
                        { data: 'user.nama_lengkap' }, 
                        { data: 'bahan_pustaka.judul' }, 
                        { data: 'tanggal_peminjaman' },
                        { 
                            data: null,
                            render: (data) => `
                                <button type="button" class="btn btn-warning btn-sm m-1" onclick="updateStatusPeminjaman('${data.id_peminjaman}', 'dikembalikan')">Konfirmasi Pengembalian</button>
                            `
                        }
                    ]
                });

                $('#terlambat').DataTable({
                  data: peminjaman.filter(item => {
                     
                      const today = new Date();
                      const jatuhTempo = new Date(item.jatuh_tempo);
                      return item.status_peminjaman === 'diterima' && today > jatuhTempo;
                  }),
                  responsive: true,
                  paging: true,
                  columns: [
                      { data: null, render: (data, type, row, meta) => meta.row + 1 },
                      { data: 'id_peminjaman' },
                      { data: 'user.nama_lengkap' },
                      { data: 'bahan_pustaka.judul' }, 
                      { data: 'jatuh_tempo' },
                      { 
                        data: 'jatuh_tempo', 
                          render: (jatuhTempo) => {
                              const today = new Date();
                              const tempo = new Date(jatuhTempo);

                              const selisih = today - tempo; 
                              const jumlahHari = Math.max(0, Math.ceil(selisih / (1000 * 60 * 60 * 24))); // Selisih hari (minimum 0)

                              const denda = jumlahHari * 2000;

                              return `Rp ${denda}`;
                          }
                      },
                      { 
                          data: null,
                          render: (data) => `
                              <button type="button" class="btn btn-warning btn-sm m-1" onclick="updateStatusPeminjaman('${data.id_peminjaman}', 'dikembalikan')">Konfirmasi Pengembalian</button>
                          `
                      }
                  ]
              });


               
                $('#riwayat-peminjaman').DataTable({
                    data: peminjaman.filter(item => item.status_peminjaman === 'dikembalikan'),
                    responsive: true,
                    paging: true,
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    columns: [
                        { data: null, render: (data, type, row, meta) => meta.row + 1 },
                        { data: 'id_peminjaman' },
                        { data: 'user.nama_lengkap' }, 
                        { data: 'bahan_pustaka.judul' },
                        { data: 'tanggal_peminjaman' },
                        { data: 'tanggal_pengembalian' },
                        { 
                            data: null,
                            render: (data) => `
                                <button type="button" class="btn btn-outline-primary btn-sm m-1" data-bs-toggle="modal" onClick="showDetail('${data.id_peminjaman}', '${data.user.nama_lengkap}', '${data.bahan_pustaka.judul}', '${data.tanggal_peminjaman}', '${data.jatuh_tempo}', '${data.tanggal_pengembalian}', '${data.denda ? data.denda.jumlah_denda : 'Rp 0'}', '${data.nilai ? data.nilai : 'Belum Dinilai'}', '${data.ulasan ? data.ulasan : 'Belum Dinilai'}')" >Lihat detail</button>
                            `
                        }
                    ]
                });
            })
            .catch(error => {
                console.error("Error fetching data:", error);
                alert("Terjadi kesalahan saat memuat data peminjaman.");
            });

        });

        function showDetail(id, nama, judul, tanggalPinjam, jatuhTempo, tanggalKembali, denda, rating, ulasan) {
                
                document.getElementById('modalId').textContent = id;
                document.getElementById('modalNama').textContent = nama;
                document.getElementById('modalJudul').textContent = judul;
                document.getElementById('modalTanggalPinjam').textContent = tanggalPinjam;
                document.getElementById('modalJatuhTempo').textContent = jatuhTempo;
                document.getElementById('modalTanggalKembali').textContent = tanggalKembali || 'Belum Dikembalikan';
                document.getElementById('modalDenda').textContent = denda ? `Rp ${denda.toString()}` : 'Rp 0';
                document.getElementById('modalRating').textContent = rating ? `${rating}/5` : 'Belum Dinilai';
                document.getElementById('modalUlasan').textContent = ulasan || 'Tidak Ada Ulasan';

                $('#modalDetail').modal('show');
            }

    </script>
    
    
@endsection


<style>
  .table-responsive {
      overflow-x: auto; 
      -webkit-overflow-scrolling: touch; 
  }

  .dt-container .dt-buttons .dt-button{
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

  .dt-container .dt-search{
      display: flex;
      justify-content: flex-end;
      margin: 4px;
      margin-bottom: 1rem;
  }

  label{  
    padding: 4px;
    margin-right: 2px;
  }
  .form-control{
      max-width: 15rem;
  }

  .dt-info{
      text-align: end;
      margin: 4px;
      margin-top: 2rem;
  }

  .dt-paging .pagination{
      justify-content: flex-end;
      margin-bottom: 0;
  }
  .dt-container .dt-paging .dt-paging-button{
      padding:0 !important;
  }

</style>

