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
        VALUES (NULL, :idcon,:idu, :mess,:sent,:state)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idcon' => $message->getIdconversation(),
                'idu' => $message->getIdutilisateur(),
                'mess' => $message->getMessagee(),
                'sent' => $message->getsent(),
                'state'=>$message->getstate()]);    
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
                    state=:state
                WHERE id= :id'
            );
            
            $query->execute([
                'id' => $id,
                'idcon' => $message->getIdconversation(),
                'idu' => $message->getIdutilisateur(),
                'mess' => $message->getIdmessage(),
                'sent' => $message->getsent(),
                'state'=>$message->getstate()]);            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


}


    function getSubjectsBySubject()
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
