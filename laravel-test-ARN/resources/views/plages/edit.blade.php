@extends('layouts.template')
@section('content')

    <section>
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>                
        @endif
        <form method="post" action="{{ route('plages.update', $plage->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nom" class="form-label">Nom*</label>
                <input type="text" class="form-control" id="nom" name="name" value="{{ $plage->name }}" required>
            </div>
            <div class="mb-3">
                <label for="commune" class="form-label">Commune*</label>
                <select class="form-select" id="commune" name="zip" required>
                    @if (count($communes) > 0)
                        <option disable>Choisissez une commune</option>
                        @foreach($communes as $commune)
                            <option {{ (isset($plage->zip) && $plage->zip == $commune->zip ? 'selected':'' ) }} value="{{ $commune->zip }}">{{ $commune->name }}</option>
                        @endforeach
                    @else
                        <option disable>Aucune commune trouvée</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control"  name="description" id="description" rows="15">{{ $plage->description }}</textarea>
            </div>

            <input type="hidden" name="hidden_id" value="{{$plage->id}}">

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

    </section>



<script>
    $(document).ready(function() {
        $('#description').summernote({
            tabsize: 10,
            height: 100
        });
    });
</script>
@endsection