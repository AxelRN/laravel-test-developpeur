@extends('layouts.template')
@section('content')

    <section>
        <a href="{{ route('plages.create')}}" class="btn btn-secondary mb-3">Ajouter une plage</a>
        
        <form class="col-6" method="get" action="{{ route('plages.index') }}" accept-charset="UTF-8" role="search">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Chercher une plage..." value="{{ request('search') }}">
                <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        @if($message = Session::get('success'))
            <div class="col-12 alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Commune</th>
                <th scope="col">Description</th>
                <th scope="col" style="width: 250px">Actions</th>
            </tr>
            </thead>
            <tbody>
                @if (count($plages) > 0)
                    @foreach($plages as $plage)
                        <tr>
                            <th scope="row">{{$plage->id}}</th>
                            <td>{{$plage->name}}</td>
                            <td>{{$plage->commune_name}}</td>
                            <td>{!!$plage->description!!}</td>
                            <td>
                                <a href="edit.html" class="btn btn-primary">Modifier</a>
                                <button type="button" class="btn btn-danger">Supprimer</button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p>Aucun produit trouvé</p>
                @endif
            </tbody>
        </table>


        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p class="small text-muted">
                    Showing
                    <span class="fw-semibold">1</span>
                    to
                    <span class="fw-semibold">5</span>
                    of
                    <span class="fw-semibold">72</span>
                    results
                </p>
            </div>

            <div>
                {{ $plages->links('layouts.pagination') }}
                
            </div>
        </div>
    </section>

@endsection