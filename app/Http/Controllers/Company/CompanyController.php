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

        $this->validate($request, [
            'name' => 'required',
        ]);

        $companies->name = $request->get('name');
        $companies->email = $request->get('email');
        $companies->email = $request->get('email');
     
        $avatarName = "avatar.png";
        if ($request->hasFile('select_file')) {
            $validator = $this->validate($request, [
                'select_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            ]);
            $avatarName = $companies->name.'_avatar'.time().'.'.
                            $request->file('select_file')
                                    ->getClientOriginalExtension();
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

        $this->validate($request, [
            'name' => 'required',
        ]);

        $companies->name = $request->get('name');
        $companies->email = $request->get('email');
        
        if ($request->hasFile('select_file')) {
            $this->validate($request, [
                'select_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            ]);
            $avatarName = $companies->name.'_avatar'.time().'.'.
                            $request->file('select_file')
                                    ->getClientOriginalExtension();
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
