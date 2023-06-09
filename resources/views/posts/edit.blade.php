@extends('layouts.app')

@section('title', 'Update the post')

@section('content')
  <h1>Create new post</h1>
  <form action="{{ route('posts.update', ['post' => $post->id] )}}" method="POST">
    @csrf
    @method('PUT')
    <table>
      <tbody>
        @include('posts.partials.form')
      
        <tr>
          <input type="submit" value="Create">
        </tr>
      </tbody>
    </table>
  </form>
@endsection