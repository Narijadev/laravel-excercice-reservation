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
    public function addReservation(Request $request){
        $users = User::all();
      
        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $firstname = $request->input('firstname');
        $nom = $request->input('name');
        $email = $request->input('email');              
        
        $data = array( 'created_at' => Carbon::now()->toDateTimeString(),'name'=>$name,'email'=>$email);
        DB::table('reservation')->insert($data);
        return view('frontend.ajouterReservations',compact('users','data'));
    }
    public function insertionReservation($id, Request $request){
        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $firstname = $request->input('firstname');
        $nom = $request->input('name');
        $email = $request->input('email');              
        
        $data = array( 'created_at' => Carbon::now()->toDateTimeString(),'name'=>$name,'email'=>$email);
        DB::table('reservation')->insert($data);
    }
    public function getReservation($id ,Request $request)
    {
       // $search = $request->query();
        $reservation = DB::table('users')->orWhere('reservation_id', $id)->get();
        
        return view('frontend.detailReservation', compact('reservation'));
        /* if (isset($search['status'])) {
                if ($search['status'] === 'new') {
                    $reservation = DB::table('users')->orWhere('reservation_id', $id)->orWhere('reservation_id', $id)->get();
                 // return view('frontend.detailReservation', compact('reservation'));
                
              } else {
                    echo 'aaaa';
                  //  return view('frontend.detailReservation', compact('reservation'));
                }
            }
            */
          /*  echo '<pre>';
                 var_dump($reservation);
            echo '</pre>';
            echo '<pre>';
                var_dump($search);
             echo '</pre>';*/
    }
    
}