<?php

namespace App\Http\Controllers\Api;

use App\Models\Treatment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TreatmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'detail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $data = $request->all();
    
        // Gestione upload immagine
        if ($request->hasFile('detail_image')) {
            $imagePath = $request->file('detail_image')->store('treatments', 'public');
            $data['detail_image'] = $imagePath;
        }
    
        Treatment::create($data);
    
        return redirect()->route('treatments.index')->with('success', 'Trattamento aggiunto con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $treatment = Treatment::where('slug', $slug)->first();//eager loading
        //dd($treatment);
        if ($treatment){ //inserire controllo per verificare che il treatment esista
            return response()->json([
                'success' => true,
                'results' => $treatment,
            ]);
        } else {
            return response()->json([
                'success' => false, //se il treatment non esiste restituisce un errore e success = false
                'results' => 'Treatment not found',
            ]);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Treatment $treatments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Treatment $treatments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Treatment $treatments)
    {
        //
    }
}
