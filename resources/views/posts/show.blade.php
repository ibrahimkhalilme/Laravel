<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    {{-- Font Awesome Css CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   {{-- Parsley Css link --}}
   <link rel="stylesheet" href="{{ asset('assets/css/parsley.css') }}">
    {{--====== Class 64 ======--}}
    <style>
        .main-action{text-align: center;}
        .main-action-buttons{display: inline-block;}
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2 mt-3">
                <div class="main-text">
                    <h1 class="text-center">Post Show</h1>
                </div>
                @if ($post)
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title:</th>
                        <th scope="col">Description:</th>
                        <th scope="col">Publish</th>
                        <th scope="col">Active</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">{{ $post->id}}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->is_publish == 1 ? 'Yes' : 'No' }}</td>
                        <td>{{ $post->is_active == 1 ? 'Yes' : 'No' }}</td>
                        <td class="main-action">
                            <a href="{{ route('posts.index') }}" class="btn btn-primary main-action-buttons"><i class="fa-solid fa-rotate-left"></i></a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info main-action-buttons"><i class="fa-solid fa-pencil"></i></a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="main-action-buttons">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                @else
                <h4 class="text-center text-danger">No post Found!</h4>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
