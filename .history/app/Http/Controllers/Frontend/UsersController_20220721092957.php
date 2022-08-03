<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

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
            return view('frontend.listUsers', compact('users'));
           // return json_encode(array('statusCode'=>200));
           return response('User deleted successfully.', 200);   
        }
    }