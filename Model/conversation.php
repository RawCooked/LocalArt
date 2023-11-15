<?php
class conversation {
    private ?int $id_conversation =null;
    private ?int $id_artist =null;
    private ?int $id_client =null;
    private ?string $created_at =null;
    private ?string $updated_at =null;

    public function __construct($idc = null, $ida = null, $idcl = null, $c, $u)
    {
        $this->id_conversation = $idc;
        $this->id_artist = $ida;
        $this->id_client =$idcl;
        $this->created_at = $c; //created
        $this->updated_at = $u; //updated
    }


    public function getIdConver()
    {
        return $this->id_conversation;
    }


    public function getIdartist()
    {
        return $this->id_artist;
    }

    public function getIdclient()
    {
        return $this->id_client;
    }

    public function setCreated($created)
    {
        $this->created_at = $created;

        return $this;
    }
    public function getCreated()
    {
        return $this->created_at;
    }

    public function setUpdated($updated)
    {
        $this->updated_at = $updated;
        return $this;
    }
    public function getUpdated()
    {
        return $this->updated_at;
    }
}
?>