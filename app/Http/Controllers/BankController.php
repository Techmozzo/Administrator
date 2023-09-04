<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankRequest;
use App\Models\Bank;
use Illuminate\Http\Request;
use Throwable;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::all();
        return view('banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankRequest $request)
    {
        Bank::updateOrCreate(['name' => $request->name], $request->except('name') + ['bank_code' => 'EA-' . rand(100, 999) . rand(1000, 9999) . '-B']);
        return redirect()->route('banks.index')->with(['success' => 'Bank created successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit($bank)
    {
        $bank = Bank::find(decrypt_helper($bank));
        return view('banks.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(BankRequest $request, $bank)
    {
        $bank = Bank::find(decrypt_helper($bank));
        $bank->update($request->all());
        $bank->refresh();
        return redirect()->back()->with(['success' => 'Bank updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        //
    }

    public function verification($id)
    {
        $data = ['success' => 'Bank has been verified.'];
        try {
            $bank = Bank::find(decrypt_helper($id));
            if ($bank->is_verified) {
                $result = $bank->update(['is_verified' => 0]);
            } else {
                $result = $bank->update(['is_verified' => 1]);
            }
        } catch (Throwable $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
        if (!$result) {
            $data = ['error' => 'Unable to verify bank.'];
        }
        return response()->json($data);
    }
}
