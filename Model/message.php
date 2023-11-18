<?php
class message {
    private ?int $id_message =null;
    private ?int $id_conversation =null;
    private ?int $id_utilisateur =null;
    private ?string $message=null;
    private ?string $sent_at =null;
    private ?string $type=null;
    private ?string $sent_by=null;

    public function __construct($idc = null, $ida = null, $idcl = null,$message, $s,$t,$sen)
    {
        $this->id_message = $idc;
        $this->id_conversation = $ida;
        $this->id_utilisateur =$idcl;
        $this->message=$message;
        $this->sent_at = $s; //sent
        $this->type=$t;
        $this->sent_by=$sen;
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


    public function getMessagee()
    {
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

    public function settype($type)
    {
        $this->type = $type;
        return $this->type;
    }

    public function gettype()
    {
        return $this->type;
    }

    public function setsent_by($sen)
    {
        $this->sent_by = $sen;
        return $this->sent_by;
    }

    public function getsent_by()
    {
        return $this->sent_by;
    }
}
?>