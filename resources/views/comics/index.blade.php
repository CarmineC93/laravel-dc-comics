@extends('layouts.app')

@section('title', 'Tutti i Comics')

@section('content')
    <section class="bg-secondary">
        <div class="container py-4">
            <h2 class="text-center">Tutti i Comics</h2>
        </div>
    </section>

    <section>
        <div class="container mt-4">
            <div class="text-end mb-4">
                <a href="{{ route('comics.create') }}" class="btn btn-primary">Aggiungi un nuovo comix</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Price</th>
                        <th scope="col">Series</th>
                        <th scope="col">Sale Data</th>
                        <th scope="col">Type</th>
                        <th scope="col">Actions</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($comics as $comic)
                        <tr>
                            <th scope="row">{{ $comic->title }}</th>
                            <td>{{ $comic->description }}</td>
                            <td> <img src="{{ $comic->thumb }}" alt=""> </td>
                            <td>{{ $comic->price }}</td>
                            <td>{{ $comic->series }}</td>
                            <td>{{ $comic->sale_date }}</td>
                            <td>{{ $comic->type }}</td>


                            <td>
                                <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-success">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>


                                <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" data-comic-title="{{ $comic->title }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('partials.delete-modal')
    </section>
    {{-- Table --}}
@endsection
