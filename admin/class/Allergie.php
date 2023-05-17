<?php

class Allergie
{
    private $nom;
    private $bdd;

    public function __construct($nom)
    {
        $this->nom = $nom;
        $this->bdd = new PDO(
            'mysql:host=localhost;dbname=quaiantique;charset=UTF8',
            'root',
            ''
        );

    }

    public function ajouterAllergie()
    {
        $stmt = $this->bdd->prepare("INSERT INTO allergies (nom) VALUES (:nom)");
        $stmt->execute(['nom' => $this->nom]);
        echo "L'allergie $this->nom a été ajoutée avec succès !";
    }

    public function supprimerAllergie($id)
    {
        $stmt = $this->bdd->prepare("DELETE FROM allergies WHERE id = :id");
        $stmt->execute(['id' => $id]);
        echo "L'allergie avec l'ID $id a été supprimée avec succès !";
    }

    public function afficherAllergies()
    {
        $stmt = $this->bdd->query("SELECT * FROM allergies");
        $allergies = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($allergies as $allergie) {
            echo $allergie['nom'] . ' <form method="post" action="./class/supprimer-allergie.php">
            <input type="hidden" name="id" value="' . $allergie['id'] . '">
            <input type="submit" value="Supprimer">
        </form><br>';
        }
    }
}

