<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user1 = new userC();

    if (isset($_POST['addUser'])) {
        $id_user = $_POST['id_user'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $state = $_POST['state'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $user1->addUser($id_user, $nom, $email, $hashedPassword, $state);
    } elseif (isset($_POST['deleteUserId'])) {
        $userId = $_POST['deleteUserId'];
        $user1->deleteUser($userId);
    } elseif (isset($_POST['updateUser'])) {
        $id_user = $_POST['id_user'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $state = $_POST['state'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $user1->updateUser($id_user, $nom, $email, $hashedPassword, $state);
    }

    // Redirect back to the same page after form submission
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$user1 = new userC();
$users = $user1->getAllUsers();
?>