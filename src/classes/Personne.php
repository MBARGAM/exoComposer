<?php

    namespace Isl\Demo\classes;

    class Personne {
        private $id ;
        private $nom ;
        private $prenom ;
        private $adresse ;
        private $cp ;
        private $pays;
        private $societe ;

        public function __construct($data){
            $this->nom = $data["nom"];
            $this->prenom = $data["prenom"];
            $this->adresse = $data["adresse"];
            $this->cp = $data["cp"];
            $this->pays = $data["pays"];
            $this->societe = $data["societe"];

        }

        public function setId($id){
            if(is_numeric($id)){
                $this->id = $id ;
            }
        }
        public function setNom($nom){   
            $this->nom = $nom ;     
        }
        public function setPrenom($prenom){   
            $this->prenom = $prenom ;     
        }
        public function setAdresse($adresse){   
            $this->adresse = $adresse ;     
        }
        public function setCp($cp){   
          
                $this->cp= $cp ;
                
        }
         public function setPays($pays){   
         
                $this->pays= $pays ;
              
        }
        public function setSociete($societe){   
            $this->societe= $societe ;     
        }

        public function getId(){
          return $this->id ;
        }
        public function getNom(){
            return $this->nom ;
        }
        public function getPrenom(){
            return $this->prenom ;
        }
        public function getAdresse(){
            return $this->adresse ;
        }
        public function getCp(){
            return $this->cp ;
        }
        public function getPays(){
            return $this->pays ;
        }
        public function getSociete(){
            return $this->societe ;
        }
     


    }
?>