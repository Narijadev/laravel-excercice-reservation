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
        $users = User::paginate(2);
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

    public function destroy2($id)
        {
            User::find($id)->delete();
            $users = User::all();
            return view('frontend.listUsers', compact('users'));
           //return response('User deleted successfully.', 200);   
        }

    public function search(Request $request)
        {
            if($request->ajax())
                {
                    $output="";
                    $users=DB::table('users')->where('name','LIKE','%'.$request->search."%")->get();
                   
                    if (count($users)>0) {
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
                    } 
                    else {
             
                        $output .= '<li class="list-group-item text-center">'.'No results'.'</li>';
                    }
                    return Response($output);
                 }
        } 
        public function destroy($id){
   
            $user = User::find($id);
            $user->delete();
            return response()->json([
              'message' => 'Data deleted successfully!'
            ]);
      
      }    
       
    }
    