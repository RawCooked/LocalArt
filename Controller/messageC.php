<?php

require '../config.php';
include_once '../Model/message.php';
class messageC
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


    function addmessage($message)
    {
        $sql = "INSERT INTO messages  
        VALUES (NULL, :idcon,:idu, :mess,:sent,:sent_by)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idcon' => $message->getIdconversation(),
                'idu' => $message->getIdutilisateur(),
                'mess' => $message->getMessagee(),
                'sent' => $message->getsent(),
                'sent_by'=>$message->getsent_by()]);    
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
                    sent = :sent,
                    sent_by=:sent_by
                WHERE id= :id'
            );
            
            $query->execute([
                'id' => $id,
                'idcon' => $message->getIdconversation(),
                'idu' => $message->getIdutilisateur(),
                'mess' => $message->getIdmessage(),
                'sent' => $message->getsent(),
                'sent_by'=>$message->getsent_by()]);            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function countmessages()
{
    $sql = "SELECT COUNT(*) as nbre FROM messages";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result !== false) {
            return $result['nbre'];
        } else {
            
            return 0;
        }
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

    public function getSubjectsBySubject()
    {
       /* $sql = "SELECT sujet, COUNT(*) AS nombre FROM reclamation GROUP BY sujet";*/
       $sql = "SELECT
       sujet,
       COUNT(*) AS nombreMess
   FROM messages
   WHERE sujet IN ('Signaler un texte abus', 'Signaler un problème', 'autres')
   GROUP BY sujet";
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
