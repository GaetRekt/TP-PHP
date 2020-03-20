<?php
require_once DIR . '/db.php';

/
 * Récupère toutes les users et les renvoies sous forme de tableau
 * @var string $activer "all"|"activer"|"desactiver"
 * @return void
 */
function getUsers(string $activer, ?string $search = null): array
{
  $pdo = getPdo();
  $query = "SELECT * FROM user";


  if ($activer == "activer") {
    $query .= " WHERE activer = 1";
  }

  if ($activer == 'desactiver') {
    $query .= " WHERE activer = 0";
  }

  if ($search !== null) {
    $query = $query . "AND nom LIKE :search";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['search' => "%$search%"]);
  } else {
    $stmt = $pdo->query($query);
  }

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/
 * Récupère un user sous forme de tableau
 *
 * @param integer $id
 * @return array
 */
function getUser(int $id): ?array
{
  $pdo = getPdo();
  $query = "SELECT * FROM user WHERE id = :id";
  $stmt = $pdo->prepare($query);
  $stmt->execute(['id' => $id]);

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$row) {
    return null;
  }

  return $row;
}

function insertuser(string $nom, int $email): bool
{

  // Récupération d'une instance de PDO
  $pdo = getPdo();

  // Définition, préparation et exécution de la requête
  $query = "INSERT INTO user (nom, email) VALUES (:nom, :email)";
  $stmt = $pdo->prepare($query);
  return $stmt->execute([
    'nom' => $nom,
    'email' => $email,
  ]);
}

function updateuser(int $id, string $nom, int $email, int $activer = 0): bool
{
  // Récupération d'une instance de PDO
  $pdo = getPdo();

  // Définition, préparation et exécution de la requête
  $query = "UPDATE users SET nom = :nom, email = :email, activer= :activer WHERE id=:id";
  $stmt = $pdo->prepare($query);
  return $stmt->execute(array(':nom' => $nom, ':email' => $email, ':activer' => $activer, ':id' => $id));
}