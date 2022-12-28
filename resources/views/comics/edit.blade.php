@extends('layouts.app')

@section('title', 'Modifica il Comic')

@section('content')
    <section>
        <div class="container">
            <h2 class="text-center">Modifica Comic: {{ $comic->title }}</h2>
            <div class="row justify-content-center">
                {{-- in caso di non corrispondenza con la validazione, mostrare errore --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-7 mb-5">
                    <form action="{{ route('comics.update', $comic->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-2">
                            <label for="title">Titolo</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $comic->title }}">
                        </div>

                        <div class="mb-2">
                            <label for="description">Descrizione</label>
                            <textarea class="form-control" id="description" name="description" rows="5">
                                {{ $comic->description }}
                            </textarea>
                        </div>

                        <div class="mb-2">
                            <label for="thumb">Immagine</label>
                            <input type="text" class="form-control" id="thumb" name="thumb"
                                value="{{ $comic->thumb }}">
                        </div>

                        <div class="mb-2">
                            <label for="price">Prezzo</label>
                            <input type="text" class="form-control" id="price" name="price"
                                value="{{ $comic->price }}">
                        </div>

                        <div class="mb-2">
                            <label for="series">Serie</label>
                            <input type="text" class="form-control" id="series" name="series"
                                value="{{ $comic->series }}">
                        </div>


                        <div class="mb-2">
                            <label for="sale_date">Data di uscita</label>
                            <input type="text" class="form-control" id="sale_date" name="sale_date"
                                value="{{ $comic->sale_date }}">
                        </div>

                        <div class="mb-2">
                            <label for="type">Tipo</label>
                            <input type="text" class="form-control" id="type" name="type"
                                value="{{ $comic->type }}">
                        </div>


                        <button class="btn btn-success" type="submit">Salva</button>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
