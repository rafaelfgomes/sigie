<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">

  <a class="navbar-brand" href="{{ route('dashboard')}}">

    <img src="/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    SIGIE
  
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">

    <span class="navbar-toggler-icon"></span>
  
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">

    <ul class="navbar-nav">
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('institutions') }}">Instituições</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('courses') }}">Cursos</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('students') }}">Estudantes</a>
      </li>
      
    </ul>

  </div>

</nav>