@extends('layouts.app')

@section('title', 'List posts')

@section('content')
  @if(count($posts))
    <h1>List posts</h1>
    @each('posts.partials.post', $posts, 'post') 
    
    {{-- nếu dùng cách này thì uncomment 1-5 post.blade.php --}}
    {{-- @foreach($posts as $key => $post)
      @include('posts.partials.post')
    @endforeach --}}
  @else
    <p>Not found posts</p>
  @endif
@endsection
