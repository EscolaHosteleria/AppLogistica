<?php

namespace App\Http\Controllers;

use App\Models\Format;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FormatController extends Controller
{
    public function __construct() {
        $this->middleware('auth.adminEco');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("formats.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("formats.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $f = new Format;
        $validated = $this->validateForm($request);
        $f->name = $validated['name'];
        $f->save();
        notify()->success('El format s\'ha guardat correctament');
        return redirect()->action('App\Http\Controllers\FormatController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $format = Format::findOrFail($id);
        return view("formats.edit", ['format' => $format]);
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
        //
        $validated = $this->validateForm($request);

        $f = Format::find($id);
        $validated = $this->validateForm($request);
        $f->update($validated);
        notify()->success('La format s\'ha modificat correctament');
        return redirect()->action('App\Http\Controllers\FormatController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $f = Format::find($id);
        $f->delete();
        notify()->success('El format s\'ha eliminat correctament');
        return redirect()->action('App\Http\Controllers\FormatController@index');
    }

    public function validateForm(Request $request)
    {
        return $validated = $request->validate([
            "name" => "required"
        ]);
    }

    /**
     * Funció que dona les dades de la taula en json per carregar ràpid (per ajax)
     *
     * @return void
     */
    public function jsonTableIndex(){
        $formats = DB::table('formats')->get();


        $rows = [];
        foreach ($formats as $format ) {
            $actions_col = '<form class="btn-group" role="group" aria-label="Accions" action="'.action("App\Http\Controllers\FormatController@destroy",$format->id).'" method="POST">
                        '. method_field('DELETE').' '. csrf_field().
                        '<a type="button" href="format/'.$format->id.'/edit" class="btn btn-warning rounded-left">Editar</a>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>' ;

                array_push($rows,[
                    "ID" => $format->id,
                    "Nom" => $format->name,
                    "Accions" =>  $actions_col
                ]);
        }
        $table = [
            "rows" => $rows
        ];
        return ($table);

    }
}
