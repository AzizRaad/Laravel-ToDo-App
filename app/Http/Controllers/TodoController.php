<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{

    public function index(User $pizza){
        //$todo = DB::select("SELECT * FROM todos WHERE user_id = ?",[auth()->id()]);
        $todo = DB::table('todos')->select('*')->where('user_id','=',auth()->id())->latest()->get(); //using $todo to call the model we created earlier to communicate with the specific table in database
        //return $todo;
        return view('index')->with('todos',$todo);
        //return $pizza->todos()->get();
        // return view('index',['todos' => $pizza->todos()->orderBy('created_at')]); #,['todos' => $pizza->todos()->latest()->get()]
    }

    public function create(){
        return view('create');
    }

    public function store(Request $req){

        try{
            $this->validate(request(),[
                'name' => ['required'],
                'description' => ['required']
            ]);
        }catch (ValidationException $e){
        }

        $data = request()->all();
        
        $todo = new Todo();
        // on the left of (=) is the name of variable in DB
        // on the right of (=) is the name of the variable in the form/view
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->user_id = auth()->id();
        $todo->save();

        session()->flash('success', 'todo created succesfully'); // first argument is the name of var, the second is the message
        return redirect('/');
    }

    public function details(Todo $todo){
        return view('details')->with('todos',$todo);
    }

    public function edit(Todo $todo){
        return view('edit')->with('todos',$todo);
    }

    public function update(Todo $todo){

        try{
            $this->validate(
                request(),
                ['name'=>['required'],'description'=>['required'],]
            );
        }catch(ValidationException $e){}

        $data = request()->all();

        $todo->name =$data['name'];
        $todo->description = $data['description'];
        $todo->user_id = auth()->id();
        $todo->save();

        session()->flash('success','Todo updated succesfully');

        return redirect ('/');
    }

    public function delete(Todo $todo){
        $todo->delete();
        return redirect('/');
    }

    public function signup(){
        return view('signup');
    }

    public function register(){
        $data = request()->all();

        $user = new User();
        $user->name = $data['username'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->password = $data['password'];
        $user->save();

        return redirect('/');
    }

    public function CorrectHomepage(){
        if(auth()->check()){
            return view('homepage-feed');
        }else{
            return view('index');
        }
    }

    public function loginpage(){
        return view('loginpage');
    }

    public function login(Request $req){
        $data = $req -> validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if(auth()->attempt(['name'=>$data['loginusername'],'password'=>$data['loginpassword']])){
            $req->session()->regenerate();
            $username = $req['loginusername'] ;
            $welcomeText = "Welcome, {$username} you successfully logged in";
            return redirect('/')->with('success',$welcomeText);
        }else{
            return redirect('/loginpage')->with('failure', 'Wrong Credentials, please try again');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','Successfully Logged Out');
    }
}