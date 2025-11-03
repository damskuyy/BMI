
@extends('layout-be.master')
@section('title', 'Members')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Members</h1>
        <a href="{{ route('member_be.create') }}" class="btn btn-primary">Add Member</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Stuktur</th>
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
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->position }}</td>
                    <td>{{ $member->sector }}</td>
                    <td>{{ $member->business }}</td>
                    <td>{{ $member->product }}</td>
                    <td>{{ $member->domicile }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>
                        <a href="{{ route('member_be.edit', $member) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('member_be.destroy', $member) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this member?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $members->links() }}
</div>
@endsection