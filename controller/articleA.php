<?php

require '../config.php';

class articleA
{

    public function listArticles()
    {
        $sql = "SELECT * FROM article";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteArticle($id_art)
    {
        $sql = "DELETE FROM article WHERE id_art = :id_art";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_art', $id_art,PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addArticle($article)
    {
        $sql = "INSERT INTO article  
        VALUES (NULL, :categorie,:titre,:date_creation,:date_modification,:nomprenom_artist,:contenu)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'categorie' => $article->getCategorie(),
                'titre' => $article->getTitre(),
                'date_creation' => $article->getDatecreation(),
                'date_modification' => $article->getDatemodification(),
                'nomprenom_artiste' => $article-getNomprenomartiste(),
                'contenu' => $article->getContenu()
            ]);
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showArticle($id_art)
    {
        $sql = "SELECT * from article where id_art = :id_art";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $req->bindValue(':id_art', $id_art,PDO::PARAM_INT);
            $query->execute();
            $article = $query->fetch();
            return $article;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateArticle($article, $id_art)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                
                'UPDATE article SET 
                    categorie = :categorie, 
                    titre = :titre,  
                    date_creation = :date_creation,
                    date_modification = :date_modification,
                    nomprenom_artiste= :nomprenom_artiste,
                    contenu = :contenu
                WHERE id_art= :id_art'
            );
            
            $query->execute([
                'id_art' => $id_art,
                'categorie' => $article->getCategorie(),
                'titre' => $article->getTitre(),
                'date_creation' => $article->getDatecreation(),
                'date_modification' => $article->getDatemodification(),
                'nomprenom_artiste' => $article-getNomprenomartiste(),
                'contenu' => $article->getContenu(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
