<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste : Plages de Martinique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>   
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="{{ route('plages.index') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <span class="fs-4">Plages de Martinique</span>
            </a>
            
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{ route('plages.index') }}" class="nav-link {{ (request()->is('/') || request()->is('*plages*')) ? 'active' : '' }}" aria-current="page">Les plages</a></li>
                <li class="nav-item"><a href="{{ route('contact.index') }}" class="nav-link {{ (request()->is('*contact*')) ? 'active' : '' }}">Contact</a></li>
            </ul>
        </header>
        @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>
