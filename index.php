<!doctype html>
<html lang="en" data-bs-theme="light">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>

    <!-- Custom Font (Google Fonts) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <!-- CSS Custom -->
    <link rel="stylesheet" href="asset/css/style.css" />

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous" />

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.2/font/bootstrap-icons.min.css" />
  </head>
  <body>
    <nav class="navbar sm:navbar-expand bg-1 fg-2">
      <div class="container">
        <a class="navbar-brand" href="#">Academic App</a>
        <button class="btn-icon navbar-toggler" type="button" data-bs-toggle="drawer" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" aria-hidden="true"></span>
        </button>
        <dialog class="drawer drawer-end" tabindex="-1" id="navbarNav" aria-labelledby="navbarNavLabel">
          <div class="drawer-header">
            <h5 class="drawer-title" id="navbarNavLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="drawer" aria-label="Close"></button>
          </div>
          <div class="drawer-body">
            <div class="nav-overflow" data-bs-toggle="nav-overflow">
              <ul class="nav nav-underline">
                <li class="nav-item">
                  <a class="nav-link active" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">FAQs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
                </li>
              </ul>
            </div>
            <div class="ms-auto">
              <a href="login.php" class="btn-solid theme-secondary">
                Masuk / Daftar
                <i class="bi bi-box-arrow-in-right"></i>
              </a>
            </div>
          </div>
        </dialog>
      </div>
    </nav>
    <div class="container mt-5">
      <div class="row">
        <div class="col">
          <h4>Landing Page</h4>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat, illo? Doloribus provident enim dolore voluptas et dicta adipisci fuga, expedita, magnam, vero accusantium eius eos suscipit quidem reiciendis a doloremque. Ex repellat ipsa magni, ea nihil odio commodi. Placeat, reprehenderit.</p>
        </div>
      </div>
    </div>
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
  </body>
</html>
