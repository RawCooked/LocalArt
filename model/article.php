<?php
//require '../config.php';
class article
{
    private ?int $id_art= null ;
    private ?string $categorie= null ;
    private ?string $titre= null ;
    private ?string $nomprenom_artiste= null ;
    private ?string $contenu= null ;

     public function __construct($id= null , $ca, $t,$n,$c,)
    {
        $this->id_art = $id;
        $this->categorie = $ca;
        $this->titre = $t;
        //$this->date_creation = $dc;
        //$this->date_modification = $dm;
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
    public function setnomprenom_artist($nomprenom_artiste)
    {
        $this->nomprenom_artist = $nomprenom_artist;

        return $this;
    }

/*
$article= new article;
$liste=$article->listArticles();
foreach($liste as $list){
    echo($list["titre"]);
    echo "<hr>";
*/


}
?>