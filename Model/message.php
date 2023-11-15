<?php
class message {
    private ?int $id_message =null;
    private ?int $id_conversation =null;
    private ?int $id_utilisateur =null;
    private ?string $message=null;
    private ?string $sent_at =null;

    public function __construct($idc = null, $ida = null, $idcl = null,$message, $s)
    {
        $this->id_message = $idc;
        $this->id_conversation = $ida;
        $this->id_utilisateur =$idcl;
        $this->message=$message;
        $this->sent_at = $s; //sent
    }

    public function getIdmessage()
    {
        return $this->id_message;
    }

    public function setmessage($mess)
    {
        $this->message = $mess;
        return $this->message;
    }

    public function getIdconversation()
    {
        return $this->id_conversation;
    }

    public function getIdutilisateur()
    {
        return $this->id_utilisateur;
    }

    public function setsent($sent)
    {
        $this->sent_at = $sent;

        return $this;
    }
    public function getsent()
    {
        return $this->sent_at;
    }

}
?>