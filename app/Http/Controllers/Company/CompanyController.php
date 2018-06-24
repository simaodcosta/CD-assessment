<?php

namespace App\Http\Controllers\Company;

use App\Company;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public $timestamps = false;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get only 10 entries per page
        $companies = Company::paginate(10);

        return view('Companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        // 	COMPANY | id	name	email	logo	phone
        //  EMPLOYEE | first_name	last_name	company_id	email	phone
            
        $companies = new Company();

        // Since the name field is required, here is made a validation to proceed the storing of this new company
        $this->validate($request, [
            'name' => 'required',
        ]);

        $companies->name = $request->get('name');
        $companies->email = $request->get('email');
        $companies->email = $request->get('email');
     
        $avatarName = "avatar.png";
        // If a avatar was selected to upload, then:
        if ($request->hasFile('select_file')) {
            // Here is specified some extentions, max file size and some minimum dimensions (width and height)
            $validator = $this->validate($request, [
                'select_file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            ]);
            // Setting a file name to store both locally and in database
            $avatarName = $companies->name.'_avatar'.time().'.'.
                            $request->file('select_file')
                                    ->getClientOriginalExtension();
            // Copy avatar/logo to public folder
            $request->file('select_file')
                    ->storeAs('/images/avatar/',$avatarName);
        }

        $companies->logo = $avatarName;
        $companies->phone = $request->get('phone');
        $companies->save();

        $request->session()->flash('success_edit_company','Saved succesfully!');
        
        return redirect('companies')->with('success','Company has been added');
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
        $companies = Company::find($id);
        return view('Companies.edit',compact('companies','id'));
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
        $companies= Company::find($id);

        // Since the name field is required, here is made a validation to proceed the storing of this new company
        $this->validate($request, [
            'name' => 'required',
        ]);

        $companies->name = $request->get('name');
        $companies->email = $request->get('email');
        
        // If a avatar was selected to upload, then:
        if ($request->hasFile('select_file')) {
            // Here is specified some extentions, max file size and some minimum dimensions (width and height)
            $this->validate($request, [
                'select_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            ]);
            // Setting a file name to store both locally and in database
            $avatarName = $companies->name.'_avatar'.time().'.'.
                            $request->file('select_file')
                                    ->getClientOriginalExtension();
            // Copy avatar/logo to public folder
            $request->file('select_file')
                    ->storeAs('/images/avatar/',$avatarName);

            $companies->logo = $avatarName;
        }

        $companies->phone = $request->get('phone');
        $companies->save();

        $request->session()->flash('success_edit_company','Saved succesfully!');
        
        return back()->with('companies','id');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $company_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($company_id)
    {
        $companies = Company::find($company_id);
        $companies->delete();
        return redirect('companies')->with('success','Company Has Been Deleted');
    }
}
