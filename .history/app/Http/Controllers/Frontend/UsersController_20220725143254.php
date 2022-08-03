<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
class UsersController extends Controller{

    public function __construct()
    {
        // module model name, path
        $this->module_model = "App\Models\User";
   
    }
    public function index()
    {
        $users = User::all();
       return view('frontend.listUsers', compact('users'));
    }
    public function getUser($id)
    {
        $input = User::find($id);

        //return response()->json($input);
        return view('frontend.profil', compact('input'));
    }
    public function getUserData(){
        $userData = User::get();
        return json_encode(array('data'=>$userData));
    }

    public function destroy($id)
        {
            User::find($id)->delete();
            //return view('frontend.listUsers', compact('users'));
           // return json_encode(array('statusCode'=>200));
           return response('User deleted successfully.', 200);   
        }

    public function search(Request $request)
        {
            if($request->ajax())
                {
                $output="";
                $products=DB::table('users')->where('name','LIKE','%'.$request->search."%")->get();
                if($products)
                {
                foreach ($products as $key => $product) {
                $output.='<tr>'.
                '<td>'.$product->id.'</td>'.
                '<td>'.$product->name.'</td>'.
                '<td>'.$product->lastname.'</td>'.
                '<td>'.$product->firstname.'</td>'.
                '<td>'.$product->birthdate.'</td>'.
                '<td>'.$product->phone.'</td>'.
                '<td>'.$product->email.'</td>'.
                '<td>'.'<a href="/voir/{{ $user->id }}" class="btn btn-info">Voir'.'</a>'.'</td>'.
                '<td>'.$product->email.'</td>'.
                '</tr>';
                }
            return Response($output);
            }
           }
        }    
    }
    