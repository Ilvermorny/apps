<?php

namespace App\Http\Controllers;

use App\Bank\Vault;
use Illuminate\Http\Request;

class VaultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vaults = Vault::all();
        if ($request->input('type')) {
            $vaults = Vault::where('type', $request->input('type'))->orderBy('id')->get();
        }
        $vaults->load('transactions');
        return view('bank/vaults/index', compact('vaults'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank/vaults/create');
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
     * @param  \App\Bank\Vault  $vault
     * @return \Illuminate\Http\Response
     */
    public function show(Vault $vault)
    {
        $vault->load(['transactions' => function ($query) {
            $query->orderBy('deposit_date', 'asc');
        }]);
        return view('bank/vaults/show', compact('vault'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bank\Vault  $vault
     * @return \Illuminate\Http\Response
     */
    public function edit(Vault $vault)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bank\Vault  $vault
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vault $vault)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank\Vault  $vault
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vault $vault)
    {
        //
    }
}
