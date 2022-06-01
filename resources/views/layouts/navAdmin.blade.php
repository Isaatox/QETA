<div class="sidebar-nav">
    <nav class="navbar navbar-dark bg-primary fixed-top">
        <div class="container">
            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menus List -->
            <div class="offcanvas offcanvas-start shadow" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-body">
                <h1><a href="/admin/dashboard" class="logo">Admin</a></h1>
                    <ul class="navbar-nav mt-4">
                        <div class="dropdown" >
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-edit"></i> <span> Élément</span>
                            </button>
                            <ul class="dropdown-menu" style="background-color: #032353;" aria-labelledby="dropdownMenuButton1">
                                <li><a href="/admin/question"><i class="far fa-question-circle"></i> <span class="item-text">Liste des questions</span></a></li>
                                <li><a href="{{route('admin.sondage')}}"><i class="fas fa-poll-h"></i> <span class="item-text">Liste des sondages</span></a></li>
                                {{-- <li><a href="#"><i class="fas fa-comments"></i> <span class="item-text">Liste des commentaires</span></a></li> --}}
                                <li><a href="{{route('admin.report')}}"><i class="fas fa-exclamation-circle"></i> <span class="item-text">Signalement</span></a></li>

                            </ul>
                        </div>
                        <div class="dropdown mt-2" >
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-edit"></i> <span> Utilisateurs</span>
                            </button>
                            <ul class="dropdown-menu" style="background-color: #032353;" aria-labelledby="dropdownMenuButton2">
                                <li><a href="{{route('admin.utilisateur')}}"><i class="fas fa-users"></i> <span class="item-text">Liste des utilisateurs</span></a></li>
                            </ul>
                        </div>

                    </ul>
                    <div class="footer mt-2">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                  </div>
                    <a href="/admin/logout" class="btn btn-danger mt-4"><i class="fas fa-sign-out-alt"></i> <span class="item-text">Se déconnecter</span></a>
              </div>
            </div>

            <div class="btn-group">
                <a href="#" class="dropdown-toggle text-white text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="usericon"><i class="bi bi-person-circle"></i></span>
                    <span class="textnone">{{ auth()->user()->pseudo }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    {{-- <li><button class="dropdown-item" type="button"><i class="bi bi-lock-fill"></i> Modifier Mot de passe</button></li> --}}
                    <li><hr class="dropdown-divider"></li>
                    <li><button class="dropdown-item" type="button" onclick="location.href='/admin/logout';"  ><i class="bi bi-box-arrow-right"></i> Se Déconnecter</button></li>
                </ul>
            </div>

        </div>
    </nav>
</div>