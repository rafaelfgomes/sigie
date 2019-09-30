@extends('layouts.dashboard')

@section('content')

  <div class="row">

    <div class="col">

        <h1 class="text-center mb-4">Instituições</h1>

    </div>

    <div class="col text-right">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#institutionRegisterModal" data-url="{{ route('institutions') }}">Adicionar nova instituição</button>

    </div>
  
  </div>

  <table class="table" id="institutions">

    <thead class="thead-dark">
      
      <tr class="text-center">
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Ações</th>
      </tr>
    
    </thead>
    
    <tbody>

      @foreach ($institutions as $institution)

        <tr class="text-center">

          <th scope="row">{{ $institution->id }}</th>
            <td>{{ $institution->name }}</td>
          <td>
  
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#institutionShowModal" data-url="{{ route('institutions') }}" data-id="{{ $institution->id }}" style="width: 40px;"><i class="far fa-eye"></i></button>

            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#institutionUpdateModal" data-url="{{ route('institutions') }}" data-id="{{ $institution->id }}" style="width: 40px;"><i class="fas fa-edit"></i></button>

            @if ($institution->status == 0)
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#institutionStatusModal" data-url="{{ route('institutions') }}" data-status="{{ $institution->status }}" data-name="{{ $institution->name }}" data-id="{{ $institution->id }}" style="width: 40px;"><i class="fas fa-check"></i></i></button>                
            @else
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#institutionStatusModal" data-url="{{ route('institutions') }}" data-status="{{ $institution->status }}" data-name="{{ $institution->name }}" data-id="{{ $institution->id }}" style="width: 40px;"><i class="fas fa-times"></i></button>
            @endif
  
          </td>
  
        </tr>
          
      @endforeach
      
    </tbody>

  </table>

  <p>&nbsp;</p>

  <div class="d-flex justify-content-center">

    {{ $institutions->links() }}

  </div>

  <div>

    @include('components.modals.institution.register')
    @include('components.modals.institution.update')
    @include('components.modals.institution.show')
    @include('components.modals.institution.status')

  </div>
    
@endsection