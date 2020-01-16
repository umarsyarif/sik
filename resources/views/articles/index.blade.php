@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'article'
])

@section('content')
{{-- {{ dd($articles) }} --}}
    <div class="content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Articles') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="" data-toggle="modal" data-target="#create" class="btn btn-sm btn-primary btn-round">{{ __('Add article') }}</a>
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
                                            <th scope="col">{{ __('Author') }}</th>
                                            <th scope="col">{{ __('Category') }}</th>
                                            <th scope="col" class="col-4">{{ __('Title') }}</th>
                                            <th scope="col" class="text-center">{{ __('Creation Date') }}</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($articles as $article)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $article->user->name }}</td>
                                                <td>{{ $article->category->name }}</td>
                                                <td>{{ $article->title }}</td>
                                                <td class="text-center">{{ $article->created_at->format('d/m/Y H:i') }}</td>
                                                <td class="text-right">
                                                    <div class="">
                                                        {{-- @if ($article->id != auth()->id()) --}}
                                                        <a class="btn btn-sm btn-icon-only btn-outline-primary btn-round" href="{{ route('article.show', $article) }}"><i class="nc-icon nc-zoom-split"></i></a>
                                                        <a class="btn btn-sm btn-icon-only btn-outline-info btn-round" href="" data-toggle="modal" data-target="#update{{ $article->id }}"><i class="nc-icon nc-ruler-pencil"></i></a>
                                                        <a class="btn btn-sm btn-icon-only btn-outline-danger btn-round" href="" data-toggle="modal" data-target="#delete{{ $article->id }}"><i class="nc-icon nc-simple-remove"></i></a>
                                                        {{-- @else
                                                            <a class="btn btn-sm btn-icon-only btn-outline-info btn-round" href="{{ route('profile.edit') }}"><i class="nc-icon nc-ruler-pencil"></i></a>
                                                        @endif --}}
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
                                {{ $articles->links() }}
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
                <form action="{{ route('article.store') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Create article</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-auto">
                        <div class="form-group">
                            <label for="name">Category</label>
                            <select class="form-control form-control-user custom-select" id="category_id" name="category_id" required>
                                <option value="">Chose Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Article Title</label>
                            <input type="text" class="form-control form-control-user" id="title" name="title" placeholder="Article Title" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Article Content</label>
                            <textarea class="form-control form-control-user" name="content" id="content" placeholder="Article Content" cols="30" rows="100" required></textarea>
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
    @foreach ($articles as $article)
        <div class="modal fade" id="update{{ $article->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('article.update', $article) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-header">
                            <h5 class="modal-title text-primary" id="exampleModalLabel">Update Article</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-auto">
                            <div class="form-group">
                                <label for="name">Category</label>
                                <select class="form-control form-control-user custom-select" id="category_id" name="category_id" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if ( $category->id == $article->category->id ) {{ __('selected') }} @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Article Name</label>
                                <input type="text" class="form-control form-control-user" id="title" name="title" placeholder="Article Title" value="{{ $article->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Article Name</label>
                                <textarea class="form-control form-control-user" name="content" id="content" required cols="30" rows="10">{{ $article->content }}</textarea>
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
    @foreach ($articles as $article)
        <div class="modal fade" id="delete<?= $article->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Delete Article</h5>
                    </div>
                    <div class="modal-body mx-auto">
                        Are you sure want to delete this article?
                    </div>
                    <div class="modal-footer mx-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <form action="{{ route('article.destroy', $article) }}" method="post">
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
