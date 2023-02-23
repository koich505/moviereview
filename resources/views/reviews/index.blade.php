@extends('app')

@section('title', '記事一覧')
@include('nav')

@section('content')
  <div class="container">
    @foreach($reviews as $review)
      @include('reviews.card')
    @endforeach
  </div>
@endsection
