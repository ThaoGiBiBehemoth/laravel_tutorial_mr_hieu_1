@extends('layouts.app')

@section('title', 'Create new post')

@section('content')
  <h1>Create new post</h1>
  <form action="{{ route('posts.store')}}" method="POST">
    @csrf
    <table>
      <tbody>
        <tr>
          <th>Title</th>
          <td><input type="text" name="title"></td>
        </tr>
        <tr>
          <th>Content</th>
          <td><textarea name="content"></textarea></td>
        </tr>
        <tr>
          <input type="submit" value="Create">
        </tr>
      </tbody>
    </table>
  </form>
@endsection