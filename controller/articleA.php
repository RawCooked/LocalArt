<?php

include __DIR__ . '/../config.php';

class articleA
{
    

// Assuming you have a PDO connection in $pdo
// You should replace 'your_database_table' with the actual table name in your database

public function checkTitleExists($titl) {
    try {
        
        $pdo = config::getConnexion();
        $query = $pdo->prepare('SELECT COUNT(*) FROM article WHERE titre = :titl');
        $query->bindParam(':titl', $title, PDO::PARAM_STR);
        $query->execute();

        $count = $query->fetchColumn();

        return $count > 0;
    } catch (PDOException $e) {
        // Handle database connection errors
        echo "Error: " . $e->getMessage();
        return false;
    }
}



    public function listArticlesByCategory($category) {
        try {
            $pdo = config::getConnexion(); // Get the PDO connection using the config class
    
            $query = $pdo->prepare('SELECT * FROM article WHERE categorie = :cate ORDER BY article.id_art  ');
            $query->bindParam(':cate', $category, PDO::PARAM_STR);
            $query->execute();
    
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
            if ($result) {
                return $result; // Return the result to the caller
            } else {
                return null; // No records found for the specified category
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
    
    

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
        $sql = "SELECT * FROM article WHERE id_art = :id_art";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id_art', $id_art, PDO::PARAM_INT);
            $query->execute();
    
            // Check if any rows were returned
            if ($query->rowCount() > 0) {
                // Fetch the article
                $article = $query->fetch(PDO::FETCH_ASSOC);
                return $article;
            } else {
                // No rows found, return null or handle the case accordingly
                return null;
            }
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
          // Log the error or throw an exception for the calling code to handle
          // Log: error_log("Error deleting article: " . $e->getMessage());
          // or throw: throw new Exception("Error deleting article: " . $e->getMessage());
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
    public function getSubjectsBycategorie()
    {
       /* $sql = "SELECT sujet, COUNT(*) AS nombre FROM reclamation GROUP BY sujet";*/
       $sql = "SELECT
       categorie,
       COUNT(*) AS nombre
   FROM article
   WHERE categorie IN ('tableau', 'vetement', 'monument','livre','ville')
   GROUP BY categorie";
        $db = config::getConnexion();
        try {
            $statement = $db->query($sql);
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            header('Content-Type: application/json');
            echo json_encode($data);
        } catch (PDOException $e) {
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(["error" => "Internal Server Error"]);
        }
    }
}
$articleA=new articleA();

if (isset($_GET['action'])) {
  if ($_GET['action'] === 'gettype') {
      $articleA->getSubjectsBycategorie();
      exit; // Important to exit to prevent further execution
  }
  // Add more actions if needed
}

header('HTTP/1.1 400 Bad Request');
// echo json_encode(["error" => "Invalid Request"]);
// $reclamationController = new articleA();

// if (isset($_GET['action'])) {
//     if ($_GET['action'] === 'getSubjects') {
//         $reclamationController->getSubjectsBycategorie();
//         exit; // Important to exit to prevent further execution
//     }
//     // Add more actions if needed
// }

//header('HTTP/1.1 400 Bad Request');
//echo json_encode(["error" => "Invalid Request"]);
class commentC{
    public function listcommentsart($idArt) {
        try {
            $pdo = config::getConnexion(); // Get the PDO connection using the config class
    
            // Assuming that 'id_art' is a column in the 'commentaire' table
            $query = $pdo->prepare('SELECT cm.* FROM commentaire cm WHERE cm.id_art = :id');
            $query->bindParam(':id', $idArt, PDO::PARAM_INT);
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
    
    public function listcomments() {
        try {
            $pdo = config::getConnexion(); // Get the PDO connection using the config class

            $query = $pdo->prepare('SELECT * FROM commentaire cm ORDER BY cm.date_creation DESC' );
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
    public function addcomment($idc,$co,$n,$dc,$dm,$i): bool
    {
        try {
            $pdo = config::getConnexion(); // Get the PDO connection using the config class
    
            $query = $pdo->prepare('INSERT INTO commentaire (id_cmnt, comment, 	nom,date_creation,date_modification,id_art) VALUES (?, ?, ?,?,?,?)');
        $query->execute([$idc,$co,$n,$dc,$dm,$i]);
    
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
    public function deletecomment($id_cmnt): bool
  {
      try {
          $pdo = config::getconnexion();
  
          $query = $pdo->prepare('DELETE FROM commentaire WHERE id_cmnt = ?');
          $query->execute([$id_cmnt]);
  
          return $query->rowCount() > 0;
      } catch (PDOException $e) {
          // Log the error or throw an exception for the calling code to handle
          // Log: error_log("Error deleting article: " . $e->getMessage());
          // or throw: throw new Exception("Error deleting article: " . $e->getMessage());
          return false;
      }
  }
  public function updatecomment($commentId,$comment,$nom,$date_modification): bool
    {
        try {
            $pdo = config::getConnexion();

            $query = $pdo->prepare('UPDATE commentaire SET comment=?, nom=?, date_modification=? WHERE id_cmnt = ?');
            $query->execute([$comment,$nom,$date_modification,$commentId]);

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