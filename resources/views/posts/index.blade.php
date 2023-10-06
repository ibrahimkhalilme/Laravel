<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    {{-- Font Awesome Css CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   {{-- Parsley Css link --}}
   <link rel="stylesheet" href="{{ asset('assets/css/parsley.css') }}">
   {{-- Toaster css --}}
   <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">

    {{--====== Class 63 ======--}}
    <style>
        .main-action{text-align: center;}
        .main-action-buttons{display: inline-block;}
    </style>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-10 offset-1 mt-3">
            <h1 class="text-center">Posts</h1>

            {{--====== (Create Successful message) ======--}}
            @if (Session::has('alert-success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session::get('alert-success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        {{--====== Class 67 (Updated Successful message) ======--}}
            @if (Session::has('alert-info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session::get('alert-info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{--====== Class 68 (Delete Successful message) ======--}}
            @if (Session::has('alert-danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session::get('alert-danger') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{--====== Class 73 (Soft Delete Post Restored success message) ======--}}
            @if (Session::has('alert-message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session::get('alert-message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            {{--====== Class 74 (Soft Deleted Post Permanently delete success message) ======--}}
            @if (Session::has('permanently-delete'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session::get('permanently-delete') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            @if (count($posts) > 0)
            <table class="table table-bordered mt-5">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Publish</th>
                    <th scope="col">Active</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="fw-bold">{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ Str::limit($post->description, '15', '...') }}</td>
                            <td>{{ $post->is_publish == 1 ? 'Yes' : 'No' }}</td>
                            <td>{{ $post->is_active == 1 ? 'Yes' : 'No'}}</td>
                            <td class="main-action">
                                <a class="btn btn-success main-action-buttons" href="{{ route('posts.show', $post->id) }}"><i class="fa-solid fa-eye"></i></a>
                                <a class="btn btn-info main-action-buttons" href="{{ route('posts.edit', $post->id) }}"><i class="fa-solid fa-pencil"></i></a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="main-action-buttons">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>

                                {{--=========================== Class 74 (Undo/Permannrntly delete button will show when post is Soft-Deleted) ==================================--}}
                                @if($post->trashed())
                                    {{-- Restore Button --}}
                                    <a class="btn btn-warning main-action-buttons" href="{{ route('posts.soft-delete', $post->id) }}"><i class="fa-solid fa-undo"></i></a>
                                    {{-- Permanently Delete Button --}}
                                    <a class="btn btn-secondary main-action-buttons" href="{{ route('posts.permanently-delete', $post->id) }}"><i class="fa-solid fa-delete-left"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h4 class="text-center text-danger mt-3">No Posts Found! :(</h4>
            @endif

        {{--=========================== Class 61 (Adding pagination for lots of posts) ==================================--}}
        {{-- Pagination has multiple methords --}}
        {{-- Methord 1 --}}
        {{-- {{ $posts->render() }} --}}

        {{-- Methord 2 --}}
        {{-- {{ $posts->links() }} --}}

        {{--=========================== Class 62 (Number Pagination) ==================================--}}
        {{-- Number Pagination has multiple methords --}}
        {{-- Methord 1 --}}
        {{-- {{ $posts->onEachSide(1)->links() }} --}}

        {{-- Methord 2 --}}
        {{ $posts->onEachSide(1)->render() }}

        </div>
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-success">Create post</a>
        </div>
    </div>
</div>


{{-- Jquery CDN by Hosted libraries --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

{{-- Parsley Js CDN --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('#form').parsley();
</script>

<!-- Bootstrap CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

{{-- Toastr js --}}
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>


{{-- Toastr Custom design --}}
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>

<script>
    // Post Create Successfull message
    @if (Session::has('alert-success'))
        toastr["success"]("{{ Session::get('alert-success') }}");
    @endif

    // Post Update Successfull message
    @if (Session::has('alert-info'))
        toastr["info"]("{{ Session::get('alert-info') }}");
    @endif

    // Post Delete Successfull message
    @if (Session::has('alert-danger'))
        toastr["error"]("{{ Session::get('alert-danger') }}");
    @endif

    // Soft Deleted post restored success message
    @if (Session::has('alert-message'))
        toastr["success"]("{{ Session::get('alert-message') }}");
    @endif

    // Soft Deleted post restored success message
    @if (Session::has('permanently-delete'))
        toastr["success"]("{{ Session::get('permanently-delete') }}");
    @endif
</script>

</body>
</html>
