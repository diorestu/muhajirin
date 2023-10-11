<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcaraController extends Controller
{
    public function index()
    {
        $acara = Acara::paginate();
        return view('acara.index', compact('acara'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        try {
            DB::beginTransaction();
            Acara::create($input);
            DB::commit();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
