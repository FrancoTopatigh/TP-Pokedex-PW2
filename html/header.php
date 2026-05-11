<?php
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="./assets/img/pokeball.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
    </a>
    <span class="navbar-brand">Pokédex</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse gap-2 flex-grow-0" id="navbarSupportedContent">
      <?php
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = "TestUsername";

      $isLoggedIn = $_SESSION['loggedin'];
      $userName = $_SESSION['username'];
      if ($isLoggedIn) {
        echo '
          <span class="navbar-text">' . $userName . '</span>
          <button class="btn btn-sm btn-danger d-flex">
            <i class="material-symbols-outlined">logout</i>
            <span class="ms-2 d-inline d-sm-none">Logout</span>
          </button>
        ';
      } else {
        echo '
          <button class="btn btn-sm btn-light d-flex">
            <i class="material-symbols-outlined">login</i>
            <span class="ms-2 d-inline d-sm-none">Login</span>
          </button>
        ';
      }
      ?>
    </div>
  </div>
</nav>