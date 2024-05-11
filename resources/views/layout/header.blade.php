<nav class="navbar fixed-top bg-light" data-bs-theme="light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('assets/images/logo-text.png') }}" style=" margin: 0;" alt="logo bantu rumah" height="40">
      </a>
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Layanan Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Testimoni</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Lowongan Pekerjaan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tentang Kami</a>
        </li>
        <li class="nav-item">
          @auth
            
          <a class="btn btn-submit" href="/admin">Dashboard</a>
          @endauth
          @guest
            
          <a class="btn btn-submit" href="/login">Login</a>
          @endguest
        </li>

      </ul>
    </div>
    
</nav>