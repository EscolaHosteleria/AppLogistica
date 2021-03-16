<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("users.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rols = Rol::all();
        return view("users.create", ['rols' => $rols]);
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
        $u = new User;
        $validated = $this->validateCreate($request);
        $u->name = $validated['name'];
        $u->email = $validated['email'];
        $u->password = Hash::make($validated['password']);;
        $u->rol_id = $validated['rol_id'];
        $u->save();
        notify()->success('L\'usuari s\'ha guardat correctament');
        return redirect()->action('App\Http\Controllers\UserController@index');
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
        $user = User::findOrFail($id);
        $user['rol'] = Rol::findOrFail($user->rol_id)->rol;
        return view('users.show', ['user' => $user]);
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
        $rols = Rol::all();
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user, 'rols' => $rols]);
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
        $u = User::find($id);
        $validated = $this->validateEdit($request);
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }
        $u->update($validated);
        notify()->success('L\'usuari s\'ha modificat correctament');
        return redirect()->action('App\Http\Controllers\UserController@show', $id);
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
        $u = User::find($id);
        $u->delete();
        notify()->success('L\'usuari s\'ha eliminat correctament');
        return redirect()->action('App\Http\Controllers\UserController@index');
    }

    public function validateCreate(Request $request)
    {
        return $validated = $request->validate([
        "name" => "required",
        "email" => ["required","email"],
        "password" => ["string", "min:8"],
        "rol_id" => ["required","numeric"]
        ]);
    }
    public function validateEdit(Request $request)
    {
        if(isset($request->password)){
            return $validated = $request->validate([
            "name" => "required",
            "email" => ["required","email"],
            "password" => ["string", "min:8"],
            "rol_id" => ["required","numeric"]
            ]);
        }else{
            return $validated = $request->validate([
                "name" => "required",
                "email" => ["required","email"],
                "rol_id" => ["required","numeric"]
            ]);
        }
    }


    /**
     * Funció que dona les dades de la taula en json per carregar ràpid (per ajax)
     *
     * @return void
     */
    public function jsonTableIndex()
    {
        $users = DB::table('users')->get();
        foreach ($users as $key => $user) {
            $user->rol = Rol::findOrFail($user->rol_id)->rol;
            $user->created_at = Carbon::create($user->created_at)->format('d-m-Y H:m:s');
        }

        $rows = [];
        foreach ($users as $user) {
            $actions_col = '<form class="btn-group" role="group" aria-label="Accions" action="' . action("App\Http\Controllers\UserController@destroy", $user->id) . '" method="POST">
                        ' . method_field('DELETE') . ' ' . csrf_field() .
                        '<a type="button" href="usuari/' . $user->id . '" class="btn btn-info rounded-left">Mostra</a>
                        <a type="button" href="usuari/' . $user->id . '/edit" class="btn btn-warning">Editar</a>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>';

            array_push($rows, [
                "ID" => $user->id,
                "Nom" => $user->name,
                "Correu" => $user->email,
                "Nom" => $user->name,
                "Rol" => $user->rol,
                "Creat" => $user->created_at,
                "Accions" =>  $actions_col
            ]);
        }
        $table = [
            "rows" => $rows
        ];
        return ($table);
    }
}
