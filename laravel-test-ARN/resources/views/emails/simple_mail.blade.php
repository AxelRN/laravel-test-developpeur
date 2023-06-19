<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste : Plage de Martinique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <section class="py-5">
                        <div class="container px-5">
                            <!-- Contact form-->
                            <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                                <div class=" mb-5">
                                    <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                                    <h1 class="fw-bolder text-center mb-5">{{ $mailData['title'] }}</h1>
                                    <p class="lead fw-normal text-muted mb-0">Nom : {{ $mailData['name'] }}</p>
                                    <p class="lead fw-normal text-muted mb-0">Email : {{ $mailData['email'] }}</p>
                                    @if($mailData['phone']!="")
                                        <p class="lead fw-normal text-muted mb-0">Téléphone : {{ $mailData['phone'] }}</p>
                                    @endif
                                    <div class="lead fw-normal text-muted mb-0 mt-5 row justify-content-around">
                                        <p class="lead fw-normal text-muted mb-0 col-md-3 col-12">Message :</p>
                                        <p class="lead fw-normal text-muted mb-0 col-md-9 col-12">{!! nl2br(e($mailData['body'])) !!}</p>
                                    </div>
                        </div>

        </section>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>
