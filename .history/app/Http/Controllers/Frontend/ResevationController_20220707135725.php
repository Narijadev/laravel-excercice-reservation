<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;

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
        $users = $this->Users->find('all', array(
            'conditions' => array('reservation_id' =>$id)));

        var_dump($input);
        var_dump($users);
        //return response()->json($input);
        //return view('frontend.detailReservation', compact('input'));
    }
}