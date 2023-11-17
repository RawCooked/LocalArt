<?php

require '../config.php';

class articleA
{
    

    public function listArticles() {
        try {
            $pdo = config::getConnexion(); // Get the PDO connection using the config class

            $query = $pdo->prepare('SELECT * FROM article');
            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            if ($result) {
                return $result; // Return the result to the caller
            } else {
                return null; // No records found
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
  
    public function addArticle($id,$cat,$tit,$art,$cont): bool
    {
        try {
            $pdo = config::getConnexion(); // Get the PDO connection using the config class
    
            $query = $pdo->prepare('INSERT INTO article (id_art, categorie, 	titre, nomprenom_artiste	, contenu) VALUES (?, ?, ?, ?, ?)');
            $query->execute([$id,$cat,$tit,$art,$cont]);
    
            // Check if the query was successful
            if ($query->rowCount() > 0) {
                return true; // Player added successfully
            } else {
                return false; // Player not added
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false; // An error occurred
        }
    }   

    function showArticle($id_art)
    {
        $sql = "SELECT * from article where id_art = :id_art";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $article = $query->fetch();
            return $article;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

  /* u */

  
public function deleteArticle($id_art): bool
{
    try {
        $pdo = config::getconnexion();

        $query = $pdo->prepare('DELETE FROM article WHERE id_art = ?');
        $query->execute([$id_art]);

        return $query->rowCount() > 0;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

public function updateArticle($articleId,$categorie,$titre,$nomprenom_artiste,$contenu): bool
    {
        try {
            $pdo = config::getConnexion();

            $query = $pdo->prepare('UPDATE article SET categorie=?, titre=?, nomprenom_artiste=?, contenu=? WHERE id_art = ?');
            $query->execute([$categorie,$titre,$nomprenom_artiste,$contenu,$articleId]);

            // Check if the query was successful
            if ($query->rowCount() > 0) {
                return true; // User updated successfully
            } else {
                return false; // User not found or not updated
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false; // An error occurred
        }
    }


  
}




?>