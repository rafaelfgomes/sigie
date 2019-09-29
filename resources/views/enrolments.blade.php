@extends('layouts.dashboard')

@section('content')

  <div class="row">

    <div class="col">

        <h1 class="text-center mb-4">Realizar matrículas</h1>

    </div>
  
  </div>

  <div class="row">

    <div class="col">

      <div class="form-group">

        <label for="selectInstitutions">Escolha a instituição</label>
        
        <select class="form-control" id="selectInstitutions">

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

          @foreach ($courses as $course)

            <option value="{{ $course->id }}">{{ $course->name }}</option>
              
          @endforeach

        </select>

      </div>

    </div>

  </div>

  <div class="row">

    <div class="col">

      <div class="form-group">

        <label for="select-students">Escolha o aluno</label>
        
        <select class="form-control" id="select-students">

          @foreach ($students as $student)

            <option value="{{ $student->id }}">{{ $student->name }}</option>
              
          @endforeach

        </select>

      </div>

      <div class="text-center">

        <button type="button" id="add-student" class="btn btn-success">Adicionar na lista</button>

      </div>

    </div>
  
  </div>

  <div class="row">

    <div class="col">

      <label>Alunos escolhidos</label>

      <ul class="list-group" id="students-list">

      </ul>

    </div>

  </div>
    
@endsection