<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Auth, Session;
use App\EducationalBackground, App\UserDetail;

class EduBackgroundsController extends Controller
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
        Session::forget('edu_backgrounds'); // Removes session of edu_backgrounds from previous session
        Session::forget('work_experiences');
        return view('shared.create_edubackgrounds')->with('detail_id',$detail_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** if degree of user is not bachelor or magister, the major and gpa is null.
         * if degree of user is bachelor or magister, the major and gpa is required.
         * Set gpa to zero */
        if (($request->degree == "bachelor") || ($request->degree == "magister")) {
            $messages = array(
                'required' => 'The :attribute is required',
                'max' => 'Max characters of :attribute is 75',
                'regex' => 'The :attribute must be year format', //for year
                'gpa.regex' => 'The :attribute must be number, or u can use dot for double'
            );
    
            /**check validation from input form */
            $validation = Validator::make($request->all(),[
                'degree' => 'required',
                'institution_name' => 'required|max:75',
                'major' => 'required',
                'start_year' => 'required|regex:/^\d{4}$/',
                'completion_year' => 'required|regex:/^\d{4}$/',
                'gpa' => 'required|regex:/^[0-9]+(\\.[0-9]+)?$/'
            ], $messages);

            if ($validation->fails()) {
                return redirect()->back()->withInput()->with('errors',$validation->errors());
            }else{
                /** insert data from input to educational_backgrounds table */
                EducationalBackground::create($request->all());
                
                return redirect()->route('userdash.index');
            }
        }else{
            /** set gpa to zero */
            $request->gpa = 0;
            $messages = array(
                'required' => 'The :attribute is required',
                'max' => 'Max characters of :attribute is 75',
                'regex' => 'The :attribute must be year format', //for year
            );
    
            /**check validation from input form */
            $validation = Validator::make($request->all(),[
                'degree' => 'required',
                'institution_name' => 'required|max:75',
                'start_year' => 'required|regex:/^\d{4}$/',
                'completion_year' => 'required|regex:/^\d{4}$/',
            ], $messages);

            if ($validation->fails()) {
                return redirect()->back()->withInput()->with('errors',$validation->errors());
            }else{
                /** insert data from input to educational_backgrounds table */
                EducationalBackground::create($request->all());
                
                return redirect()->route('userdash.index');
            }
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
        /** forget previous session from dashboard */
        Session::forget('welcome');
        Session::forget('work_experiences');

        /** get the user id */
        $user_id = Auth::user()->id;
        // dd($id);

        /** get the collection of educational backgrounds */
        $user_detail = UserDetail::where('user_id',$user_id)->first();
        /** get the user detail id of user, to check the relation between educational backgrounds */
        $detail_id = $user_detail->id;   // dd($detail_id);

        $edu_backgrounds = EducationalBackground::find($id);
    
        return view('shared.edit_edubackgrounds')->with('detail_id',$detail_id)->with('edu_backgrounds',$edu_backgrounds);
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
        /** if degree of user is not bachelor or magister, the gpa and major is null.
         * and if degree of user is bachelor or magister, major and gpa field is required
         */
        if (($request->degree == "bachelor") || ($request->degree == "magister")) {
            $messages = array(
                'required' => 'The :attribute is required',
                'max' => 'Max characters of :attribute is 75',
                'regex' => 'The :attribute must be year format', //for year
                'gpa.regex' => 'The :attribute must be number, or u can use dot for double'
            );
    
            /**check validation from input form */
            $validation = Validator::make($request->all(),[
                'degree' => 'required',
                'institution_name' => 'required|max:75',
                'major' => 'required',
                'start_year' => 'required|regex:/^\d{4}$/',
                'completion_year' => 'required|regex:/^\d{4}$/',
                'gpa' => 'required|regex:/^[0-9]+(\\.[0-9]+)?$/'
            ], $messages);

            if ($validation->fails()) {
                return redirect()->back()->withInput()->with('errors',$validation->errors());
            }else{
                /** insert data from input to educational_backgrounds table */
                Session::flash('success',"Edit success");
                EducationalBackground::find($id)->update($request->all());
                
                return redirect()->route('userdash.index');
            }
        }else{
            /** set gpa to zero */
            $request->gpa = 0;
            $messages = array(
                'required' => 'The :attribute is required',
                'max' => 'Max characters of :attribute is 75',
                'regex' => 'The :attribute must be year format', //for year
            );
    
            /**check validation from input form */
            $validation = Validator::make($request->all(),[
                'degree' => 'required',
                'institution_name' => 'required|max:75',
                'start_year' => 'required|regex:/^\d{4}$/',
                'completion_year' => 'required|regex:/^\d{4}$/',
            ], $messages);

            if ($validation->fails()) {
                return redirect()->back()->withInput()->with('errors',$validation->errors());
            }else{
                /** insert data from input to educational_backgrounds table */
                Session::flash('success',"Edit success");
                EducationalBackground::find($id)->update($request->all());
                
                return redirect()->route('userdash.index');
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
        $edu_backgrounds = EducationalBackground::find($id);
        EducationalBackground::destroy($id);
        
        // Session::flash("success", "Delete success");
        return redirect()->route("userdash.index");
    }
}
