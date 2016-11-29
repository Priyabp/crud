<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    
use App\Http\Requests;
use App\User;
use Lrs\Tracker\Locker\Repository\Statement\Repository as Statement;
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
         $data = array($user_data);
         $lrs_id = array('5837e7339a8920078d7ad481');
         $client_id = array('5837e7339a8920078d7ad482');
         $teststatements =  '{
        "version": "1.0.0",
        "id": "d1eec41f-1e93-4ed6-acbf-5c4bd0c24269",
        "actor": {
            "objectType": "Agent",
            "mbox": "mailto:joe@example.com"
        },
        "verb": {
            "id": "http://adlnet.gov/expapi/verbs/completed",
            "display": {
                "en-US": "completed"
            }
        },
        "object": {
            "objectType": "Activity",
            "id": "http://www.example.com/activities/001",
            "definition": {
                "name": {
                    "en-US": "Example Activity"
                },
                "type": "http://adlnet.gov/expapi/activities/course"
            }
        },
        "authority": {
            "objectType": "Agent",
            "name": "New Client",
            "mbox": "mailto:hello@learninglocker.net"
        },
        "stored": "2016-11-25T09:40:59.524500+00:00",
        "timestamp": "2016-11-25T09:40:59.524500+00:00"
    }';
        $result = $this->statements->store($lrs_id,$client_id,(json_decode($teststatements,true)));
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
