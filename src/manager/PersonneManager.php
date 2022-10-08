<?php 

   namespace Isl\Demo\manager ;
   use Isl\Demo\classes\Personne ;
   use Faker\Factory ; 
   use PDO;


   class PersonneManager{
       private  static $connexion = null ;

      public  function __construct($connexion){
           self::$connexion = $connexion ;
       }

       public   function setConnexion($connexion){
            self::$connexion  = $connexion ;
       }

       public  function getConnexion(){
         return   self::$connexion  ;
      }

    public static function PersonneCreate($nbre){
         
        $personsTab=[];
        $faker = Factory::create();
        for($i = 0 ; $i< $nbre ;$i++){
            
            $data= [];
            $data["nom"] = $faker->lastname();
            $data["prenom"] =$faker->firstname();
            $data["adresse"] =$faker->address();
            $data["cp"] =$faker->postcode();
            $data["pays"]=$faker->country();
            $data["societe"] =$faker->Company();

            $newPersonne = new Personne($data);
            $personsTab[] = $newPersonne ;    
       }

         return $personsTab ;
    }


      public static function  create(Personne $personne){
          $req = self::$connexion 
          ->prepare("INSERT INTO Personne (nom,prenom,adresse,cp,pays,societe ) 
          VALUES (:nom,:prenom,:adresse,:cp,:pays,:societe)");

         $req->bindValue(':nom',$personne->getNom());
         $req->bindValue(':prenom',$personne->getPrenom());
         $req->bindValue(':adresse',$personne->getAdresse());
         $req->bindValue(':cp',$personne->getCp());
         $req->bindValue(':pays',$personne->getPays());
         $req->bindValue(':societe',$personne->getSociete());
         $req->execute();

         // recuperation du personne et set de son id
        
        $personne->setId(self::$connexion ->lastInsertId());
      

      }
      
      public static function read($id){

        $req =  self::$connexion 
        ->query("SELECT * FROM Personne WHERE id=".$id.";" );

        // execution de la requete avec un fetchall qui prend toute les donnees ,fetch ne prends que la 1 ere
        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

      public static function readAll(){

        $req = self::$connexion 
        ->query("SELECT * FROM Personne; ");

        // execution de la requete avec un fetchall qui prend toute les donnees ,fetch ne prends que la 1 ere
        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        return $result;


      }

      public  static function  update(Personne $personne){

          $req = self::$connexion
          ->prepare(
                  'UPDATE Personne SET 
                    nom=:nom,
                    prenom=:prenom, 
                    adresse=:adresse,
                    cp=:cp,
                    pays=:pays,
                    societe=:societe
                    WHERE id=:id'
          );
          $req->bindValue(':id',$personne->getId(),PDO::PARAM_INT);
          $req->bindValue(':nom',$personne->getNom());
          $req->bindValue(':prenom',$personne->getPrenom());
          $req->bindValue(':adresse',$personne->getAdresse());
          $req->bindValue(':cp',$personne->getCp());
          $req->bindValue(':pays',$personne->getPays());
          $req->bindValue(':societe',$personne->getSociete());
          $req->execute();
      }
      
      public   function  delete($id){

      }

       
   }

?>