<!DOCTYPE html>
<html lang="en">
<head>
  <title>update post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @include('include.nav')
<div class="container">
  <h2> update post</h2>
  <form action="{{ route('update',$post->id) }}" method="post"  enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ $post->title }}">
    </div>
    <div class="form-group">
      <label for="description">description:</label>
      <textarea class="form-control" name="description" id="" cols="60" rows="3">{{ $post->description }}</textarea>
    </div>
    <div class="form-group">
      <label for="image">Image:</label>

      <input type="file" class="form-control" id="image" name="image">
      <img src="{{asset('assets/images/'.$post->image)}}" alt="post" style="width:200px;">
      @error('image')
        {{ $message }}
      @enderror
    </div>
    
    <div class="checkbox">
      <label><input type="checkbox" name="published" {{ ($post->published)? "checked": ""}} > Published me</label>
    </div>
    <div class="form-group">
      <label for="auther">auther:</label>
      <input type="text" class="form-control" id="auther" placeholder="Enter auther" name="auther" value="{{ $post->auther }}">
    </div>
    <button type="submit" class="btn btn-default">update</button>
  </form>
</div>

</body>
</html>
