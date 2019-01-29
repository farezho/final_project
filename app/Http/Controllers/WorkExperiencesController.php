<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Auth, Session;
use App\WorkExperience, App\UserDetail;

class WorkExperiencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /** get the user id */
        $id = Auth::user()->id;
        // dd($id);

        /** get the collection of educational backgrounds */
        $user_detail = UserDetail::where('user_id',$id)->first();
        /** get the user detail id of user, to check the relation between educational backgrounds */
        $detail_id = $user_detail->id;   // dd($detail_id);

        Session::forget('welcome');
        Session::forget('work_experiences'); // Removes session of edu_backgrounds from previous session
        return view('shared.create_workexperiences')->with('detail_id',$detail_id);
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
            'max' => 'Max characters of :attribute is 75',
            'regex' => 'The :attribute must be year format', //for year
        );

        /**check validation from input form */
        $validation = Validator::make($request->all(),[
            'company_name' => 'required|max:100',
            'job_location_city' => 'required|max:50',
            'position' => 'required|max:50',
            'start_month' => 'required',
            'start_year' => 'required|regex:/^\d{4}$/',
            'end_month' => 'required',
            'end_year' => 'required|regex:/^\d{4}$/',
            'job_desc' => 'required|max:255'   
        ], $messages);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->with('errors',$validation->errors());
        }else{
            /** insert data from input to educational_backgrounds table */
            WorkExperience::create($request->all());
            
            Session::flash("success", "Work Experience successfully added");
            return redirect()->route('userdash.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /** get the user id */
        $user_id = Auth::user()->id;
        // dd($id);

        /** get the collection of educational backgrounds */
        $user_detail = UserDetail::where('user_id',$user_id)->first();
        /** get the user detail id of user, to check the relation between educational backgrounds */
        $detail_id = $user_detail->id;   // dd($detail_id);

        $work_experiences = WorkExperience::find($id);
    
        // forget session from dashboard
        Session::forget('welcome');
        return view('shared.edit_workexperiences')->with('detail_id',$detail_id)->with('work_experiences',$work_experiences);
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
        // dd($id);
        $messages = array(
            'required' => 'The :attribute is required',
            'max' => 'Max characters of :attribute is 75',
            'regex' => 'The :attribute must be year format', //for year
        );

        /**check validation from input form */
        $validation = Validator::make($request->all(),[
            'company_name' => 'required|max:100',
            'job_location_city' => 'required|max:50',
            'position' => 'required|max:50',
            'start_month' => 'required',
            'start_year' => 'required|regex:/^\d{4}$/',
            'end_month' => 'required',
            'end_year' => 'required|regex:/^\d{4}$/',
            'job_desc' => 'required|max:255'   
        ], $messages);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->with('errors',$validation->errors());
        }else{
            /** insert data from input to educational_backgrounds table */
            Session::flash('success',"Edit success");
            WorkExperience::find($id)->update($request->all());
            
            return redirect()->route('userdash.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work_experiences = WorkExperience::find($id);
        WorkExperience::destroy($id);
        
        // Session::flash("success", "Delete success");
        return redirect()->route("userdash.index");
    }
}
