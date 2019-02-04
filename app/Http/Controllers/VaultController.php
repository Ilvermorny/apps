<?php

namespace App\Http\Controllers;

use App\Bank \{
    Vault, Transaction
};
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $vaults_plucked = $vaults->pluck('name', 'forum', 'slug');
        if ($request->input('type')) {
            $vaults = Vault::where('type', $request->input('type'))->orderBy('id')->get();
        }
        $vaults->load('transactions');
        return view('bank/vaults/index', compact(['vaults', 'vaults_plucked']));
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
        $data = $request->all();
        $data['deposit_date'] = ' ';

        $vault = Vault::create($data);
        $transaction = new Transaction([
            'reason' => 'Apertura de la Bóveda',
            'request' => $request->get('request'),
            'amount' => 1000,
            'responsible' => auth()->user()->id,
            'deposit_date' => $request->get('deposit_date'),
        ]);
        $name = $vault->title;
        $vault->name = $name;
        $vault->slug = Str::slug($name);
        $vault->save();
        $vault->transactions()->save($transaction);
        \Alert::success('La bóveda se creó correctamente')
            ->button('Ver Bóveda', route('vaults.show', $vault), 'primary');
        return redirect(route('vaults.index'));
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
            $query->orderBy('deposit_date', 'asc')->paginate();
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
        return view('bank/vaults/edit', compact(['vault']));
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
        $vault->update($request->all());
        $name = $vault->title;
        $vault->name = $name;
        $vault->slug = Str::slug($name);
        $vault->save();

        \Alert::success('Los datos se actualizaron correctamente');
        return redirect(route('vaults.show', $vault->slug));
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

    public function specialRedirect($type, $forum)
    {
        $vault = Vault::where('forum', '=', $forum)->where('type', '=', $type)->firstOrFail();
        return redirect(route('vaults.show', $vault));
    }
}
