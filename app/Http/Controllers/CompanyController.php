<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;

class CompanyController extends Controller
{
    //show
    public function show($id){
        $company = Company::find($id);
        return view('pages.company.show', compact('company'));
    }
    //edit
    public function edit(Company $company){
        return view('pages.company.edit', compact('company'));
    }

    //update
    public function update(Request $request, Company $company){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'latitude' => 'required',
            'longitude' => 'required',
            'radius_km' => 'required',
            'time_in' => 'required',
            'time_out' => 'required',
        ]);
        $company->update([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'radius_km' => $request->radius_km,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,
        ]);
        return redirect()->route('companies.show', $company->id)->with('success', 'Company updated successfully');

    }
}
