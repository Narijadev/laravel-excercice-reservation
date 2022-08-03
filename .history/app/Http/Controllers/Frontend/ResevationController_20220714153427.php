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
        $this->module_model = "App\Models\Reservation";
        $this->module_model = "App\Models\User";
   
    }
   
    public function index()
    {
        $reservations = Reservation::all();
       return view('frontend.listReservations', compact('reservations'));
    }
    public function getReservation($id ,Request $request)
    {
        $reservation = DB::table('users')->orWhere('reservation_id', $id)->orWhere('reservation_id', $id)->get();
        $search = $request->query();
        /* if (isset($search['status'])) {
                if ($search['status'] === 'new') {
                    $reservation = DB::table('users')->orWhere('reservation_id', $id)->orWhere('reservation_id', $id)->get();
                 // return view('frontend.detailReservation', compact('reservation'));
                
              } else {
                    echo 'aaaa';
                  //  return view('frontend.detailReservation', compact('reservation'));
                }
            }
            echo '<pre>';
                 var_dump($reservation);
            echo '</pre>';*/
    }
}