<?php
include 'C:/xampp/htdocs/LocalArt/Model/user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user1 = new user(0, "0", "0", "0", "0");

    if (isset($_POST['addUser'])) {
        $id_user = $_POST['id_user'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $state = $_POST['state'];
        $user1->AddUser($id_user, $nom, $email, $password, $state);
    } elseif (isset($_POST['deleteUserId'])) {
        $userId = $_POST['deleteUserId'];
        $user1->DeleteUser($userId);
    }

    // Redirect back to the same page after form submission
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$user1 = new user(0, "0", "0", "0", "0");
$users = $user1->Getuser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Table</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <style>
        /* Add some basic styling to the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        /* Style the delete button */
        .delete-button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            cursor: pointer;
        }

        /* Style the add user form */
        .add-user-form {
            display: none;
        }

        .add-user-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-bottom: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>User Table</h1>
    <button class="add-user-button" onclick="toggleAddUserForm()">Add User</button>

    <!-- Add User Form -->
    <div class="add-user-form">
        <form method="POST" action="">
            <label for="id_user">ID User:</label>
            <input type="text" name="id_user" required>
            <br>
            <label for="nom">Nom:</label>
            <input type="text" name="nom" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <br>
            <label for="state">State:</label>
            <input type="text" name="state" required>
            <br>
            <input type="submit" name="addUser" value="Add User">
        </form>
    </div>

    <?php if (!empty($users)) { ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID User</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Password</th>
                <th>State</th>
                <th>Action</th> <!-- Add a new column for the delete button -->
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo $user['id_user']; ?></td>
                    <td><?php echo $user['nom']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['password']; ?></td>
                    <td><?php echo $user['state']; ?></td>
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="deleteUserId" value="<?php echo $user['id_user']; ?>">
                            <button class="delete-button" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No users found.</p>
    <?php } ?>
</div>

<script>
    function toggleAddUserForm() {
        var addUserForm = document.querySelector(".add-user-form");
        addUserForm.style.display = (addUserForm.style.display === "none") ? "block" : "none";
    }
</script>

</body>
</html>
