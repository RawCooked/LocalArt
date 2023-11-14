<?php
class article
{
    private ?int $id_art = null;
    private ?string $categorie = null;
    private ?string $titre = null;
    private ?string $date_creation = null;
    private ?string $date_modification = null;
    private ?string $nomprenom_artiste = null;
    private ?string $contenu = null;

    public function __construct($id = null, $ca, $t,$dc,$dm,$n,$c,)
    {
        $this->id_art = $id;
        $this->categorie = $ca;
        $this->titre = $t;
        $this->date_creation = $dc;
        $this->date_modification = $dm;
        $this->nomprenom_artiste = $n;
        $this->contenu = $c;
    }


    public function getid_art()
    {
        return $this->id_art;
    }


    public function getCategorie()
    {
        return $this->categorie;
    }


    public function setcategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }


    public function getTitre()
    {
        return $this->titre;
    }


    public function settitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }


    public function getContenu()
    {
        return $this->contenu;
    }


    public function setcontenu($contenu)
    {
        $this->contenu = $contenu;

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
    public function getNomprenomartiste()
    {
        return $this->nomprenom_artiste;
    }
    public function setnomprenom_artist($nomprenom_artist)
    {
        $this->nomprenom_artist = $nomprenom_artist;

        return $this;
    }
}
?>