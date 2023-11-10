<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $todo = Todo::all(); //using $todo to call the model we created earlier to communicate with the specific table in database
        return view('index')->with('todos', $todo); // here we pass the info we retrieved to the index.blase.php page 
    }

    public function create(){
        return view('create');
    }

    public function store(){

        try{
            $this->validate(request(),[
                'name' => ['required'],
                'description' => ['required']
            ]);
        }catch (ValidationException $e){
        }

        $data = request()->all();

        $todo = new Todo();
        // on the right of (=) is the name of variable in DB
        // on the left of (=) is the name of the variable in the form/view
        $todo->name = $data['name'];
        $todo->description = $data['description'];
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

    public function loginpage(){
        return view('loginpage');
    }

    public function login(Request $req){
        $data = request()->all();

        if(auth()->attempt(['name'=>$data['loginusername'],'password'=>$data['loginpassword']])){
            return 'Working !!';
        }else{
            return 'nothing';
        }
        return view('login');
    }
}