<?php
require 'C:/xampp/htdocs/LocalArt/config.php';


// Le reste du code HTML
class user{

    private int $id_user;
    private string $nom;
    public string $email;
    private string $password;
    private string $state;

    public function __construct($id_user,$nom,$email,$password,$state) {
    $this->id_user=$id_user;
    $this->nom = $nom;
    $this->email = $email;
    $this->password = $password;
    $this->state = $state;
}


    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
    public function getPnom()
    {
        return $this->pnom;
    }
    public function setPnom($pnom)
    {
        $this->pnom = $pnom;

        return $this;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    public function getid_user()
    {
        return $this->id_user;
    }
    public function setid_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }


    public function Getuser() {
        try {
            $pdo = config::getConnexion(); // Get the PDO connection using the config class

            $query = $pdo->prepare('SELECT * FROM user');
            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            if ($result) {
                return $result; // Return the result to the caller
            } else {
                return null; // No records found
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function Adduser($id_user ,$nom, $email, $password, $state): bool
    {
        try {
            $pdo = config::getConnexion(); // Get the PDO connection using the config class
    
            $query = $pdo->prepare('INSERT INTO user (id_user, nom, email, password, state) VALUES (?, ?, ?, ?, ?)');
            $query->execute([$id_user, $nom, $email, $password, $state]);
    
            // Check if the query was successful
            if ($query->rowCount() > 0) {
                return true; // Player added successfully
            } else {
                return false; // Player not added
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false; // An error occurred
        }
    }


    
   
}




?>
