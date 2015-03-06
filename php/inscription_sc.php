<?php
if(isset($_POST['submit'])) {
  if(isset($_POST['id_user']) && isset($_POST['mail']) && isset($_POST['pwd']) && isset($_POST['firstname']) && isset($_POST['lastname'])) {
    include_once("connexion.php");
    $id_user = $_POST['id_user'];
    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    
    $requete = "SELECT * FROM `user` WHERE id_user=".$id_user."";
    try {
      $response = $connexion->prepare($requete);
      $response->execute();
    }
    catch (Exception $e) {
      echo $e->getMessage();
    }
    $count = $response->rowCount();
    if($count == 0){
      $data = $response->fetchAll();
      $row_array = array();
      foreach($data as $row) {
        $row_array['mem_sc'] = $row['mem_sc'];
        if($row_array['1'] == 0) {
          $sql = "UPDATE user SET mem_sc='1' WHERE id=".$id_user."";
          echo("Utilisateur ajouté correctement");
        } else {
          echo ("Vous êtes déjà inscrit au service culturel");
        }
      }
      } else {
        echo("Mail ou numéro étudiant erroné");
      }
    }
  } else {
    echo ("Tous les champs n'ont pas été remplis");
  }
} else {
  echo("Vous n'êtes pas passé par le formulaire !");
}
?>
