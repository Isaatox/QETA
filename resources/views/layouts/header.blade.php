<style>
    .carousel-item {
    height: 65vh;
    min-height: 350px;
    background: no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
</style>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-secondary fixed-top">
  <div class="container">
    <a class="navbar-brand" href="/">Qeta</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
      @if (auth()->check())
      
      <li class="nav-item">
          <a class="nav-link text-light" href="/">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/question">Questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/sondage">Sondages</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link text-light" href="#">A propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Contact</a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link text-light" href="/profil">Profil</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-danger nav-link text-light" href="/logout">Se déconnecter</a>
        </li>
        @else
        <li class="nav-item">
          <a class="btn btn-success nav-link text-light" href="/login">Se connecter</a>
        </li>&nbsp;
        <li class="nav-item">
          <a class="btn btn-primary nav-link text-light" href="/register">S'inscrire</a>
        </li>&nbsp;
        @endif
      </ul>
    </div>
  </div>
</nav>

<header>

</header>