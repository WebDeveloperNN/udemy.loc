@extends('layouts.master')

@section('content')

    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category">
                @foreach ($categories as $category)
                <option value="{{ $category['category'] }}">{{ $category['category'] }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" rows="3" style="resize: none;" name="content"></textarea>
          </div>
          <input type="submit" class="btn btn-primary" value="Submit">
    </form>



@endsection
