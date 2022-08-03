<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use DB;

class ResevationController extends Controller{

    public function __construct()
    {
        // module model name, path
     /*   $this->module_model = "App\Models\Reservation";
        $this->module_model = "App\Models\User";*/
   
    }
    public function index()
    {
        $reservations = Reservation::all();
       return view('frontend.listReservations', compact('reservations'));
    }
    public function getReservation($id)
    {
        $input = Reservation::find($id);
        //$detailUsersReservation = DB::table('users')->orWhere('id', $id)->orWhere('reservation_id', $id);
        $detailUsersReservation = User::orWhere('id', $id)->orWhere('reservation_id', $id)->get();
       

       // var_dump($input);
       echo '<pre>';
       var_dump($detailUsersReservation);
        echo '</pre>';
        
        //return response()->json($input);
        //return view('frontend.detailReservation', compact('detailUsersReservation','input'));
    }
}