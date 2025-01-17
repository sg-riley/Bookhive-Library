@extends('admin.layout.dasboard-layout')
@section('title', 'Manajemen Pengguna')

@php
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    $tanggal_sekarang = strftime("%A, %d %B %Y");

@endphp

@section('content')

<div class="h-5 m-4">
    <p class="text-light">.</p>
</div>

<div class="header-pages mt-3 mb-5" style="background: rgb(88, 213, 42);
    background: linear-gradient(90deg, rgb(88, 213, 42) 0%, rgb(201, 255, 182) 100%);">
    <span class="triangle" style="background: rgb(185, 255, 160);"></span>
    <h1 class="m-0 text-light">Manajemen Pengguna</h1>
</div>

<div class="row justify-content-between m-4">
    <h4>Daftar Pengguna Perpustakaan</h4>
    <div class="col">
        <div class="card">
            <div class="table-responsive p-3">
                <table id="pengguna-table" class="table table-hover" data-pagination="true" data-page-size="10">
                    <thead class="card-header">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Pemustaka</th>
                            <th scope="col">Email</th>
                            <th scope="col" style="text-align: start;">Nomor Telepon</th>
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

<div class="h-4" style="margin-bottom: 5rem;">
    <p class="text-light">.</p>
</div>

{{-- ===== DATATABLE===== --}}

<script>
    $(document).ready(function() {
        fetch('/api/getAllUsers', {
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
            const users = data.users;

            $('#pengguna-table').DataTable({
                data: users,
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
                    { data: 'id_pengguna' },
                    { data: 'nama_lengkap' },
                    { data: 'email' },
                    { data: 'nomor_telepon' },
                    { 
                        data: null,
                        render: function(data) {
                            return `
                                <button type="button" class="btn btn-outline-danger btn-sm m-1" 
                                    data-bs-toggle="modal" data-bs-target="#modalHapus${data.id_pengguna}">
                                    Hapus Pengguna
                                </button>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="modalHapus${data.id_pengguna}" tabindex="-1" aria-labelledby="modalHapusLabel${data.id_pengguna}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5">Konfirmasi Hapus Pengguna</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus <strong>${data.nama_lengkap}</strong> dari keanggotaan perpustakaan?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-danger" onclick="deleteUser (${data.id_pengguna})">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        }
                    }
                ],
                language: {
                    searchPlaceholder: "Cari Pengguna",
                }
            });
        })
        .catch(error => {
            console.error("Error fetching users:", error);
            alert("Terjadi kesalahan saat memuat data pengguna. Harap coba lagi.");
        });
    });

    function deleteUser(userId) {
        fetch(`/api/deleteUser/${userId}`, {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(data => {
                    throw new Error(data.message || `HTTP error! status: ${response.status}`);
                });
            }
            return response.json();
        })
        .then(data => {
            //console.log("User deleted successfully:", data);
            alert("Pengguna berhasil dihapus.");
            window.location.reload();
        })
        .catch(error => {
            //console.error("Error deleting user:", error);
            alert("Terjadi kesalahan saat menghapus pengguna. Harap coba lagi.");
        });
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
        padding: 0 !important;
    }
</style>
