<?php
require_once '../functions/users.php';
require_once '../views/layout/header.php';

$insert = null;

if (!empty($_POST) && !empty($_POST['nom']) && !empty($_POST['email'])) {
  $nom = $_POST['nom'];
  $email = $_POST['email'];

  $insert = insertuser($nom, $email);
}
?>

<h1>Nouvel Utilisateur</h1>

<?php if ($insert) { ?>
  <div class="alert alert-success" role="alert">
    L'utilisateur a bien etait enregistré ! <a href="/">Retour à la liste</a>
  </div>
<?php } ?>

<?php if ($insert === false) { ?>
  <div class="alert alert-danger" role="alert">
    Une erreur est survenue
  </div>
<?php } ?>


<form method="POST">
  <div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom..." />
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="number" class="form-control" id="email" name="email" placeholder="Email..." />
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php require_once '../views/layout/footer.php'; ?>