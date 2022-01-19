<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyValidation;
use Illuminate\Support\Facades\Storage;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(5);
    	return view('company.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyValidation $request)
    {
        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $request->logo->getClientOriginalName();
        $company->website = $request->website;
        $company->save();

        Storage::putFileAs(
            'company',
            $request->logo, 
            $request->logo->getClientOriginalName()
        );

        return redirect('/company')->with('status', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
    	return view('company.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $company = Company::find($id);
         return view('company.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyValidation $request, $id)
    {
        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        if ($request->hasFile('logo')) {
            $company->logo = $request->logo->getClientOriginalName();
        }
        $company->website = $request->website;
        $company->save();

        if ($request->hasFile('logo')) {
            Storage::putFileAs(
                'company',
                $request->logo, 
                $request->logo->getClientOriginalName()
            );
        }
        
        return redirect('/company')->with('status', 'Data berhasil terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        unlink(storage_path('app/company/'.$company->logo));
        return redirect('/company')->with('status', 'Data berhasil dihapus!');
    }
}
