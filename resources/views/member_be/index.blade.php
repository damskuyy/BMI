
@extends('layout-be.master')
@section('title', 'Members')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Members</h1>
        <a href="{{ route('member_be.create') }}" class="btn btn-primary">Add Member</a>
    </div>

    {{-- @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif --}}

    <style>
        .table td {
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            vertical-align: middle;
        }
        
        .table td:nth-child(1) {
            max-width: 40px;
            text-align: center;
        }
        
        .table td:nth-child(2) {
            max-width: 70px;
            text-align: center;
        }
        
        .table td:nth-child(3) {
            max-width: 130px;
        }
        
        .table td:nth-child(4),
        .table td:nth-child(5),
        .table td:nth-child(6),
        .table td:nth-child(7),
        .table td:nth-child(8),
        .table td:nth-child(9) {
            max-width: 120px;
        }
        
        .table td:nth-child(10) {
            max-width: 100px;
            white-space: normal;
            padding: 0.75rem 0.5rem !important;
        }
        
        .action-buttons {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .action-buttons .btn {
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
        }
        
        .action-buttons form {
            margin: 0;
        }
        
        .table thead th {
            font-weight: 600;
            text-align: left;
            border-bottom: 2px solid #dee2e6;
        }
        
        .table thead th:nth-child(1),
        .table thead th:nth-child(2) {
            text-align: center;
        }
        
        .table thead th:nth-child(10) {
            text-align: center;
        }
        
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
    </style>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Anggota</th>
                <th>Struktur</th>
                <th>Sektor</th>
                <th>Usaha</th>
                <th>Produk</th>
                <th>Domisili</th>
                <th>No HP</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $index => $member)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @php
                            $fotoUrl = null;
                            if ($member->foto) {
                                // storage public
                                if (file_exists(storage_path('app/public/' . $member->foto))) {
                                    $fotoUrl = asset('storage/' . $member->foto);
                                }
                                // already a public path like 'fe/img/...'
                                elseif (file_exists(public_path($member->foto))) {
                                    $fotoUrl = asset($member->foto);
                                }
                                // try common team folder
                                elseif (file_exists(public_path('fe/img/team/' . $member->foto))) {
                                    $fotoUrl = asset('fe/img/team/' . $member->foto);
                                }
                            }
                        @endphp

                        @if($fotoUrl)
                            <img src="{{ $fotoUrl }}" alt="{{ $member->name }}" style="width:50px; height:50px; border-radius:0.5rem; object-fit:cover;">
                        @else
                            <span class="badge bg-secondary">No Foto</span>
                        @endif
                    </td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->position }}</td>
                    <td>
                        <span class="badge bg-{{ $member->sector == 'MFG' ? 'info' : ($member->sector == 'KUL' ? 'warning' : 'success') }}">
                            {{ $member->sector }}
                        </span>
                    </td>
                    <td>{{ $member->business }}</td>
                    <td>{{ $member->product }}</td>
                    <td>{{ $member->domicile }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('member_be.edit', $member) }}" class="btn btn-sm btn-info" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('member_be.destroy', $member) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger" onclick="hapus(event, this)" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-4">
        {{ $members->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>

<script>

        function hapus(event, el){
            event.preventDefault()
            swal({
                title: "Are you sure?",
                text: "Your will delete this package permanently!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
                },
                function(){
                    el.closest('form').submit()
                });
        }

        function tampil_pesan(){
            const pesan = "{{session('success')}}"

            if(pesan.trim() !== ''){
                swal('Good Job', pesan, 'success')
            }
        }

        window.addEventListener('load', function(){
            tampil_pesan()
        })
    </script>
@endsection