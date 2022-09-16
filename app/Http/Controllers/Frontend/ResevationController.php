<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use DB;
use Input;
use Illuminate\Support\Carbon;
use Symfony\Component\Console\Input\Input as InputInput;

//use PDF;
//use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf;
class ResevationController extends Controller{

    public function __construct()
    {
        // module model name, path
        $this->module_model = "App\Models\Reservation";
        $this->module_model = "App\Models\User";
   
    }
   
    public function index()
    {
        $search = Input::get('q');
        $reservations = Reservation::paginate(3);
       return view('frontend.listReservations', compact('reservations','search'));
    }
    public function addReservation(Request $request){
        $users = User::paginate(5);
      
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
        $res->save();

        $users = User::all();
        $user= new User();
        
     
        
        $user->name=$request->get('name');
        $user->lastname=$request->get('lastname');
        $user->firstname=$request->get('firstname');
        $user->birthdate=$request->get('birthdate');
        $user->email=$request->get('email');
        $user->phone=$request->get('phone');
        $user->reservation_id = $res->id;
       // $user->reservation_id=$request->get('reservation_id');
        $user->save();
        
        //return view('frontend.listUsers',compact('users'));
        return back()->with('success','Item created successfully!');
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
    public function getSearchReservation()
    {
        $search = Input::get('q');
        $output="";
      //  $now = Carbon::now(); // Or whatever date you want to use as the start date.
        //$then = $now->clone()->addDays(10); // Or whatever you want to set the end date as
       // $reservations = Reservation::whereDate('start_date', '>=', $now)->whereDate('end_date', '<=', $then)->get();
            
        $reservations=DB::table('reservations')->where('created_at','LIKE','%'.$search."%")->paginate(3);
    
        if (count($reservations)>0) 
        {
            return view('frontend.listReservations', compact('reservations','search','output'));
        }
        else{
            
           $output .= '<li class="list-group-item" align="center">'.'No results'.'</li>';
           //echo '<div class="error">Erreur détectée</div>';
          //return Response($output);
       // return view('frontend.listReservations', compact('reservations','search','output'));
          
       // return redirect('/searchReservation')
       // ->with('success','Item created successfully!',$reservations,$search);
        }
     return view('frontend.listReservations', compact('reservations','search','output'));


    } 
    public function generatePDF()
    {
        $reservations = Reservation::all();
        $pdf = PDF::loadView('frontend.listReservationspdf',compact('reservations'))->setOptions(['defaultFont' => 'sans-serif']);;
        return $pdf->download('invoice.pdf');
    }
    
}