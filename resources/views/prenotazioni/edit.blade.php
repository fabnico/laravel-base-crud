@extends('layouts.main')

@section('title')

   Modifica prenotazione

@endsection

@section('content')
   <form method="POST"  action="{{route('prenotazioni.update', $edit_prenotazione)}}">
      @CSRF
      @method('PUT')
      @if ($errors->any())
         <div class="alert alert-danger">
         <ul>
      @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
      @endforeach
         </ul>
         </div>
      @endif
     <div class="form-group">
       <label for="nome">Nominativo </label>
       <input type="text" class="form-control" id="nome" name="guest_full_name" value="{{$edit_prenotazione->guest_full_name}}">
     </div>
     <div class="form-group">
       <label for="cc">N. carta di credito</label>
       <input type="text" class="form-control" id="cc" name="guest_credit_card" value="{{$edit_prenotazione->guest_credit_card}}">
     </div>
     <div class="form-group">
       <label for="stanza">Stanza</label>
       <input type="text" class="form-control" id="stanza" name="room" value="{{$edit_prenotazione->room}}">
     </div>
     <div class="form-group">
       <label for="d_inizio">Data inizio (gg/mm/aaaa)</label>
       <input type="text" class="form-control" id="d_inizio" name="from_date" value="{{$edit_prenotazione->from_date}}">
     </div>
     <div class="form-group">
       <label for="d_fine">Data fine (gg/mm/aaaa)</label>
       <input type="text" class="form-control" id="d_fine" name="to_date" value="{{$edit_prenotazione->to_date}}">
     </div>
     <div class="form-group">
       <label for="dettagli">Dettagli</label>
       <input type="text" class="form-control" id="dettagli" name="more_details" value="{{$edit_prenotazione->more_details}}">
     </div>

     <button type="submit" class="btn btn-primary">Submit</button>
   </form>
@endsection
