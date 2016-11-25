<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    
use App\Http\Requests;
use App\User;
use Lrs\Tracker\Locker\Repository\Statement\EloquentRepository as Statement;
use Lrs\Tracker\Http\Controllers\xAPI\StatementController;
use Lrs\Tracker\Http\Controllers\xAPI\TestController;
use Lrs\Tracker\Http\Controllers\xAPI\StatementIndexController;
use Lrs\Tracker\Http\Controllers\xAPI\StatementStoreController;

class UserController extends BaseController 
{
    // Sets constants for param keys.
    // protected $statement, $lrs;

    /**
     * Construct
     */
  
    public function __construct(Statement $statement)
    {
       
        $this->statements = $statement;
        $this->index_controller = new StatementIndexController($statement);
        $this->store_controller = new StatementStoreController($statement);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if (Auth::check()) {
            return \Redirect::to('user');
        }
        
        $test_data = User::all();
        return view('user.index')->with('test_data', $test_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('user.create');

    }

    /**
     * Show the form for creating a ne
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $input = $request->all();
         $user_data = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
        ]);
         // $result = (new TestController)->test();
         // return $result;
         $data = array($user_data);
        $result = (new StatementController)->store($data);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $test = User::findOrFail($id);
         return view('user.show')->with('test',$test);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $test = User::findOrFail($id);

        return view('user.update')->with('test',$test);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $test = User::findOrFail($id);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $input = $request->all();

        $test->fill($input)->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = User::findOrFail($id);
        $test->delete();
        return redirect()->route('user.index');
    }
}
