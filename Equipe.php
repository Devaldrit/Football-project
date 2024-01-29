<?php
    Class Equipe{
        private string $_nom;
        private DateTime $_dateCreation;
        private Pays $_pays;
        //Tableau pour l'objet Equipe dans la Classe Contrat
        private array $_contrats;
        
        public function __construct(string $nom, string $dateCreation, Pays $pays) {
            $this->_nom = $nom;
            $this->_dateCreation = new DateTime($dateCreation);
            $this->_pays = $pays;
            // pour ajouter les élements dans la classe Pays dans l'objet Equipe
            $pays->ajouterEquipe($this);

            //Tableau pour l'objet Equipe dans la Classe Contrat
            $this->_contrats = [];
        }

        //Getter
        public function getNom() {
            return $this->_nom;
        }

        public function getDateCreation() {
            return $this->_dateCreation;
        }

        public function getTabContratParEquipe() {
            return $this->_contrats;
        }

        public function getPays() {
            return $this->_pays;
        }
        
        //Setter

        public function setNom($nom) {
            $this->_nom = $nom;
        }

        public function setDateCreation(DateTime $dateCreation) {
            $this->_dateCreation = $dateCreation;
        }

        public function dateCreation($dateCreation) {
            echo date('d/m/Y',strtotime($dateCreation));
        }

        public function __toString() {
            return $this->getNom() . ' ' . $this->getDateCreation()->format("d/m/Y"); 
        }

        // Tableau et méthode pour ajouter Contrat l'équipe a la Class Contrat
        //Ajouter les élements de cette Classe Equipe dans l'objet Equipe situé dans la classe Contrat
        public function ajouterContrat(Contrat $contrat) {
            $this->_contrats[] = $contrat;
        }

        //function pour Lister toutes les joueurs d'une équipe
        public function listerJoueursEquipe() {
            echo "<div class='box-blue'>";
            echo "<h2>" . $this->getNom() . "</h2>" . "</br>";
            echo "<p>" . $this->_pays->getNom() . " - " . $this->getDateCreation()->format("Y") . "</br>";
        
            foreach ($this->getTabContratParEquipe() as $contrat) {
                $joueur = $contrat->getJoueur();
                $dateFinContrat = $contrat->getAnneeFinSaison()->format("d/m/Y");
        
                echo "<p>" . $joueur->getNom() . " (" . $dateFinContrat . ")</p>";
            }
        
            echo "</div>";
        }

    }