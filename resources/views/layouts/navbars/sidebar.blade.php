<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text logo-normal">
     <img src="{{asset('material/img/secca_logo.png')}}" alt="logo"> </img>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>Accueil</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'brands' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('brands') }}">
          <i class="material-icons">list_alt</i>
            <p>Liste des matériels</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
            <p>Liste des affaires</p>
        </a>
      </li>
      <!-- <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('profile.edit') }}">
          <i class="material-icons">people_alt</i>
          <span class="sidebar-normal">{{ __('User profile') }} </span>
        </a>
      </li> -->
      <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="material-icons">people_alt</i>
          <span class="sidebar-normal"> Gestion des utilisateurs </span>
        </a>
      </li>
    </ul>
  </div>
</div>
