@extends('layouts.app')

@section('title', $comic->title)

@section('content')
    <section>
        <div class="container">
            <h2>Comic {{ $comic->id }}</h2>
            <div class="mt-4">
                @if (!empty($comic->thumb))
                    <img class="w-25" src="{{ $comic->thumb }}" alt="">
                @else
                    <p>Not Avaible</p>
                @endif
            </div>
            <dl>
                <dt>Title</dt>
                <dd>{{ $comic->title }}</dd>
                <dt>Date Sale</dt>
                <dd>{{ $comic->date_sale }}</dd>
                <dt>Series</dt>
                <dd>{{ $comic->series }}</dd>
                <dt>Price</dt>
                <dd>{{ $comic->price }}</dd>
            </dl>
            {{-- {!! !!} per evitare escape di tag html. Da usare con cautela --}}
            <p>{!! $comic->description !!}</p>
        </div>
    </section>
@endsection
