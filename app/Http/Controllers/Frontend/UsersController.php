<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Input;
class UsersController extends Controller{

    public function __construct()
    {
        // module model name, path
        $this->module_model = "App\Models\User";
   
    }
    public function index()
    {
        $users = User::paginate(5);
        $search = Input::get('q');
       return view('frontend.listUsers', compact('users','search'));
     /*  $users = DB::table('users')
               // ->whereColumn('my_lang', 'default_lang')
                ->paginate(5);
                return view('frontend.listUsers', compact('users'));*/
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
            $search = Input::get('q');
            return view('frontend.listUsers', compact('users'));
           //return response('User deleted successfully.', 200);   
        }

    public function search(Request $request)
        {
            if($request->ajax())
                {
                    $output="";
                    $search = Input::get('q');
                    $res = $request->search;
                    
                    $users=DB::table('users')->where('name','LIKE','%'.$request->search."%")->paginate(5);
                   //$users=DB::table('users')->where('name','LIKE','%'.$search."%")->paginate(3);
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
                       
                        $output .= '<li class="list-group-item" align="center">'.'No results'.'</li>';
                    }
                    return Response($output);
            
                 }
        } 
    public function getSearch()
        {
            $search = Input::get('q');
            $output="";
           
            $users=DB::table('users')->where('name','LIKE','%'.$search."%")->paginate(3);
            //$users = $this->users->where('name', 'like', '%'.$search.'%')->paginate(2);
          
        // return View::make('site/libraries/list', compact('posts', 'search'));
       
            return view('frontend.listUsers', compact('users','search','output'));     
        }   

    public function destroy($id){
   
            $user = User::find($id);
            $user->delete();
            return response()->json([
              'message' => 'Data deleted successfully!'
            ]);
      
      }    
       
    }
    