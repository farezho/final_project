<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Auth, Session;
use App\User, App\UserDetail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:user'); because we already use the auth in route
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** get the id of user */
        $id = Auth::user()->id;
        // dd($id);

        /** get the collection of user details */
        $profiles = User::find($id)->user_details;
        // dd($profiles);

        /** check if user details alredy complete */
        if ($profiles == null) {
            Session::flash("notice","Please fill your profile first");
            return redirect()->route('create-profiles');
        }else{
            // THIS MUST BE REDIRECT TO USER DASHBOARD
            // AND THEN WE CHECK THE EDUCATIONAL BACKGROUNDS STILL EMPTY OR NOT
            // CHANGE IT LATER FAREZHO

            return redirect()->route('userdash.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /** get the id of user */
        $id = Auth::user()->id;
        // dd($id);

        /** get the collection of user details */
        $profiles = User::find($id)->user_details;
        // dd($profiles);

        return view('shared.form_profiles')->with('id',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = array(
            'required' => 'The :attribute is required',
            'before' => 'Sorry, you must be 17 y.o or above',
            'max' => 'Max characters of :attribute is 255'
        );

        /**check validation from input form */
        $validation = Validator::make($request->all(),[
            'full_name' => 'required|max:255',
            'gender' => 'required',
            'birthday_place' => 'required|min:3|max:200',
            'birthday_date' => 'required|date|before:-17 years',
            'phone_number' => 'required|max:12',
            'address' => 'required'
        ], $messages);

        /**check if validation is fail */
        if ($validation->fails()) {
            return redirect()->back()->withInput()->with('errors',$validation->errors());
        }else{
            /** insert data from input to user_detail table */
            UserDetail::create($request->all());
            
            return redirect()->route('user.index');
        }
    }

}
