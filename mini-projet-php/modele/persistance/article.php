<?php
require ROOT.DS.'modele'.DS.'persistance'.DS.'category.php';
class ArticleCrud {
    private $db; // Instance de la classe Connect

    public function __construct() {
        $this->db = new Connection();
    }

    public function createArticle($titre, $contenu, $dateCreation, $categorie) {
        try {
            $stmt = $this->db->prepare("INSERT INTO article (titre, contenu, dateCreation, categorie) VALUES (:titre, :contenu, :dateCreation, :categorie)");
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':contenu', $contenu);
            $stmt->bindParam(':dateCreation', $dateCreation);
            $stmt->bindParam(':categorie', $categorie);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la création de l'article : " . $e->getMessage();
            return false;
        }
    }

    public function getAllArticles() {
        try {
            $stmt = $this->db->prepare("SELECT * FROM article");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la lecture des articles : " . $e->getMessage();
            return false;
        }
    }

    public function getAllArticlesByCategory($categorieId) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM article WHERE categorie = :categorieId");
            $stmt->bindParam(':categorie', $categorieId);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la lecture des articles : " . $e->getMessage();
            return false;
        }
    }

    public function readArticle($articleId) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM article WHERE id = :id");
            $stmt->bindParam(':id', $articleId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la lecture de l'article : " . $e->getMessage();
            return false;
        }
    }

    public function updateArticle($articleId, $titre, $contenu, $dateCreation, $dateModification, $categorie) {
        try {
            $stmt = $this->db->prepare("UPDATE article SET title = :title, content = :content, dateModification = :dateModification, categorie = :categorie WHERE id = :id");
            $stmt->bindParam(':id', $articleId);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':dateModification', $dateModification);
            $stmt->bindParam(':categorie', $categorie);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour de l'article : " . $e->getMessage();
            return false;
        }
    }

    public function deleteArticle($articleId) {
        try {
            $stmt = $this->db->prepare("DELETE FROM article WHERE id = :id");
            $stmt->bindParam(':id', $articleId);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression de l'article : " . $e->getMessage();
            return false;
        }
    }
}
?>