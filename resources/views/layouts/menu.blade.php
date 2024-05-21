<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">LOGO</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('website.accueil') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('website.about') }}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('website.products') }}">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('website.contact') }}">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
