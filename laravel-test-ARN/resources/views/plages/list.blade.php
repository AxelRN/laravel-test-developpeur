@extends('layouts.template')
@section('content')

    <section>
        <a href="{{ route('plages.create')}}" class="btn btn-secondary mb-3">Ajouter une plage</a>

        <form class="col-6" method="get" action="{{ route('plages.index') }}" accept-charset="UTF-8" role="search">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Trouver une plage..." value="{{ request('search') }}">
                <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Rechercher</button>
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
                                <a href="{{ route('plages.edit', $plage->id) }}" class="btn btn-primary">Modifier</a>
                                <form method="post" action="{{route('plages.destroy', $plage->id)}}" >
                                    @method('delete')
                                    @csrf
                                        <button  onclick="deleteConfirm(event)" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p>Aucun produit trouvé</p>
                @endif
            </tbody>
        </table>

        {{ $plages->links('layouts.pagination') }}


    </section>

    <script>
        function deleteConfirm(event){
            event.preventDefault();
            var form = event.target.form;
            if (confirm("Etes vous sur de vouloir supprimer cette plage?") == true) {
                form.submit();
            } else {

            }
        }
    </script>

@endsection
