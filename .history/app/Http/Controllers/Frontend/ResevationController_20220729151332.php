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
        
       // $data = array( 'created_at' => Carbon::now()->toDateTimeString(),'name'=>$name,'email'=>$email);
    //    DB::table('reservation')->insert($data);
        return view('frontend.ajouterReservations',compact('users'));
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
    public function store(Request $request)
    {

         $validator = \Validator::make($request->all(), [
            'lastname' => 'required',
            'firstname' => 'required',
            'birthdate' => 'required',
            'email' => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $res = new Reservation();
        $res->status= 'new';
        $res->reservation_id=$request->get('reservation_id');

        $users = User::all();
        $user= new User();
        
     

        $user->name=$request->get('name');
        $user->lastname=$request->get('lastname');
        $user->firstname=$request->get('firstname');
        $user->birthdate=$request->get('birthdate');
        $user->email=$request->get('email');
        $user->phone=$request->get('phone');
       // $user->reservation_id=$request->get('reservation_id');
        $user->save();
        $res->save();
        return view('frontend.listUsers',compact('users'));
        //return response()->json(['success'=>'Data is successfully added']);
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