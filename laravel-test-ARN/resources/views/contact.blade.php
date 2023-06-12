@extends('layouts.template')
@section('content')
<section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">Get in touch</h1>
                            <p class="lead fw-normal text-muted mb-0">Let's work together!</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                            @if($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>                
                            @endif
                            <form method="post" action="{{ route('contact.submit') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom*</label>
                                    <input type="text" class="form-control" id="nom" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Email*</label>
                                    <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Téléphone</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Message</label>
                                    <textarea class="form-control"  name="message" id="message" rows="5"></textarea>
                                </div>

                                <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Envoyer</button></div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection