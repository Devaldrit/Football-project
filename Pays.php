<?php
    Class Pays {
        private String $_nom;
        
        //tableau qui contient les equipes
        private array $_equipes;
        
        //Tableau qui vas contenir les joueurs 
        private array $_joueurs;

        public function __construct(String $nom) {
            $this->_nom = $nom;
            $this->_equipes = [];
            $this->_joueurs = [];
        }

        public function getNom() {
            return $this->_nom;
        }

        public function setNom($nom) {
            $this->_nom = $nom;
        }

        public function getTabEquipeParPays() {
            return $this->_equipes;
        }

        public function getTabEquipeParJoueur() {
            return $this->_tabEquipeParJoueur;
        }

        //function pour ajouter joueur (elle vas être appeler dans la classe Contrat)
        public function ajouterJoueur(Joueur $joueur) {
            $this->_joueurs[] = $joueur;
        }

        //function pour ajouter Equipe (elle vas être appeler dans la classe Contrat)
        public function ajouterEquipe(Equipe $equipe) {
            $this->_equipes[] = $equipe;
        }

        //function pour Lister toutes les équipes d'un pays
        public function listerEquipesPays() {
            echo "<div class='box-red'>";
            echo "<h2>" . $this->getNom() . "</h2>";
            foreach ($this->getTabEquipeParPays() as $equipe) {
                echo "<p>" . $equipe->getNom() . "</p>";
            }
            echo "</div>";
        }
    }