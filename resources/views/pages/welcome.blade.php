@extends('layouts.app', [
    'class' => 'auth',
    'elementActive' => ''
])

@section('content')
    <div class="content col-md-12 ml-auto mr-auto">
        <div class="header pb-5 pb-7 pt-lg-9">
            <div class="container col-md-10">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-12 pt-5">
                            <h2 class="text-white mb-2">{{ __('Sistem Informasi Kesehatan') }}</h2>
                            <p class="text-white">
                                {{ __('Cari artikel kesehatan yang anda perlukan!') }}
                            </p>

                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <div class="content">
                                        <form action="{{ route('article.result') }}" id="form" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="kategori">Kategori</label>
                                                <select class="custom-select" name="kategori" id="kategori" class="form-control">
                                                    <option value="">Pilih Kategori</option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="article">Judul</label>
                                                <select class="custom-select" name="article" id="article" class="form-control">
                                                    <option value="">PIlih Judul</option>
                                                </select>
                                            </div>
                                            <div class="float-right">
                                                <button type="submit" class="btn btn-sm btn-outline-primary btn-round">Cari</button>
                                            </div>
                                        </form>
                                        {{ csrf_field() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();
        });
    </script>

    <script>
        $(document).ready(function(){
        $('#kategori').change(function(){
            var id = $(this).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url : "{{ route('article.fetch') }}",
                method : "POST",
                data : {id: id, _token:_token},
                success: function(data){
                    $('#article').html(data);
                }
            });
        });
    });
    </script>

@endpush
