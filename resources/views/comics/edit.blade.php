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
                            {{-- nel secondo parametro di old() in value, passiamo il valore originale, se il nuovo valore non è
                            conforme viene preso il preesistente valore --}}
                            <input type="text" class="form-control  @error('title') is-invalid @enderror"
                                value="{{ old('title', $comic->title) }}" id="title" name="title">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="description">Descrizione</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="5">
                                {{ old('description', $comic->description) }}
                            </textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="thumb">Immagine</label>
                            <input type="text" class="form-control  @error('thumb') is-invalid @enderror"
                                value="{{ old('thumb', $comic->thumb) }}" id="thumb" name="thumb">
                            @error('thumb')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="price">Prezzo</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror"
                                value="{{ old('price', $comic->price) }}" id="price" name="price">
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="series">Serie</label>
                            <input type="text" class="form-control @error('series') is-invalid @enderror"
                                value="{{ old('series', $comic->series) }}" id="series" name="series">
                            @error('series')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-2">
                            <label for="sale_date">Data di uscita</label>
                            <input type="text" class="form-control @error('sale_date') is-invalid @enderror"
                                value="{{ old('sale_date', $comic->sale_date) }}" id="sale_date" name="sale_date">
                            @error('sale_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="type">Tipo</label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror"
                                value="{{ old('type', $comic->type) }}" id="type" name="type">
                            @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <button class="btn btn-success" type="submit">Salva</button>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
