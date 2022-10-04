<?php 
   
   require_once 'vendor/autoload.php';
   include_once ('function.php');

   
   use Isl\Demo\classes\Personne ;  
   use Isl\Demo\manager\PersonneManager ;
   
    $connexion = new PDO('mysql:host=localhost;dbname=webDev3','root','root');


    //PersonneManager::PersonneCreate(5);// pas besoin d'instancier les fonctions statiques 
    
   $tableau = PersonneManager::PersonneCreate(5);


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
                foreach($tableau as $value){
                  ?>
                    <tr>
                      <td><?php echo ucfirst($value->getNom()); ?></td>
                      <td><?php echo ucfirst($value->getPrenom()); ?></td>
                      <td><?php echo ucfirst($value->getCp()); ?></td>
                      <td><?php echo ucfirst($value->getAdresse()); ?></td>
                      <td><?php echo ucfirst($value->getPays()); ?></td>
                      <td><?php echo ucfirst($value->getSociete()); ?></td>
                    </tr>
                  <?php 
                } 
                  ?>   
              
            </tbody>
        </table>
   </div>
    
</body>
</html>