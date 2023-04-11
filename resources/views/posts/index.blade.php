@extends('layouts.app')

@section('title', 'List posts')

@section('content')
  @if(count($posts))
    <h1>List posts</h1>
    @foreach($posts as $key => $post)
      @if($loop->even)
        <p style='background-color:gray'>{{ $key }} - {{ $post['title'] }}</p>
      @else
        <p>{{ $key }} - {{ $post['title'] }}</p>
      @endif
    @endforeach
  @else
    <p>Not found posts</p>
  @endif
@endsection
