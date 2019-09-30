@extends('layouts.dashboard')

@section('content')

  <div class="row">

    <div class="col">

      <h1 class="text-center mb-4">Associar cursos</h1>

    </div>
  
  </div>

  <div class="row mt-4">

    <div class="col">

      <div class="form-group">

        <label for="select-institutions">Escolha a instituição</label>
        
        <select class="form-control" id="select-institutions">

          <option value="0">Selecione</option>

          @foreach ($institutions as $institution)

            <option value="{{ $institution->id }}">{{ $institution->name }}</option>
              
          @endforeach

        </select>

      </div>

    </div>

    <div class="col">

      <div class="form-group">

        <label for="select-courses">Escolha o curso</label>
        
        <select class="form-control" id="select-courses">

          <option value="0">Selecione</option>

          @foreach ($courses as $course)

            <option value="{{ $course->id }}">{{ $course->name }}</option>
              
          @endforeach

        </select>

      </div>

      <div class="col text-center">

        <button type="button" id="add-course" class="btn btn-success">Adicionar na lista</button>
  
      </div>

    </div>

  </div>

  <div class="row">

    <div class="col d-none">

      <label>Cursos escolhidos</label>

      <ul class="list-group" id="courses-list"></ul>

      <p>&nbsp;</p>

      <div class="text-center">

        <button type="button" id="resgister-courses" class="btn btn-success">Cadastrar cursos</button>

      </div>

    </div>
  
  </div>

@endsection