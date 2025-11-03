
@extends('layout-be.master')
@section('title', 'Blog Posts')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Blog Posts</h1>
        <a href="{{ route('blog.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create Post
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Author</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($blogs as $blog)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ Storage::url($blog->image) }}" 
                                             alt="{{ $blog->title }}" 
                                             class="rounded me-2"
                                             style="width: 40px; height: 40px; object-fit: cover;">
                                        {{ $blog->title }}
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $blog->status === 'published' ? 'success' : 'warning' }}">
                                        {{ ucfirst($blog->status) }}
                                    </span>
                                </td>
                                <td>{{ $blog->author->name }}</td>
                                <td>{{ $blog->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('blog.edit', $blog) }}" 
                                       class="btn btn-sm btn-info me-2">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('blog.destroy', $blog) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger" 
                                                onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No blog posts found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-center mt-4">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection