<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\prenotazioni;

use Illuminate\Support\Facades\DB;

class MyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prenotazioni = prenotazioni::all();

        $columns = [
           'id' => '#',
           'guest_full_name' => 'Nominativo',
           'guest_credit_card' => 'N. carta di credito',
           'room' => 'Stanza',
           'from_date' => 'Dal',
           'to_date' => 'Al',
           'more details' => 'Dettagli'
        ];

        return view('prenotazioni.index', compact('prenotazioni', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prenotazioni.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $request->validate([
         'guest_full_name' => 'required|max:255',
         'guest_credit_card' => 'required|numeric',
         'room' => 'required|numeric|max: 9999',
         'from_date' => 'required',
         'to_date' => 'required',
         'more_details' => 'required|max:9999'
      ]);

      $nuova_prenotazione = new prenotazioni();

      $nuova_prenotazione->guest_full_name = $request->input('guest_full_name');
      $nuova_prenotazione->guest_credit_card = $request->input('guest_credit_card');
      $nuova_prenotazione->room = $request->input('room');
      $nuova_prenotazione->from_date = $request->input('from_date');
      $nuova_prenotazione->to_date = $request->input('to_date');
      $nuova_prenotazione->more_details = $request->input('more_details');

      $nuova_prenotazione->save();

      return view('prenotazioni.aggiunta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $prenotazione = prenotazioni::find($id);
      return view('prenotazioni.show', compact('prenotazione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $edit_prenotazione = prenotazioni::find($id);
      return view('prenotazioni.edit', compact('edit_prenotazione'));
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

      $request->validate([
          'guest_full_name' => 'required|max:255',
          'guest_credit_card' => 'required|numeric',
          'room' => 'required|numeric|max: 9999',
          'from_date' => 'required',
          'to_date' => 'required',
          'more_details' => 'required|max:9999'
      ]);
      
      $vecchia_prenotazione = prenotazioni::find($id);

      $vecchia_prenotazione->guest_full_name = $request->input('guest_full_name');
      $vecchia_prenotazione->guest_credit_card = $request->input('guest_credit_card');
      $vecchia_prenotazione->room = $request->input('room');
      $vecchia_prenotazione->from_date = $request->input('from_date');
      $vecchia_prenotazione->to_date = $request->input('to_date');
      $vecchia_prenotazione->more_details = $request->input('more_details');

      $vecchia_prenotazione->save();

      return redirect()->route('prenotazioni.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
