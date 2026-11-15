</head>
<body>  
<nav class="navbar sm:navbar-expand bg-1 fg-2">
  <div class="container">
     <a class="navbar-brand" href="#">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBR9ksjTEWlwkP1DvsopEUQAxXcydHTfFLPO8CiMTYxA&s=10" alt="Bootstrap" width="50" height="50">
    </a>
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="btn-icon navbar-toggler" type="button" data-bs-toggle="drawer" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" aria-hidden="true"></span>
    </button>
    <dialog class="drawer drawer-end" tabindex="-1" id="navbarNav" aria-labelledby="navbarNavLabel">
      <div class="drawer-header">
        <h5 class="drawer-title" id="navbarNavLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="drawer" aria-label="Close"></button>
      </div>
      <div class="drawer-body">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/dasborprojek-v6/public/admin/index-v6.php">Dasboard</a>
          </li>
          <li class="nav-item">
            <button class="btn-solid" type="button" data-bs-toggle="menu" aria-expanded="false">Management</button>
            <div class="menu">
              <a class="menu-item" href="/dasborprojek-v6/public/admin/data-guru.php">Data Guru</a>
              <a class="menu-item" href="/dasborprojek-v6/public/admin/data-kelas.php">Data Kelas</a>
              <hr class="menu-divider" />
              <a class="menu-item" href="/dasborprojek-v6/public/admin/data-siswa.php">Data Siswa</a>
            </div>
          </li>
        </ul>

        <button class="btn-solid theme-primary" type="button" data-bs-toggle="menu" data-bs-placement="bottom-end" aria-expanded="false">
          User profile
          <span class="avatar avatar-xs">
            <img class="avatar-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTu2R0cQyzrk6HehZ8mtu26165OQe-GUlFlVH4_grpV7w&s=10" alt="mdo" />
          </span>
        </button>
        <div class="menu">
          <a class="menu-item" href="#">Profil</a>
          <a class="menu-item" href="#">Settings</a>
          <hr class="menu-divider" />
          <a class="menu-item theme-danger" href="/dasborprojek-v6/index.php">Log Out</a>
        </div>
      </div>
    </dialog>
  </div>
</nav>
