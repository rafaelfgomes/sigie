<nav class="navbar navbar-expand-md navbar-light" style="background-color: #e3f2fd;">

  <a class="navbar-brand" href="{{ route('dashboard')}}">

    <img src="{{ asset('images/sigielogo.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
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

      <li class="nav-item">
        <a class="nav-link" href="{{ route('associations') }}">Associar cursos</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('enrolments') }}">Matrículas</a>
      </li>
      
    </ul>

    <ul class="nav navbar-nav ml-auto">

      <li class="nav-item dropdown">

        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }}
        </a>
        
        <div class="dropdown-menu w-100" aria-labelledby="navbarDropdownMenuLink">
          <form class="text-right" action="{{ route('logout') }}" method="post">
            <button type="submit" class="btn btn-link text-decoration-none" style="font-size: 15px; color: black;">Logout</button>
          </form>
        </div>
      
      </li>

    </ul>

  </div>

</nav>