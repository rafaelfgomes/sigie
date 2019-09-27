@extends('layouts.dashboard')

@section('content')

  <table class="table" id="institutions">

    <thead class="thead-dark">
      
      <tr class="text-center">
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">CNPJ</th>
        <th scope="col">Status</th>
        <th scope="col">Ações</th>
      </tr>
    
    </thead>
    
    <tbody>

      @foreach ($institutions as $institution)

        <tr class="text-center">

          <th scope="row">{{ $institution->id }}</th>
          <td>{{ $institution->name }}</td>
          <td>{{ $institution->cnpj }}</td>
          <td>{{ $institution->status }}</td>
          <td>
  
            <button type="button" class="btn btn-info" style="width: 40px;"><i class="far fa-eye"></i></button>
            <button type="button" class="btn btn-secondary" style="width: 40px;"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-danger" style="width: 40px;"><i class="fas fa-trash"></i></button>
  
          </td>
  
        </tr>
          
      @endforeach
      
    </tbody>

  </table>
    
@endsection