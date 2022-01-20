<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Tableau de bord</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#utlisateur" aria-expanded="false" aria-controls="utlisateur">
          <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">Utilisateurs</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="utlisateur">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.utilisateurs.index', ['type' => 'administrateur'])}}">
                Administrateurs
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.utilisateurs.index', ['type' => 'client'])}}">
                Clients
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.utilisateurs.index', ['type' => 'commercial_sedentaire'])}}">
                Com. Sedentaires
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.utilisateurs.index', ['type' => 'commercial_terrain'])}}">
                Com. Terrain
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#services" aria-expanded="false" aria-controls="services">
          <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">Services</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="services">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.categories.index')}}">
                Categories
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.sous-categories.index')}}">
                Sous categories
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.prestations.index')}}">
                Prestations
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.services.index')}}">
                Services
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.commandes.index')}}">
          <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">Commandes</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.rapport.index')}}">
          <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">Rapport</span>
        </a>
      </li>
    </ul>
  </nav>