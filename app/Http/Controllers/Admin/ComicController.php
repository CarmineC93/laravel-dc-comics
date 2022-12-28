<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validiamo i dati inseriti nel form
        // $request->validate([
        //     'title' => 'required|min:5|max:100',
        //     'description' => 'required',
        //     'thumb' => 'required',
        //     'price' => 'required',
        //     'series' => 'required',
        //     'sale_date' => 'required',
        //     'type' => 'required'
        // ]);

        // anzichè validare sia in create che in update, richiamo funzione che passa oltre alla validazione anche un messaggio 
        $data = $this->validation($request->all());
        $comic = new Comic();
        $comic->fill($data);
        // $comic->title = $data['title'];
        // $comic->description = $data['description'];
        // $comic->thumb = $data['thumb'];
        // $comic->price = $data['price'];
        // $comic->series = $data['series'];
        // $comic->sale_date = $data['sale_date'];
        // $comic->type = $data['type'];
        $comic->save();

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);
        // if ($comic === null) {
        //     abort(404);
        // }
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    //public function edit($id) or
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comic = Comic::findOrFail($id);

        //validiamo i dati inseriti nel form
        // $request->validate([
        //     'title' => 'required|min:5|max:100',
        //     'description' => 'required',
        //     'thumb' => 'required',
        //     'price' => 'required',
        //     'series' => 'required',
        //     'sale_date' => 'required',
        //     'type' => 'required'
        // ]);

        //richiamo funzione validation
        $editData = $this->validation($request->all()); //prelevo tutti i dati che sono stati inseriti nel form di edit.blade.php
        $comic->update($editData); //aggiorno i dati nel database
        return redirect()->route('comics.show', $comic->id); //reindirizzo una volta aggiornati i dati nella pagina show dell'elemento modificato
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index'); //reindirizzo poi alla pagina index
    }

    //qui una funzione che ci permatta di non riscrivere stesso codice e nel quale possiamo inserire array con messaggi di errore per ogni validazione non rispettata
    private function validation($data)
    {
        // la class Validator da usare estende Facade
        $validationResult  = Validator::make(
            $data,
            [
                'title' => 'required|min:5|max:100',
                'description' => 'required',
                'thumb' => 'required',
                'price' => 'required',
                'series' => 'required',
                'sale_date' => 'required',
                'type' => 'required'
            ],
            [
                'title.required' => 'E\' necessario inserire un titolo',
                'title.min' => 'Il titolo deve essere di almeno :min caratteri',
                'title.max' => 'Il titolo deve essere di al massimo :max caratteri',
                'description.required' => 'La descrizione è necessaria',
                'thumb.required' => 'E\' necessario inserire un percorso ad un immagine',
                'price.required' => 'E\' necessario inserire un valore numerico per il prezzo',
                'series.required' => 'E\' necessario inserire la serie',
                'sale_date.required' => 'La data è necessario inserirla in questo formato YY/MM/DD',
                'type.required' => 'E\' necessario inserire il tipo di comic'
            ]
        )->validate();
        return $validationResult;
    }
}
