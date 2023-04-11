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
          <td><input type="text" name="title" value="{{ old('title')}}"></td>
        </tr>
        <tr>
          <th>Content</th>
          <td><textarea name="content">{{ old('content' )}}</textarea></td>
        </tr>

        {{-- display error --}}
        @if($errors->any())
          @foreach($errors->all() as $error)
          <tr>
            <li>{{ $error }}</li>
          </tr>
          @endforeach
        @endif
      
        <tr>
          <input type="submit" value="Create">
        </tr>
      </tbody>
    </table>
  </form>
@endsection