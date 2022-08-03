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
                    $users=DB::table('users')->where('name','LIKE','%'.$request->search."%")->get();
                    if($users)
                    {
                        foreach ($users as $key => $user) {
                        $output.='<tr>'.
                        '<td>'.$user->id.'</td>'.
                        '<td>'.$user->name.'</td>'.
                        '<td>'.$user->lastname.'</td>'.
                        '<td>'.$user->firstname.'</td>'.
                        '<td>'.$user->birthdate.'</td>'.
                        '<td>'.$user->phone.'</td>'.
                        '<td>'.$user->email.'</td>'.
                        '<td>'.'<a href="/voir/{{' .'$user->id'.' }}" class="btn btn-info">Voir'.'</a>'.'</td>'.
                        '</tr>';
                        }
                    
                    } else {
             
                        $output .= '<li class="list-group-item">'.'No results'.'</li>';
                    }
                    return Response($output);
                 }
        } 
        public function search1(Request $request){
        
            if($request->ajax()) {
              
                $data = User::where('name', 'LIKE', $request->country.'%')
                    ->get();
               
                $output = '';
               
                if (count($data)>0) {
                  
                    $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                  
                    foreach ($data as $row){
                       
                        $output .= '<li class="list-group-item">'.$row->name.'</li>';
                    }
                  
                    $output .= '</ul>';
                }
                else {
                 
                    $output .= '<li class="list-group-item">'.'No results'.'</li>';
                }
               
                return $output;
            }
        }   
    }
    