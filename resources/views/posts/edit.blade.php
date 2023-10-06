<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post->id }} | Edit Post</title>
    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
   {{-- Parsley Css link --}}
   <link rel="stylesheet" href="{{ asset('assets/css/parsley.css') }}">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3 mt-5">
                <h3 class="text-center">Edit Post | Post No: {{ $post->id }}</h3>

                {{-- Server site Validate --}}
                <!-- /resources/views/post/create.blade.php -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Edit Post Form -->
                {{-- Form --}}
                <form id="form" action="{{ route('posts.update', $post->id) }}" method="post">
                    @csrf
        {{--=========================== Server needs to know it's comming from Update ==================================--}}
                    {{-- Methord 1 --}}
                    {{-- @method('PUT') --}}

                    {{-- Methord 2 --}}
                    @method('PATCH')
                    {{-- For Title --}}
                    <div class="mb-3">
                      <label>Title</label>
                      <input class="form-control" type="text" name="Title" id="" value="{{ old('Title', $post->title) }}">
                    </div>

                    {{-- For Description --}}
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea class="form-control" name="Description" id="" cols="30" rows="10">{{ old('Description', $post->description) }}</textarea>
                    </div>

                    {{-- For Is Publish --}}
                      <div class="mb-3">
                        <label>Published</label>
                        <select class="form-control" name="Is_publish" id="">
                            <option value="" disabled selected>Chosse Option</option>
                            {{-- Old selected option before laravel 9 --}}
                            <option @if(old('Is_publish', $post->is_publish) == 1) selected @endif value="1">Yes</option>
                            <option @if(old('Is_publish', $post->is_publish) == 2) selected @endif value="2">No</option>
                        </select>
                    </div>

                    {{-- For Is Active --}}
                    <div class="mb-3">
                        <label>Active</label>
                        <select class="form-control" name="Is_active" id="">
                            <option value="" disabled selected>Chosse Option</option>
                            {{-- Old selected option after laravel 9 --}}
                            <option @selected(old('Is_active', $post->is_active) == 1) value="1">Yes</option>
                            <option @selected(old('Is_active', $post->is_active) == 2) value="2">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Parsley Js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script>
          $('#form').parsley();
    </script>
</body>
</html>
