<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Troefl | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="/img/troefl-logo.png">
    
    @if ($title == 'Register' || $title == 'Login')
        <link rel="stylesheet" href="/css/auth.css">
    @else    
        <link rel="stylesheet" href="/css/style.css">
    @endif
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> {{-- for the three-dots font on discussion topic page --}}

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <style>
        trix-toolbar [data-trix-button-group='file-tools'] {
            display: none;
        }
    </style>
    
    <script>
        // Check if page is loaded from cache and force reload
        if (performance.navigation.type == 2) {
            // Reload the page to prevent going back to cached version
            location.reload(true);
        }
    </script>
</head>

<body>
    @if ($title == 'Register' || $title == 'Login')
        <div class="row justify-content-center align-items-center text-center text-light min-vh-100 bg-dark">
            <div class="col-md-4">@yield('auth')</div>
        </div>
    @endif
    @if ($title == 'Home')
        <div class="d-flex text-bg-dark vh-100">
            <div class="position-fixed h-100" id="sidebar">
    @else
        <div class="d-flex">
            <div class="position-fixed h-100 shadow-lg" id="sidebar">
    @endif
                @include('partials.sidebar')
            </div>
            <div class="content flex-grow-1 py-3 px-5" style="margin-left: 280px">@yield('container')</div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
