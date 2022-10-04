<?php 

   namespace Isl\Demo\manager ;
   use Isl\Demo\classes\Personne ;
   use Faker\Factory ; 
   

   class PersonneManager{
       private $connexion = null ;

      public  function __construct($connexion){
           $this->connexion = $connexion ;
       }

       public   function setConnexion($connexion){
           $this->connexion = $connexion ;
       }

       public  function getConnexion(){
         return $this->connexion ;
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


      public   function  create(Personne $personne){
          $req = $this->connexion
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
        
        $personne->setId($this->connexion->lastInsertId());
      

      }
      
      public   function  read(){

      }
      public   function  readAll(){

      }
      public   function  update(){

      }
      public   function  delete(){

      }

       
   }

?>