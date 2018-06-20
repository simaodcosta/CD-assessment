<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public $timestamps = false;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($company_id = null)
    {
        $employees = Employee::all();

        $companies = null;
        if(!$company_id) {
            $companies = Company::get()->all();
        }

        return view('Employees.index',['id'=>$company_id, 'companies'=>$companies],compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null)
    {
        $companies = null;
        if(!$company_id) {
            $companies = Company::get()->all();
        }
        return view('Employees.create',['id'=>$company_id, 'companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request, $company_id = null)
    {
        // 	COMPANY | id	name	email	logo	phone
        //  EMPLOYEE | first_name	last_name	company_id	email	phone

        $employee = new Employee();
        $employee->first_name = $request->get('first_name');
        $employee->last_name = $request->get('last_name');
        $employee->company_id = $request->get('company_id');
        $employee->phone = $request->get('phone');
        $employee->email = $request->get('email');
        $employee->save();
     
        $companies = null;
        if(!$company_id) {
            $companies = Company::get()->all();
        }
        return redirect('employees',['id'=>$company_id, 'companies'=>$companies])->with('success','Employee has been added');
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
    public function edit($id, $company_id = null)
    {
        $employee = Employee::find($id);

        $companies = null;
        if(!$company_id) {
            $companies = Company::get()->all();
        }
        return view('Employees.edit',compact('employee','id'),['id'=>$company_id, 'companies'=>$companies]);
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
        $employee= Employee::find($id);
        $employee->first_name = $request->get('first_name');
        $employee->last_name = $request->get('last_name');
        $employee->company_id = $request->get('company_id');
        $employee->phone = $request->get('phone');
        $employee->email = $request->get('email');
        $employee->save();
        return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('employees')->with('success','Employee Has Been Deleted');
    }
}
