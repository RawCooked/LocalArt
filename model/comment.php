<?php
class commentaire{
    private ?int $id_cmnt= null ;
    private ?string $comment= null ;
    private ?string $nom= null ;
    //private ?string $date_creation= null ;
    //private ?string $date_modification= null ;

     public function __construct($idc= null , $co, $n)
    {
        $this->id_cmnt = $idc;
        $this->comment = $co;
        $this->nom = $n;
        //$this->date_creation = $dc;
        //$this->date_modification = $dm;
    }
 

    public function getid_cmnt()
    {
        return $this->id_cmnt;
    }


    public function getcomment()
    {
        return $this->comment;
    }


    public function setcomment($comment)
    {
        $this->comment = $comment;

        return $this;
    }


    public function getnom()
    {
        return $this->nom;
    }


    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
    public function getDatecreation()
    {
        return $this->date_creation;
    }


    public function setdate_creation($date_creation)
    {
        $this->date_creation = $date_creation;

        return $this;
    }
    public function getDatemodification()
    {
        return $this->date_modification;
    }
    public function setdate_modification($date_modification)
    {
        $this->date_modification = $date_modification;

        return $this;
    }
}
?>