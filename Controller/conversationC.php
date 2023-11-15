<?php

require '../config.php';

class conversationC
{
    public function listconversations()
    {
        $sql = "SELECT * FROM conversations";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteconversation($ide)
    {
        $sql = "DELETE FROM conversations WHERE idcon = :idcon";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idcon', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addconversation($conversation)
    {
        $sql = "INSERT INTO conversations  
        VALUES (NULL, :idart,:idcl, :created,:updated)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idart' => $conversation->getIdconversation(),
                'idcl' => $conversation->getIdutilisateur(),
                'created' => $conversation->getIdconversation(),
                'updated' => $conversation->getsent(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showconversation($id)
    {
        $sql = "SELECT * from conversations where idcon = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $conversation = $query->fetch();
            return $conversation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateconversation($conversation, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE conversation SET 
                    idart = :idart, 
                    idcl = :idcl, 
                    created = :created, 
                    updated = :updated
                WHERE idcon= :idcon'
            );
            
            $query->execute([
                'idcon' => $id,
                'idart' => $conversation->getIdconversation(),
                'idcl' => $conversation->getIdutilisateur(),
                'created' => $conversation->getIdconversation(),
                'updated' => $conversation->getsent(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
