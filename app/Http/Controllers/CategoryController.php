<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        return view("categories.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("categories.create");
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
        $c = new Category;
        $validated = $this->validateForm($request);
        $c->name = $validated['name'];
        $c->save();
        notify()->success('La categoria s\'ha guardat correctament');
        return redirect()->action('App\Http\Controllers\CategoryController@index');
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
        $category = Category::findOrFail($id);
        return view("categories.edit", ['category' => $category]);
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

        $c = Category::find($id);
        $validated = $this->validateForm($request);
        $c->update($validated);
        notify()->success('La categoria s\'ha modificat correctament');
        return redirect()->action('App\Http\Controllers\CategoryController@index');
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
        $c = Category::find($id);
        $c->delete();
        notify()->success('La categoria s\'ha eliminat correctament');
        return redirect()->action('App\Http\Controllers\CategoryController@index');
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
        $categories = DB::table('categories')->get();

        $rows = [];
        foreach ($categories as $category ) {
            $actions_col = ' <form class="btn-group" role="group" aria-label="Accions" action="'.action("App\Http\Controllers\CategoryController@destroy",$category->id).'" method="POST">
                        '. method_field('DELETE').' '. csrf_field().
                            '<a type="button" href="categoria/'.$category->id.'/edit" class="btn btn-warning rounded-left">Editar</a>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>' ;
                    /*     <a type="button" href="categoria/{{$category->id}}/edit" class="btn btn-warning">Editar</a>
                        <form action="{{action('App\Http\Controllers\CategoryController@destroy', $category->id)}}" method="POST" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger" style="display:inline">
                                Eliminar
                            </button>
                        </form> */

                array_push($rows,[
                    "ID" => $category->id,
                    "Nom" => $category->name,
                    "Accions" =>  $actions_col
                ]);
        }
        $table = [
            "rows" => $rows
        ];
        return ($table);

    }
}
