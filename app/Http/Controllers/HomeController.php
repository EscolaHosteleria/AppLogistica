<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userRol = Auth::user()->rol->rol;
        if ($userRol == 'Administrador' || $userRol == 'Economat') {
            return redirect()->action('App\Http\Controllers\OrderController@index');
        }
        $day = Carbon::now()->setTimeZone("Europe/Madrid")->startOfWeek();
        
        $weeks[0]['monday'] = $day->format('Y-m-d');
        $weeks[0]['friday'] = $day->next('Friday')->format('Y-m-d');
        $weeks[0]['week'] = 'Setmana del ' . $day->startOfWeek()->format('d-m-Y') . ' al ' .
         $day->next('Friday')->format('d-m-Y') . '';
        for($i = 1 ; $i < 5 ; $i++){
            $weeks[$i]['monday'] = $day->nextWeekday()->format('Y-m-d');
            $weeks[$i]['friday'] = $day->next('Friday')->format('Y-m-d');
            $weeks[$i]['week'] = 'Setmana del ' . $day->startOfWeek()->format('d-m-Y') . ' al ' .
            $day->next('Friday')->format('d-m-Y');
        }
        $professors_db = DB::table('users')->where('rol_id', DB::table('rols')->where('rol','Professorat')->first()->id)->orderBy('name')->get();
        for($i = 0 ; $i < count($professors_db); $i++){
            $professors[$i]['name'] = $professors_db[$i]->name;
        }
        return view("index", ["weeks" => $weeks, "professors" => $professors]);
    }
}
