<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Auditor;
use App\Models\AuditorRole;
use App\Models\Company;
use Illuminate\Http\Request;
use Throwable;

class CompanyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($company)
    {
        $company = Company::find(decrypt($company));
        $role = AuditorRole::where('name', 'admin')->first() ?? 1;
        $administrators = Auditor::where([['company_id', $company->id], ['role_id', $role->id]])->get();
        return view('companies.edit', compact('company', 'administrators'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $company)
    {
        $company = Company::find(decrypt($company));
        $company->update($request->all());
        $company->refresh();
        return redirect()->back()->with(['success' => 'Company updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }


    public function verification($id){
        $data = ['success' => 'Company has been verified.'];
        try{
            $company = Company::find(decrypt($id));
            if($company->is_verified){
                $result = $company->update(['is_verified' => 0]);
            }else{
                $result = $company->update(['is_verified' => 1]);
            }
        }catch(Throwable $e){
            return response()->json(['error' => $e->getMessage()]);
        }
        if (!$result){
            $data = ['error' => 'Unable to verify company.'];
        }
        return response()->json($data);
    }
}
