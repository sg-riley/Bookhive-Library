@extends('admin.layout.dasboard-layout')
@section('title', 'Request Buku')

@php
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    $tanggal_sekarang = strftime("%A, %d %B %Y");

@endphp

@section('content')

    <div class="h-5 m-4">
      <p class="text-light">.</p>
    </div>

    <div class="header-pages mt-3 mb-5" 
    style="background: rgb(237, 188, 72);
        background: linear-gradient(90deg, rgb(255, 199, 68) 0%, rgb(255, 230, 172) 100%);">
        <span class="triangle" style="background: rgb(255, 231, 174);"></span>
        <h1 class="m-0 text-light">Usulan Buku</h1>
    </div>

    <div class="row justify-content-between m-4">
        <h4>Daftar Usulan Buku</h4>
        <div class="col">
            <div class="card">
                <div class="table-responsive p-3">
                    <table id="usulan-buku" class="table table-hover" data-pagination="true" data-page-size="10">
                        <thead class="card-header">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Pengusul</th>
                            <th scope="col">Judul</th>
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

    {{-- ===== MODAL DETAIL USULAN ===== --}}
    <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetail" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="modalDetailLabel">Detail Usulan Buku</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-4">
                    <p class="my-1">ID Usulan</p>
                    <p class="my-1">Nama Pengusul</p>
                    <p class="my-1">Judul Buku</p>
                    <p class="my-1">Penulis</p>
                    <p class="my-1">Kategori</p>
                    <p class="my-1">Tahun Terbit</p>
                    <p class="my-1">Alasan Pengusulan</p>
                  </div>
                  <div class="col-1">
                    <p class="my-1">:</p>
                    <p class="my-1">:</p>
                    <p class="my-1">:</p>
                    <p class="my-1">:</p>
                    <p class="my-1">:</p>
                    <p class="my-1">:</p>
                    <p class="my-1">:</p>
                  </div>
                  <div class="col-7">
                    <p class="my-1" id="modalRekomendasi"></p>
                    <p class="my-1" id="modalPengusul"></p>
                    <p class="my-1" id="modalJudul"></p>
                    <p class="my-1" id="modalPenulis"></p>
                    <p class="my-1" id="modalKategori"></p>
                    <p class="my-1" id="modalTahun"></p>
                    <p class="my-1" id="modalAlasan"></p>
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


    <div class="h-4" style="margin-bottom: 8rem;">
       <p class="text-light">.</p>
    </div>

    {{-- ===== DATATABLE===== --}}
    <script>
        $(document).ready(function() {
        fetch('/api/rekomendasi', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            const usulan = data.data;

            $('#usulan-buku').DataTable({
                data: usulan,
                responsive: true,
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthChange: true,
                pageLength: 10,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                columns: [
                    { 
                        data: null,
                        render: function (data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    { data: 'id_rekomendasi' },
                    { data: 'nama_pengguna' },
                    { data: 'judul' },
                    { 
                      data: null,
                      render: (data) => `
                      
                         <button type="button" class="btn btn-outline-primary btn-sm m-1" data-bs-toggle="modal" data-bs-target="#modalDetail" onclick="showDetail('${data.id_rekomendasi}', '${data.nama_pengguna}', '${data.judul}', '${data.penulis}', '${data.kategori}', '${data.tahun_terbit}', '${data.alasan}')">Lihat detail</button>
                      ` },
                    
                ],
                language: {
                    searchPlaceholder: "Cari Usulan",
                }
            });
        })
        .catch(error => {
            console.error("Error fetching usulan:", error);
            alert("Terjadi kesalahan saat memuat data usulan. Harap coba lagi.");
        });
    });

    function showDetail(id, nama, judul, penulis, kategori, tahun, alasan) {
            document.getElementById('modalRekomendasi').textContent = id;
            document.getElementById('modalPengusul').textContent = nama;
            document.getElementById('modalJudul').textContent = judul;
            document.getElementById('modalPenulis').textContent = penulis;
            document.getElementById('modalKategori').textContent = kategori;
            document.getElementById('modalTahun').textContent = tahun;
            document.getElementById('modalAlasan').textContent = alasan;
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


