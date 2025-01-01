<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid justify-content-center">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto text-center">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('sepatu.home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('sepatu.kategori', ['kategori' => '2']) }}">Men</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('sepatu.kategori', ['kategori' => '1']) }}">Women</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/wishlist">Wishlist</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/history-order">Order History</a>
              </li>
          <li class="nav-item">
            <a class="nav-link active" href="/aboutus">About Us</a>
          </li>
        </ul>
        <form class="d-flex" role="search" action="{{ url('/list-search') }}" method="GET">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-search btn-outline-dark" type="submit">Search</button>
        </form>
        <ul class="navbar-nav ms-5 me-3">
            <form action="/logoutpelanggan" method="POST">
                @csrf
                <button class="btn btn-danger nav-link text-black" type="submit">Log Out</button>
            </form>
        </ul>
      </div>
    </div>
  </nav>
