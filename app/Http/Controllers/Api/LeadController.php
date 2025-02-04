<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Lead; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\NewMail;
use Illuminate\Support\Facades\Validator;



class LeadController extends Controller
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
        $data = $request->all();

        /* INSERT HERE VALIDATIONS */
        $validator = Validator::make($data, [
            'name' => 'required|string|min:2|max:255',
            'address' => 'required|email|max:255',
            'message' => 'required|string|min:5'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                // 'message' => $validator->errors(),
                // la funzione errors() della classe Validator resituisce un array
                // in cui la chiave è il campo soggetto a validazione
                // e il valore è un array di messaggi di errore
                'errors' => $validator->errors()
            ], 400);
        }

        $lead = new Lead();
        $lead->fill ($data);
        $lead->save();

        Mail::to('info@lillaedettandlakarcenter.se')->send(new NewMail($lead)); // serve per mandare l'email all'indirizzo fornito
        Log::info('Email sent to info@lillaedettandlakarcenter.se');

        return response()->json([ // restituisce una risposta dal controller al client che ha effettuato la richiestas HTTP, l'array associativo passato come argomento a questo metodo viene convertito in JSON
            'status' => 'success',
            'message' => 'Ok',
            'lead_id' => $lead->id, // Ritorna solo l'ID
        ], 200);
    }

    
    public function latest()
    {
        $lead = Lead::latest()->first(); // Ottiene l'ultimo lead registrato

        if (!$lead) {
            return response()->json([
                'success' => false,
                'message' => 'No lead found',
                'result' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Last lead found',
            'result' => $lead,
        ], 200);
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
