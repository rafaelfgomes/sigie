@extends('layouts.dashboard')

@section('content')

  <table class="table" id="institutions">

    <thead class="thead-dark">
      
      <tr class="text-center">
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">CPF</th>
        <th scope="col">Status</th>
        <th scope="col">Ações</th>
      </tr>
    
    </thead>
    
    <tbody>

      @foreach ($students as $student)

        <tr class="text-center">

          <th scope="row">{{ $student->id }}</th>
          <td>{{ $student->name }}</td>
          <td>{{ $student->cpf }}</td>
          <td>{{ $student->status }}</td>
          <td>
  
            <button type="button" class="btn btn-info" style="width: 40px;"><i class="far fa-eye"></i></button>
            <button type="button" class="btn btn-secondary" style="width: 40px;"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-danger" style="width: 40px;"><i class="fas fa-trash"></i></button>
  
          </td>
  
        </tr>
          
      @endforeach
      
    </tbody>

  </table>

  <p>&nbsp;</p>

  <div class="d-flex justify-content-center">

    {{ $students->links() }}

  </div>
    
@endsection