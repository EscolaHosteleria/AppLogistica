<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Format;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        return view("products.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::orderBy('name')->get();
        $formats = Format::orderBy('name')->get();
        return view("products.create", ['categories' => $categories, 'formats' => $formats]);
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
        $p = new Product;
        $validated = $this->validateForm($request);
        $p->name = $validated['name'];
        $p->category_name = $validated['category_name'];
        $p->format_name = $validated['format_name'];
        $p->save();
        notify()->success('El producte s\'ha guardat correctament');
        return redirect()->action('App\Http\Controllers\ProductController@index');
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
        $product = Product::findOrFail($id);
        return view('products.show', ['product' => $product]);
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
        $categories = Category::orderBy('name')->get();
        $formats = Format::orderBy('name')->get();
        $product = Product::findOrFail($id);
        $alert = [];
        if(count(DB::table('categories')->where('name', $product->category_name)->get()) == 0){
            $alert['categoria'] = "Aquest producte té una categoria que no existeix a la base de dades!";
        }
        if(count(DB::table('formats')->where('name', $product->format_name)->get()) == 0){
            $alert['format'] = "Aquest producte té un format que no existeix a la base de dades!";
        }
        return view('products.edit', ['product' => $product, 'categories' => $categories, 'formats' => $formats, 'alert' => $alert]);
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

        $p = Product::find($id);
        $validated = $this->validateForm($request);
        $p->update($validated);
        notify()->success('El producte s\'ha modificat correctament');
        return redirect()->action('App\Http\Controllers\ProductController@show', $id);
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
        $p = Product::find($id);
        $p->delete();
        notify()->success('El producte s\'ha eliminat correctament');
        return redirect()->action('App\Http\Controllers\ProductController@index');
    }

    public function validateForm(Request $request)
    {
        return $validated = $request->validate([
            "name" => "required",
            "quantity" => "numeric",
            "category_name" => "required",
            "format_name" => "required"
        ]);
    }

    /**
     * Funció que dona les dades de la taula en json per carregar ràpid (per ajax)
     *
     * @return void
     */
    public function jsonTableIndex(){
        $products = DB::table('products')->get();

        foreach($products as $key => $product){
            if(count(DB::table('categories')->where('name', $product->category_name)->get()) == 0){
                $product->category_name = '<div class="falta-categoria">'.$product->category_name.'</div>';
            }
            if(count(DB::table('formats')->where('name', $product->format_name)->get()) == 0){
                $product->format_name = '<div class="falta-format">'.$product->format_name.'</div>';
            }
        }

        $rows = [];
        foreach ($products as $product ) {
            $actions_col = ' <form class="btn-group" role="group" aria-label="Accions" action="'.action("App\Http\Controllers\ProductController@destroy",$product->id).'" method="POST">
                        '. method_field('DELETE').' '. csrf_field().
                        '<a type="button" href="producte/'.$product->id.'" class="btn btn-info rounded-left">Mostra</a>
                        <a type="button" href="producte/'.$product->id.'/edit" class="btn btn-warning">Editar</a>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>' ;


                array_push($rows,[
                    "ID" => $product->id,
                    "Nom" => $product->name,
                    "Stock" =>$product->quantity,
                    "Categoría" => $product->category_name,
                    "Format" => $product->format_name,
                    "Accions" =>  $actions_col
                ]);
        }
        $table = [
            "rows" => $rows
        ];
        return ($table);

    }
}
