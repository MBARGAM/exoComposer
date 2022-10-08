<?php 
   
   require_once 'vendor/autoload.php';
   include_once ('function.php');

   
   use Isl\Demo\classes\Personne ;  
   use Isl\Demo\manager\PersonneManager ;
   
    $connexion = new PDO('mysql:host=localhost;dbname=webDev3','root','root');

    //PersonneManager::PersonneCreate(5);// pas besoin d'instancier les fonctions statiques 
  
   $newManager = new PersonneManager($connexion);
   /*$tableau = PersonneManager::PersonneCreate(5); // appel du generateur  de données faker 
  
   foreach($tableau as $value){
     $newManager::create($value);
   }*/
   
   //$resultat = Personnemanager::read();// function statique 
   $resultat = PersonneManager::readAll();// function statique 
   $updateTab = PersonneManager::read(3);// modification de la 2eme entree
   $newPersonne = new Personne($updateTab[0]); //instanciation de la classe personne
   $newPersonne->setNom("boquet");//modification du nom
   $newPersonne->setPrenom("Pierre"); //modification du prenom
   PersonneManager::update($newPersonne); // modif dans la bd fonction statique donc pas besoin de l instancier
   $resultat = PersonneManager::readAll();// affichage 
   

  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body> 
   <div>
   <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Code postal</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Pays</th>
                    <th scope="col">Société</th>
                </tr>
            </thead>
            <tbody>
                   <?php 
                foreach($resultat as $value){
                  
                  ?>
                    <tr>
                      <td><?php echo $value["id"]; ?></td>
                      <td><?php echo ucfirst($value["nom"]); ?></td>
                      <td><?php echo ucfirst($value["prenom"]); ?></td>
                      <td><?php echo ucfirst($value["cp"]); ?></td>
                      <td><?php echo ucfirst($value["adresse"]); ?></td>
                      <td><?php echo ucfirst($value["pays"]); ?></td>
                      <td><?php echo ucfirst($value["societe"]); ?></td>
                    </tr>
                  <?php 
                } 
                  ?>   
              
            </tbody>
        </table>
   </div>
    
</body>
</html>