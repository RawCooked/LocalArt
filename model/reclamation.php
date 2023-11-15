<?php
class reclamation
{
    private ?int $id_rec = null;
    private ?string $nom = null;
    private ?string $sujet = null;
    private ?string $texte = null;
    

    public function __construct($id = null, $n, $s, $t)
    {
        $this->id_rec = $id;
        $this->nom = $n ;
        $this->sujet = $s;
        $this->texte = $t;
        
    }


    public function getIdreclamation()
    {
        return $this->id_rec;
    }


    public function getdate()
    {
        return $this->nom;
    }


    public function setdate($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function getsujet()
    {
        return $this->sujet;
    }


    public function setsujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }


    public function gettexte()
    {
        return $this->texte;
    }


    public function settexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

}
?>