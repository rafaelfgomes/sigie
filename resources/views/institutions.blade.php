@extends('layouts.dashboard')

@section('content')

  <table class="table">

    <thead class="thead-dark">
      
      <tr class="text-center">
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">CNPJ</th>
        <th scope="col">Ações</th>
      </tr>
    
    </thead>
    
    <tbody>

      @foreach ($institutions as $institution)

        <tr class="text-center">

          <th scope="row">{{ $institution->id }}</th>
          <td>{{ $institution->name }}</td>
          <td>{{ $institution->cnpj }}</td>
          <td>
  
            <button type="button" class="btn btn-info">I</button>
            <button type="button" class="btn btn-secondary">A</button>
            <button type="button" class="btn btn-danger">E</button>
  
          </td>
  
        </tr>
          
      @endforeach
      
    </tbody>

  </table>
    
@endsection