<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    @yield('links')
</head>
<body>
    <div class="container mt-5">
        <div class="mb-4 text-center">
            <a href="{{url('/plan')}}" class="btn btn-primary mx-1">Plan</a>
            <a href="{{url('/combo-plan')}}" class="btn btn-success mx-1">Combo Plan</a>
            <a href="{{url('/criteria')}}" class="btn btn-danger mx-1">Criteria</a>

        </div>
        @yield('content')
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('scripts')
</body>
</html>