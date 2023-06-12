@extends('layouts.template')
@section('content')
<section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder text-success">Message Envoyé</h1>
                            <div class="mt-5"><a class="btn btn-primary btn-lg"  href="{{ route('plages.index') }}">Retour à la liste</a></div>
                        </div>
                    </div>
                </div>
            </section>
@endsection