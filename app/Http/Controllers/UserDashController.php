<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Auth, Session;
use App\User, App\UserDetail, App\EducationalBackground, App\WorkExperience, App\Document;

class UserDashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** get the user id */
        $id = Auth::user()->id;

        /** get the collection of educational backgrounds */
        $user_detail = UserDetail::where('user_id',$id)->first();
        /** get the user detail id of user, to check the relation between educational backgrounds */
        $detail_id = $user_detail->id;
        
        /** get all records of educatonal background based on detai_id 
            this will return collection */
        $edu_backgrounds = EducationalBackground::where('detail_id',$detail_id)->get();

        /** get all records of work experience based on detai_id 
            this will return collection */
        $work_experiences = WorkExperience::where('detail_id',$detail_id)->get();

        $documents = Document::where('detail_id',$detail_id)->get();

        /** if educational backgrounds still empty, user must be fill the form */
        if ($edu_backgrounds->isEmpty()) {
            Session::flash("edu_backgrounds", "Please fill your educational backgrounds first!");
            return view('shared.index_user')->with('edu_backgrounds',$edu_backgrounds);
        }else{
            /** check work experience is null or not */
            if ($work_experiences->isEmpty()) {
                /** send the alert and redirect to view */
                Session::flash("work_experiences", "Your work experience is still empty. Please fill in, for our consideration");
                Session::flash("welcome", "Welcome to our dashboard!");
                // return view('shared.index_user')->with('edu_backgrounds',$edu_backgrounds)->with('work_experiences',$work_experiences)->with('detail_id',$detail_id);
                return view('shared.index_user')->with(compact('detail_id','edu_backgrounds','work_experiences','documents'));
            }

            /** send the alert and redirect to view */
            Session::flash("welcome", "Welcome to our dashboard!");
            return view('shared.index_user')->with(compact('detail_id','edu_backgrounds','work_experiences','documents'));
        }
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

        /** get the collection of educational backgrounds */
        $user_detail = UserDetail::where('user_id',$id)->first();
        /** get the user detail id of user, to check the relation between educational backgrounds */
        $detail_id = $user_detail->id;
        
        /** get all records of educatonal background based on detai_id 
            this will return collection */
        $edu_backgrounds = EducationalBackground::where('detail_id',$detail_id)->get();

        /** get all records of work experience based on detai_id 
            this will return collection */
        $work_experiences = WorkExperience::where('detail_id',$detail_id)->get();

        /** if educational backgrounds still empty, user must fill the form first */
        if ($edu_backgrounds->isEmpty()) {
            Session::flash("edu_backgrounds", "Please fill your educational backgrounds first before applying job!");
            return view('shared.index_user')->with('edu_backgrounds',$edu_backgrounds);
        }else{
            /** check work experience is null or not */
            if ($work_experiences->isEmpty()) {
                /** forget session from dashboard */
                Session::forget("welcome");

                /** send the alert and redirect to view */
                Session::flash("work_experiences", "Your work experience is still empty. Please fill in, for our consideration");
                return view('shared.index_apply');
            }

            Session::forget("welcome");
            return view('shared.index_apply');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation pdf
        $messages = array(
            'mimes' => 'File must be .pdf',
            'max' => 'Size of pdf max 5MB'
        );
        $validation = Validator::make($request->all(), [
            'userfile' => 'required|mimes:pdf|min:5|max:5000'
        ],$messages);

        //checl if it fails
        if ($validation->fails()) {
            return redirect()->back()->withInput()->with('errors',$validation->errors());
        }

        $document = new Document();

        //upload pdf
        $file = $request->file('userfile');
        $destination_path = 'uploads/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $file->move($destination_path,$filename);

        //save into database
        $document->detail_id = $request->detail_id;
        $document->file = $destination_path.$filename;
        $document->status = $request->status;
        $document->messages = $request->messages;
        $document->save();

        return redirect()->route('userdash.index')->with('success', 'CV uploaded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /** get the collection of educational backgrounds */
        $user_detail = UserDetail::where('user_id',$id)->first();
        /** get the user detail id of user, to check the relation between educational backgrounds */
        $detail_id = $user_detail->id;
        
        /** get all records of educatonal background based on detai_id 
            this will return collection */
        $edu_backgrounds = EducationalBackground::where('detail_id',$detail_id)->get();

        /** get all records of work experience based on detai_id 
            this will return collection */
        $work_experiences = WorkExperience::where('detail_id',$detail_id)->get();

        Session::forget('welcome');
        return view('shared.see_profile')->with(compact('user_detail','edu_backgrounds','work_experiences'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
