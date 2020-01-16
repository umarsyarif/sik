@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'category'
])

@section('content')
    <div class="content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Categories') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="" data-toggle="modal" data-target="#create" class="btn btn-sm btn-primary btn-round">{{ __('Add category') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">{{ __('No') }}</th>
                                            <th scope="col">{{ __('Name') }}</th>
                                            <th scope="col" class="text-center">{{ __('Creation Date') }}</th>
                                            <th scope="col" class="text-center">{{ __('Articles') }}</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td class="text-center">{{ $category->created_at->format('d/m/Y H:i') }}</td>
                                                <td class="text-center">{{ $category->articles->count() }}</td>
                                                <td class="text-right">
                                                    <div class="">
                                                        <a class="btn btn-sm btn-icon-only btn-outline-info btn-round" href="" data-toggle="modal" data-target="#update{{ $category->id }}"><i class="nc-icon nc-ruler-pencil"></i></a>
                                                        <a class="btn btn-sm btn-icon-only btn-outline-danger btn-round" href="" data-toggle="modal" data-target="#delete{{ $category->id }}"><i class="nc-icon nc-simple-remove"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                {{ $categories->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Create --}}
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Create Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-auto">
                        <div class="form-group d-inline">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Category Name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" href="" class="btn btn-primary">Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal update --}}
    @foreach ($categories as $category)
        <div class="modal fade" id="update{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('category.update', $category) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-header">
                            <h5 class="modal-title text-primary" id="exampleModalLabel">Update Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-auto">
                            <div class="form-group d-inline">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Category Name" value="{{ $category->name }}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" href="" class="btn btn-primary">Save</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Modal Delete --}}
    @foreach ($categories as $category)
        <div class="modal fade" id="delete<?= $category->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Delete Category</h5>
                    </div>
                    <div class="modal-body mx-auto">
                        Are you sure want to delete this category?
                    </div>
                    <div class="modal-footer mx-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <form action="{{ route('category.destroy', $category) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" href="" class="btn btn-primary">Yes</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
