@extends('layouts.app', [
    'class' => 'article',
    'elementActive' => '',
    'backgroundImagePath' => 'img/bg/hospital.jpg'
])

@section('content')

<!-- Page Header -->
<header class="masthead">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading pb-4">
                    <h1>{{ $article->title }}</h1>
                    <div class="text-gray mb-3">Category: {{ $article->category->name }}</div>
                    <span class="meta text-sm">Posted
                        <a href="#">by {{ $article->user->name }}</a>
                        {{ $article->created_at->diffForHumans() }}
                    </span>
                </div>
                <div class="post-content text-white text-size-20">
                    <p>{!! nl2br($article->content) !!}</p>
                </div>
                </div>
            </div>
        </div>
</header>

<!-- Post Content -->

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();
        });
    </script>
@endpush
