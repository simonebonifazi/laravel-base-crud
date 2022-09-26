<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

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
        //raccolgo i dati in una variabile $data in forma di array associativo
        $data = $request->all();

        //! aggiungo validazione, dove se non rispettata non si esegue il codice a seguire (sotto)
        $request->validate([
            //elenco i valori delle colonne che coincidono con gli attributi name e for e id del form, 
            'title' => 'required|string', //assegnandogli un set di regole
            'description' => 'required|string',
            'thumb' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'sale_date' => 'nullable|date',
            'series' => 'required|string',
            'type' => 'required|string',
           
        ], //qui posso passare un parametro opzionale con il quale customizzare gli errori
        [
            // :attribute è un 'jolly' che riempre il campo con il nome dell'attributo puntato
            'required' => 'Attenzione, il campo :attribute è obbbligatorio',
            //con title.regoladarispettare vado a customizzare il mio errore specifico per il singolo attributo, con il mio messaggio
            'title.required' => 'Attenzione, hai lasciato libero il campo obbbligatorio titolo . Controlla e riprova',
            'price.required' => 'Attenzione, hai lasciato libero il campo obbbligatorio Prezzo. Controlla e riprova',
            'series.required' => 'Attenzione, hai lasciato libero il campo obbbligatorio Serie. Controlla e riprova',
            'type.required' => 'Attenzione, hai lasciato libero il campo obbbligatorio Tipo. Controlla e riprova',
        ]);
    

        //creo una nuova istanza di fumetto a)
        $comic= new Comic();
        //compilo l'istanza con gli attributi b)
        $comic->fill($data);
        //salvo nel db c)
        $comic->save();
        /**
         * o anche: $comic = Comic::create($data); che assolve funzione di a),b) e c)
         */
        //reindirizzo
        return redirect()->route('comics.index');
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
        return view('comics.show' , compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);
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

           $request->validate([
            'title' => 'required|string', 
            'description' => 'required|string',
            'thumb' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'sale_date' => 'nullable|date',
            'series' => 'required|string',
            'type' => 'required|string',
           
        ], 
        [
            'required' => 'Attenzione, il campo :attribute è obbbligatorio',
            'title.required' => 'Attenzione, hai lasciato libero il campo obbbligatorio titolo . Controlla e riprova',
            'price.required' => 'Attenzione, hai lasciato libero il campo obbbligatorio Prezzo. Controlla e riprova',
            'series.required' => 'Attenzione, hai lasciato libero il campo obbbligatorio Serie. Controlla e riprova',
            'type.required' => 'Attenzione, hai lasciato libero il campo obbbligatorio Tipo. Controlla e riprova',
        ]);
        
        $data = $request->all();

        $comic->fill($data);

        $comic->save();

        return redirect()->route('comics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comic $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        //!possibile anche lasciando $id come parametro + nella funzione Comic::destroy($id) 
        $comic->delete();

        return redirect()->route('comics.index');
    }
}