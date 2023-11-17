<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup'])) {
        // Handle signup form submission
        $username = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $user1 = new UserC();
        $user1->addUser(0, $username, $email, $hashedPassword, "user");
        header('Location: index.php');
        exit; // Ensure to stop execution after redirection
    } elseif (isset($_POST['login_button'])) {
        // Handle login form submission
        $loginEmail = $_POST['log-email'];
        $loginPassword = $_POST['log-pswd'];
        

        // Perform form validation (you can customize this as needed)
        $loginError = '';
        if (empty($loginEmail) || empty($loginPassword)) {
            $loginError = 'Email and password are required.';
        } else {
            // Assuming your user class has a method to get all users
            $user = new UserC();
            $userList = $user->getAllUsers();

            $isValidLogin = false;

            foreach ($userList as $userData) {
                if ($userData['email'] == $loginEmail && password_verify($loginPassword, $userData['password'])) {
                    // Successful login
                    $isValidLogin = true;
                    header('Location: index.php');
                    exit;
                }
            }

            // Invalid email or password
            $loginError = 'Invalid email or password.';
        }
    }

    



}
?>