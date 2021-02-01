@extends('layouts.main')

@section('title')
Index
@endsection


@section('content')
   <div>
      <a href="{{route('prenotazioni.create')}}">Aggiungi una nuova prenotazione</a>
   </div>
   <table class="table">
     <thead>
       <tr>
         @foreach($columns as $column)
            <th scope="col">{{$column}}</th>
         @endforeach
       </tr>
     </thead>
     <tbody>
        @foreach($prenotazioni as $prenotazione)
          <tr>
             <th scope="row">{{ $prenotazione->id }}</th>
             <td>{{ $prenotazione->guest_full_name }}</td>
             <td>{{ $prenotazione->guest_credit_card}}</td>
             <td>{{ $prenotazione->room }}</td>
             <td>{{ $prenotazione->from_date }}</td>
             <td>{{ $prenotazione->to_date }}</td>
             <td>{{ $prenotazione->more_details}}</td>
             <td><a href="{{route('prenotazioni.show', $prenotazione->id)}}">Scheda prenotazione</a></td>
             <td><a href="{{route('prenotazioni.edit', $prenotazione->id)}}">Modifica prenotazione</a></td>
          </tr>
        @endforeach
     </tbody>
   </table>
@endsection
