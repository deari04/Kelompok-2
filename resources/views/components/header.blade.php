<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav ml-auto"> <!-- Tambahkan kelas ml-auto di sini -->
    @if(Auth::check())
    <li class="nav-item">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
      </form>
    </li>
    @else
    <li class="nav-item">
      <a href="{{ route('welcome') }}" class="btn btn-primary">Login</a>
    </li>
    @endif
  </ul>
</nav>
