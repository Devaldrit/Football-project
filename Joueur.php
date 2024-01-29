<?php 
    Class Joueur {
        private string $_nom;
        private string $_prenom;
        private Pays $_pays;
        private DateTime $_dateDeNaissance;
        //Tableau pour la Classe Contrat
        private array $_contrats;


        public function __construct(string $nom, string $prenom, string $dateDeNaissance, Pays $pays) {
            $this->_nom = $nom;
            $this->_prenom = $prenom;
            $this->_dateDeNaissance = new DateTime($dateDeNaissance);
            $this->_pays = $pays;
            $this->_contrats = [];

            //Ajout les élements de joueur dans la Class Pays dans l'objet Joueur
            $pays->ajouterJoueur($this);
        }

        //GETTER
        public function getNom() {
            return $this->_nom;
        }

        public function getPrenom() {
            return $this->_prenom;
        }

        public function getDateDeNaissance() {
            return $this->_dateDeNaissance;
        }

        public function getTabJoueursContratPays() {
            return $this->_contrats;
        }

        //SETTER
        public function setNom($nom) {
            $this->_nom = $nom;
        }

        public function setPrenom($prenom) {
            $this->_prenom = $prenom;
        }

        public function setDateDeNaissance(DateTime $dateDeNaissance) {
            $this->_dateDeNaissance = $dateDeNaissance;
        }

        public function dateDeNaissance($dateDeNaissance){
            echo date('d/m/Y', strtotime($dateDeNaissance));
        }

        //Claculer l'âge
        public function calculerAge() {
            $aujourdHui = new DateTime();
            $difference = $this->_dateDeNaissance->diff($aujourdHui);
            return $difference->y; // Retourne l'âge en années
        }


        public function __toString() {
            return $this->getNom() . ' ' . $this->getPrenom() . ' Date de naissance: ' . $this->getDateDeNaissance()->format("d/m/Y");
        }
        

        //Méthode pour ajouter les élements de la classe Joueur dans l'objet Joueur de la Classe Contrat
        public function ajouterContrat(Contrat $contrat) {
            $this->_contrats[] = $contrat;
        }

        //Lister tout les équipes d'un joueur
        public function ListerEquipesDuJoueur() {
            echo "<div class='box-green'>";
            echo "<h2>" . $this->getPrenom() . " " . $this->getNom() . "</h2>" . "</br>";
            
            // Parcourir la liste des contrats associés au joueur
            foreach ($this->getTabJoueursContratPays() as $contrat) {
                // Récupérer l'objet Équipe associé au contrat
                $equipeDuJoueur = $contrat->getEquipe();
        
                // Récupérer le pays de l'équipe
                $nomPays = $equipeDuJoueur->getPays()->getNom();
                
                // Récupérer la date de création de l'équipe
                $dateCreationEquipe = $equipeDuJoueur->getDateCreation();
        
                // Afficher les informations du joueur, du pays, et de l'équipe
                echo "<p>" . $nomPays . " - " . $this->calculerAge() . " ans" . "</p>";
                echo "</br>";
                echo "</br>";
                echo "<p>" . $equipeDuJoueur->getNom() . " (" . $dateCreationEquipe->format("Y") . ")</p>";
            }
        
            echo "</div>";
        }
        
        
    }