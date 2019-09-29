@extends('layouts.dashboard')

@section('content')

    <div class="row mb-5">

        <div class="col">

            <h2 class="text-center">Bem vindo ao SIGIE</h2>

        </div>

    </div>

    <div class="row mb-5">

        <div class="col">

            <div class="card" style="height: 260px">

                <div class="card-body">

                    <h3 class="mb-4">Instituições</h3>

                    <p class="card-text"><span class="font-weight-bold">Total de instituições cadastradas:&nbsp;</span><span>{{ $totalInstitutions }}</span></p>
                    <p class="card-text"><span class="font-weight-bold">Instituições ativas:&nbsp;</span><span>{{ $activeInstitutions }}</span></p>
                    <p class="card-text"><span class="font-weight-bold">Instituições inativas:&nbsp;</span><span>{{ $inactiveInstitutions }}</span></p>
                
                </div>

            </div>

        </div>

        <div class="col">

            <div class="card" style="height: 260px">

                <div class="card-body">
                    
                    <h3 class="mb-4">Cursos</h3>

                    <p class="card-text"><span class="font-weight-bold">Total de cursos cadastrados:&nbsp;</span><span>{{ $totalCourses }}</span></p>
                    <p class="card-text"><span class="font-weight-bold">Cursos ativos:&nbsp;</span><span>{{ $activeCourses }}</span></p>
                    <p class="card-text"><span class="font-weight-bold">Cursos inativos:&nbsp;</span><span>{{ $inactiveCourses }}</span></p>

                </div>
                
            </div>

        </div>

    </div>

    <div class="row">

        <div class="col">

            <div class="card" style="height: 260px">

                <div class="card-body">

                    <h3 class="mb-4">Alunos</h3>

                    <p class="card-text"><span class="font-weight-bold">Total de alunos cadastrados:&nbsp;</span><span>{{ $totalStudents }}</span></p>
                    <p class="card-text"><span class="font-weight-bold">Alunos ativos:&nbsp;</span><span>{{ $activeStudents }}</span></p>
                    <p class="card-text"><span class="font-weight-bold">Alunos inativos:&nbsp;</span><span>{{ $inactiveStudents }}</span></p>
                
                </div>

            </div>

        </div>

        <div class="col">

            <div class="card" style="height: 260px">

                <div class="card-body">
                    
                    

                </div>
                
            </div>

        </div>

    </div>

@endsection
