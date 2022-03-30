<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/ico" href="../img/index.png" />
    <title>Header</title>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

   <!-- Retourner au tableau -->
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Tableau des références</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Barre de recherche -->
    <div class="collapse navbar-collapse" id="navbarScroll">
      <form class="d-flex" action="search_ref.php" method="POST">
        <input class="form-control me-2" type="search" placeholder="Recherche par réference" name="search_ref" aria-label="Search">
        <button class="btn btn-warning" type="submit">Rechercher</button>
      </form>
    </div>
  </div>
</nav>
</body>
</html>