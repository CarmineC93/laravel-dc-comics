@extends('layouts.app')

@section('title', $comic->title)

@section('content')
    <section>
        <div class="container">
            <div class="d-flex justify-content-around pt-3">
                <h2>Comic {{ $comic->title }}</h2>

                <button class="btn btn-danger">
                    <a style="color:white; text-decoration:none" href="{{ route('comics.index') }}">Torna a tutti i Comic</a>
                </button>
            </div>

            <div class="mt-4">
                @if (!empty($comic->thumb))
                    <img class="w-25" src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
                @else
                    <p>Not Avaible</p>
                @endif
            </div>
            <dl>
                <dt>Title</dt>
                <dd>{{ $comic->title }}</dd>

                <dt>Description</dt>
                {{-- {!! !!} per evitare escape di tag html. Da usare con cautela --}}
                <p>{!! $comic->description !!}</p>

                <dt>Image</dt>
                <dd>{{ $comic->thumb }}</dd>

                <dt>Date Sale</dt>
                <dd>{{ $comic->sale_date }}</dd>

                <dt>Series</dt>
                <dd>{{ $comic->series }}</dd>

                <dt>Price</dt>
                <dd>{{ $comic->price }}</dd>

                <dt>Type</dt>
                <dd>{{ $comic->type }}</dd>
            </dl>
        </div>
    </section>
@endsection
