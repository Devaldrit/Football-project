<?php
    Class Contrat {
        private DateTime $_anneeDebutSaison;
        private DateTime $_anneeFinSaison;
        private int $_salaire;
        private Equipe $_equipe;
        private Joueur $_joueur;

        public function __construct(String $anneDebutSaison, String $anneeFinSaison, int $salaire, Equipe $equipe, Joueur $joueur) {
            $this->_anneeDebutSaison = new DateTime($anneDebutSaison);
            $this->_anneeFinSaison = new DateTime($anneeFinSaison);
            $this->_salaire = $salaire;
            $this->_equipe = $equipe;
            $this->_joueur = $joueur;
            
            $equipe->ajouterContrat($this);
            $joueur->ajouterContrat($this);
        }

        //GETTER 
        public function getAnneeDebutSaison() {
            return $this->_anneDebutSaison;
        }

        public function getAnneeFinSaison() {
            return $this->_anneeFinSaison;
        }

        public function getSalaire() {
            return $this->_salaire;
        }

        public function getEquipe() {
            return $this->_equipe;
        }

        public function getJoueur() {
            return $this->_joueur;
        }
        

        //SETTER
        public function setAnneeDebutSaison(DateTime $anneDebutSaison) {
            $this->_anneeDebutSaison = $anneDebutSaison;
        }

        public function setAnneeFinSaison(DateTime $anneeFinSaison) {
            $this->_anneeFinSaison = $anneeFinSaison;
        }

        public function setSalaire($salaire) {
            $this->_salaire = $salaire;
        }

        //Other function

        public function dateAnneeDebutSaison($anneDebutSaison) {
            echo date('d/m/Y', strtotime($anneDebutSaison));
        }

        public function dateAnneeFinSaison($anneeFinSaison) {
            echo date('d/m/Y', strtotime($anneeFinSaison));
        }

        //Méthode pour calculer le nombr de mois entre début et la fin de saison
        public function calculerNombreMois() {
            $interval = $this->_anneeDebutSaison->diff($this->_anneeFinSaison);
            $nombreMois = $interval->y * 12 + $interval->m;
            return $nombreMois;
        }

        // Méthode pour calculer le salaire mensuel
        public function calculerSalaireMensuel() {
            $nombreMois = $this->calculerNombreMois();

            // Évitez la division par zéro en vérifiant si le nombre de mois est différent de zéro
            if ($nombreMois !== 0) {
                $salaireMensuel = $this->_salaire / $nombreMois;
                return round($salaireMensuel, 2);
            } else {
                // Gérer le cas où le nombre de mois est zéro (par exemple, si la saison n'a pas encore commencé)
                return 0;
            }
        }
    }