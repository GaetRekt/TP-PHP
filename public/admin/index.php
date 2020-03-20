<?php
require_once '../../functions/utils.php';
// Vérification de la connexion avant même toute sortie de code (require, doctype, etc...)
session_start();
if(isset($_SESSION['state']) && $_SESSION["state"] == "connected") {
  echo "Vous êtes connecté";
} else {
  redirect('/admin/login.php');
}

require_once '../../functions/users.php';
require_once '../../views/layout/header.php';

$activer = $_GET['activer'] ?? "all";
$user = getUsers($activer);
?>

<h1>Administration - Liste des Utilisateurs</h1>

<form>
  <div class="form-group">
    <label for="activer">Filtrer</label>
    <select class="form-control" id="activer" name="activer">
      <option value="all" <?php if ($activer == "all") { ?>selected="selected" <?php } ?>>
        Toutes les utilisateurs
      </option>
      <option value="activer" <?php if ($activer == "activer") { ?>selected="selected" <?php } ?>>
        Utilisateurs activers
      </option>
      <option value="desactiver" <?php if ($activer == "desactiver") { ?>selected="selected" <?php } ?>>
        Utilisateurs desactiver
      </option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Appliquer</button>
</form>

<table class="table table-striped">
  <thead>
    <tr>
      <th></th>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">activer</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user) { ?>
      <tr>
        <td><a href="/admin/edit.php?id=<?php echo $user['ID']; ?>" class="btn btn-warning">Editer</a></td>
        <td><?php echo $user['ID']; ?></td>
        <td><?php echo $user['nom']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td>
          <?php if ($user['activer'] == 1) { ?>
            <span class="badge badge-success">OUI</span>
          <?php } else { ?>
            <span class="badge badge-danger">NON</span>
          <?php } ?>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<?php require_once '../../views/layout/footer.php';
