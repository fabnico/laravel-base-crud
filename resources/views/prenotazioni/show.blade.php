@extends('layouts.main')

@section('title')
 Prenotazione
@endsection

@section('content')

<div>Nominativo: {{ $prenotazione->guest_full_name }}</div>
<div>N. carta di credito: {{ $prenotazione->guest_credit_card}}</div>
<div>Stanza: {{ $prenotazione->room }}</div>
<div>Dal: {{ $prenotazione->from_date }}</div>
<div>Al: {{ $prenotazione->to_date }}</div>
<div>Dettagli: {{ $prenotazione->more_details}}</div>

@endsection
