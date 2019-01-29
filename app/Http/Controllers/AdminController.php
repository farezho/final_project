<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Auth, Session;
use App\User, App\UserDetail, App\EducationalBackground, App\WorkExperience, App\Document;

class AdminController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** NOT USING EAGER LOADING */
        // get all records in user detail
        // $user_detail = UserDetail::all();

        // // get document related to user detail
        // $documents = Document::all();
        
        // // $request->user()->hasRole('admin');
        // Session::flash('welcome','Welcome Admin!');
        // return view('shared.index_admin')->with(compact('username','user_detail', 'documents'));
        /** END */

        /** TRY EAGER LOADING */
        $user_detail = UserDetail::with(['edu_backgrounds','work_experience'])->get();
        $documents = Document::all();
        
        // foreach ($user_details as $details) {
        //     echo $details->full_name;
        //     foreach ($details->edu_backgrounds()->get() as $edu_list) {
        //        echo $edu_list->major;
        //     }
        // }
        return view('shared.index_admin')->with('user_detail',$user_detail)->with('documents',$documents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::find($id);
        $path_to_file = $document->file;
        // dd($path_to_file);

        return response()->download($path_to_file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documents = Document::find($id);
        return view('admin.action_cv')->with(compact('id','documents'));
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
        // dd($request);
        if (($request->status == "accept") || ($request->status == "reject")) {
           $messages = array(
                'required' => 'The :attribute is required',
                'min' => 'Minimum characters is 5',
                'max' => 'Maximum characters is 255'
           );

            $validation = Validator::make($request->all(), [
                'messages' => 'required|min:5|max:255'
            ], $messages);

            if ($validation->fails()) {
                return redirect()->back()->withInput()->with('errors',$validation->errors());
            }else{
                /** insert data from input to educational_backgrounds table */
                Session::flash('success',"Edit success");
                Document::find($id)->update($request->all());
                
                return redirect()->route('admin.index');
            }
           
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
        //
    }
}
