@extends('layouts.dashboard')

@section('content')

  <table class="table" id="studentss">

    <thead class="thead-dark">
      
      <tr class="text-center">
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">CPF</th>
        <th scope="col">Ações</th>
      </tr>
    
    </thead>
    
    <tbody>

      @foreach ($students as $student)

        <tr class="text-center">

          <th scope="row">{{ $student->id }}</th>
          <td>{{ $student->name }}</td>
          <td>{{ $student->cpf }}</td>
          <td>
  
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#studentShowModal" data-url="{{ route('students') }}" data-id="{{ $student->id }}" style="width: 40px;"><i class="far fa-eye"></i></button>

              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#studentUpdateModal" data-url="{{ route('students') }}" data-id="{{ $student->id }}" style="width: 40px;"><i class="fas fa-edit"></i></button>
  
              @if ($student->status == 0)
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#studentStatusModal" data-url="{{ route('students') }}" data-status="{{ $student->status }}" data-name="{{ $student->name }}" data-id="{{ $student->id }}" style="width: 40px;"><i class="fas fa-check"></i></i></button>                
              @else
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#studentStatusModal" data-url="{{ route('students') }}" data-status="{{ $student->status }}" data-name="{{ $student->name }}" data-id="{{ $student->id }}" style="width: 40px;"><i class="fas fa-times"></i></button>
              @endif
  
          </td>
  
        </tr>
          
      @endforeach
      
    </tbody>

  </table>

  <p>&nbsp;</p>

  <div class="d-flex justify-content-center">

    {{ $students->links() }}

  </div>

  <div>

    @include('components.modals.student.register')
    @include('components.modals.student.update')
    @include('components.modals.student.show')
    @include('components.modals.student.status')

  </div>
    
@endsection