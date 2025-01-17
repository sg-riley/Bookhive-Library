@extends('admin.layout.dasboard-layout')
@section('title', 'Admin | Pengajuan peminjaman')


@php
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    $tanggal_sekarang = strftime("%A, %d %B %Y");
@endphp

@section('content')

    <div class="h-5 m-4">
        <p class="text-light">.</p>
    </div>

    <div class="header-pages mt-3 mb-5" 
    style="background: rgb(70, 72, 233);
        background: linear-gradient(90deg, rgb(70, 72, 233) 0%, rgb(171, 173, 255) 100%);">
        <span class="triangle" style="background: rgb(165, 166, 255);"></span>
        <h1 class="m-0 text-light">Pengajuan Peminjaman Buku</h1>
    </div>

    <div class="row justify-content-between m-4">
        <h4>Ajuan Peminjaman Bahan Pustaka</h4>
        <div class="col">
            <div class="card">
                <div class="table-responsive p-3">
                    <table id='ajuan-peminjaman' class="table table-hover p-4" >
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
        <h4>Daftar Peminjaman Bahan Pustaka</h4>
        <div class="col">
            <div class="card">
                <div class="table-responsive p-3">
                    <table id='daftar-peminjaman' class="table table-hover p-4">
                        <thead class="card-header">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Tanggal Peminjaman</th>
                            <th scope="col">Status Peminjaman</th>
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
    
    
    
    <script>
       $(document).ready(function() {
            fetch('/api/peminjaman', {
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
                const peminjaman = data.data;

                
                $('#ajuan-peminjaman').DataTable({
                    data: peminjaman.filter(item => item.status_peminjaman === "menunggu konfirmasi"),
                    responsive: true,
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: true,
                    lengthChange: true,
                    pageLength: 10,
                    columns: [
                        { 
                            data: null,
                            render: (data, type, row, meta) => meta.row + 1
                        },
                        { data: 'id_peminjaman' },
                        { data: 'user.nama_lengkap' },
                        { data: 'bahan_pustaka.judul' },
                        { data: 'tanggal_peminjaman' },
                        { 
                            data: null,
                            render: (data, type, row) => `
                                <button type="button" class="btn btn-primary btn-sm m-1 terima-btn" data-id="${row.id_peminjaman}" style="width: 4rem;">Terima</button>
                                <button type="button" class="btn btn-danger btn-sm m-1 tolak-btn" data-id="${row.id_peminjaman}" style="width: 4rem;">Tolak</button>
                            `
                        }
                    ]
                });

                $('#ajuan-peminjaman tbody').on('click', '.terima-btn', function() {
                    const id = $(this).data('id');
                    updateStatusPeminjaman(id, 'diterima');
                });

                $('#ajuan-peminjaman tbody').on('click', '.tolak-btn', function() {
                    const id = $(this).data('id');
                    updateStatusPeminjaman(id, 'ditolak');
                });

                const getJatuhTempo = () => {
                    const today = new Date();
                    today.setDate(today.getDate() + 7); 
                    return today.toISOString().split('T')[0]; 
                };

                function updateStatusPeminjaman(id, status) {
                    fetch(`/api/update-status/${id}`, {
                        method: 'PUT',
                        headers: {
                            'Authorization': `Bearer ${localStorage.getItem('token')}`,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ status_peminjaman: status, jatuh_tempo: getJatuhTempo() })
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(`Status peminjaman berhasil diperbarui menjadi: ${status}`);
                        location.reload();
                    })
                    .catch(error => {
                        console.error("Error updating status:", error);
                        alert("Terjadi kesalahan saat memperbarui status peminjaman.");
                    });
                }

                
                $('#daftar-peminjaman').DataTable({
                    data: peminjaman.filter(item => ['diterima', 'ditolak', 'dikembalikan'].includes(item.status_peminjaman)),
                    responsive: true,
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: true,
                    lengthChange: true,
                    pageLength: 10,
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    columns: [
                        { 
                            data: null,
                            render: (data, type, row, meta) => meta.row + 1
                        },
                        { data: 'id_peminjaman' },
                        { data: 'user.nama_lengkap' },
                        { data: 'bahan_pustaka.judul' },
                        { data: 'tanggal_peminjaman' },
                        { 
                            data: 'status_peminjaman',
                            render: (status) => {
                                if (status === 'diterima') {
                                    return `<button type="button" class="btn btn-outline-primary btn-sm m-1">Diterima</button>`;
                                } else if (status === 'ditolak') {
                                    return `<button type="button" class="btn btn-outline-danger btn-sm m-1">Ditolak</button>`;
                                } else if (status === 'dikembalikan') {
                                    return `<button type="button" class="btn btn-outline-success btn-sm m-1">Dikembalikan</button>`;
                                }
                            }
                        }
                    ]
                });
            })
            .catch(error => {
                console.error("Error fetching data:", error);
                alert("Terjadi kesalahan saat memuat data peminjaman. Harap coba lagi.");
            });
        });

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
