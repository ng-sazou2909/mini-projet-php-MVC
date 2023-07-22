<?php
require ROOT.DS.'modele'.DS.'persistance'.DS.'connexion.php';
class CategoryCrud {
    private $db; // Instance de la classe Connect

    public function __construct() {
        $this->db = new Connection();
    }

    public function createCategory($libelle) {
        try {
            $stmt = $this->db->prepare("INSERT INTO categorie (libelle) VALUES (:libelle)");
            $stmt->bindParam(':libelle', $libelle);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la création de la categorie : " . $e->getMessage();
            return false;
        }
    }

    public function getAllCategories() {
        try {
            $stmt = $this->db->prepare("SELECT * FROM categorie");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la lecture des categories : " . $e->getMessage();
            return false;
        }
    }

    public function readCategory($categorieId) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM categorie WHERE id = :id");
            $stmt->bindParam(':id', $categorieId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la lecture de la categorie : " . $e->getMessage();
            return false;
        }
    }

    public function updateCategory($categorieId, $libelle) {
        try {
            $stmt = $this->db->prepare("UPDATE categorie SET libelle = :libelle");
            $stmt->bindParam(':id', $categorieId);
            $stmt->bindParam(':libelle', $libelle);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour de la categorie : " . $e->getMessage();
            return false;
        }
    }

    public function deleteCategory($categorieId) {
        try {
            $stmt = $this->db->prepare("DELETE FROM categorie WHERE id = :id");
            $stmt->bindParam(':id', $categorieId);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression de la categorie : " . $e->getMessage();
            return false;
        }
    }
}
?>