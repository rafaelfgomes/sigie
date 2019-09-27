@extends('layouts.dashboard')

@section('content')

  <h1 class="text-center mb-4">Instituições</h1>

  <div class="d-flex justify-content-center mb-4">

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#institutionRegisterModal" data-register="{{ 'Teste' }}">Adicionar nova instituição</button>
  
  </div>

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
  
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#institutionShowModal" data-edit="Teste" style="width: 40px;"><i class="far fa-eye"></i></button>
            <button type="button" class="btn btn-secondary" style="width: 40px;"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-danger" style="width: 40px;"><i class="fas fa-trash"></i></button>
  
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
    @include('components.modals.institution.edit')
    @include('components.modals.institution.show')

  </div>

  <script>
  
    $('#institutionShowModal').on('show.bs.modal', function (event) {
      
      var button = $(event.relatedTarget)
      let data = button.data('edit') 

      var modal = $(this)
      
      modal.find('#name').val(data)
      modal.find('#cnpj').val(data)
    
    })
  
  </script>
    
@endsection