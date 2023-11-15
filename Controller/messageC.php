<?php

require '../config.php';
include_once '../Model/message.php';
class messageC extends message
{
    public function listmessages()
    {
        $sql = "SELECT * FROM messages";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletemessage($ide)
    {
        $sql = "DELETE FROM messages WHERE idm = :idm";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idm', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addmessage($message,$text)
    {
        $sql = "INSERT INTO messages  
        VALUES (NULL, :idcon,:idu, :mess,:sent)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idcon' => $message->getIdconversation(),
                'idu' => $message->getIdutilisateur(),
                'mess' => $text,
                'sent' => $message->getsent(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showmessage($id)
    {
        $sql = "SELECT * from messages where idm = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $message = $query->fetch();
            return $message;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatemessage($message, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE message SET 
                    idcon = :idcon, 
                    idu = :idu, 
                    mess = :mess, 
                    sent = :sent
                WHERE id= :id'
            );
            
            $query->execute([
                'id' => $id,
                'idcon' => $message->getIdconversation(),
                'idu' => $message->getIdutilisateur(),
                'mess' => $message->getIdmessage(),
                'sent' => $message->getsent(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
