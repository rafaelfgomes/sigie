@extends('layouts.dashboard')

@section('content')

  <div class="row">

    <div class="col">

        <h1 class="text-center mb-4">Cursos</h1>

    </div>

    <div class="col text-right">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#courseRegisterModal" data-url="{{ route('courses') }}">Adicionar novo curso</button>

    </div>
  
  </div>

  <table class="table" id="courses">

    <thead class="thead-dark">
      
      <tr class="text-center">
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Ações</th>
      </tr>
    
    </thead>
    
    <tbody>

      @foreach ($courses as $course)

        <tr class="text-center">

          <th scope="row">{{ $course->id }}</th>
            <td>{{ $course->name }}</td>
            <td>
  
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#courseShowModal" data-url="{{ route('courses') }}" data-id="{{ $course->id }}" style="width: 40px;"><i class="far fa-eye"></i></button>
    
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#courseUpdateModal" data-url="{{ route('courses') }}" data-id="{{ $course->id }}" style="width: 40px;"><i class="fas fa-edit"></i></button>
    
                @if ($course->status == 0)
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#courseStatusModal" data-url="{{ route('courses') }}" data-status="{{ $course->status }}" data-name="{{ $course->name }}" data-id="{{ $course->id }}" style="width: 40px;"><i class="fas fa-check"></i></i></button>                
                @else
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#courseStatusModal" data-url="{{ route('courses') }}" data-status="{{ $course->status }}" data-name="{{ $course->name }}" data-id="{{ $course->id }}" style="width: 40px;"><i class="fas fa-times"></i></button>
                @endif
      
              </td>
  
        </tr>
          
      @endforeach
      
    </tbody>

  </table>

  <p>&nbsp;</p>

  <div class="d-flex justify-content-center">

    {{ $courses->links() }}

  </div>

  <div>

    @include('components.modals.course.register')
    @include('components.modals.course.update')
    @include('components.modals.course.show')
    @include('components.modals.course.status')

  </div>

    
@endsection