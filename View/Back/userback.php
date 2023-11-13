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
        $user1->Adduser($id_user, $nom, $email, $password, $state);
    } elseif (isset($_POST['deleteUserId'])) {
        $userId = $_POST['deleteUserId'];
        $user1->DeleteUser($userId);
    } elseif (isset($_POST['updateUser'])) {
        $id_user = $_POST['id_user'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $state = $_POST['state'];
        $user1->UpdateUser($id_user, $nom, $email, $password, $state);
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

        /* Style the delete and update buttons */
        .delete-button, .update-button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            cursor: pointer;
            margin-right: 5px;
        }

        .update-button {
            background-color: #4CAF50;
        }

        /* Style the add user form */
        .add-user-form {
            display: none;
            position: absolute;
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 5px;
            width: 300px;
            transition: all 0.3s ease;
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
            transition: background-color 0.3s ease;
        }

        .add-user-button:hover {
            background-color: #45a049;
        }

        .add-user-form label {
            display: block;
            margin: 10px 0;
        }

        .add-user-form select, .add-user-form input[type="text"], .add-user-form input[type="email"], .add-user-form input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            transition: border 0.3s ease;
        }

        .add-user-form select:hover, .add-user-form input[type="text"]:hover, .add-user-form input[type="email"]:hover, .add-user-form input[type="password"]:hover {
            border: 1px solid #45a049;
        }

        .add-user-form input[type="submit"] {
            background-color: #45a049;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-user-form input[type="submit"]:hover {
            background-color: #4CAF50;
        }

        /* Style the update user form */
        .update-user-form {
            display: none;
            position: absolute;
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 5px;
            width: 300px;
            transition: all 0.3s ease;
            z-index: 1; /* Ensure the update form is above other elements */
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
            <label for="nom">Nom:</label>
            <input type="text" name="nom" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <label for="state">State:</label>
            <select name="state" required>
                <option value="Admin">Admin</option>
                <option value="Artist">Artist</option>
                <option value="User">User</option>
            </select>
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
                <th>Action</th>
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
                        <button class="update-button" onclick="toggleUpdateUserForm(<?php echo $user['id_user']; ?>)">Update</button>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No users found.</p>
    <?php } ?>

    <!-- Update User Form -->
    <div class="update-user-form" style="width: 500px" >
        <form method="POST" action="">
            <label for="id_user_update">ID User:</label>
            <input type="text" id="id_user_update" name="id_user" required>
            <label for="nom_update">Nom:</label>
            <input type="text" id="nom_update" name="nom" required>
            <label for="email_update">Email:</label>
            <input type="email" id="email_update" name="email" required>
            <label for="password_update">Password:</label>
            <input type="password" id="password_update" name="password" required>
            <label for="state_update">State:</label>
            <select id="state_update" name="state" required>
                <option value="Admin">Admin</option>
                <option value="Artist">Artist</option>
                <option value="User">User</option>
            </select>
            <input type="submit" name="updateUser" value="Update User">
        </form>
    </div>
</div>

<script>
    function toggleAddUserForm() {
        var addUserForm = document.querySelector(".add-user-form");
        addUserForm.style.display = (addUserForm.style.display === "none") ? "block" : "none";
    }

    function toggleUpdateUserForm(userId) {
        var updateUserForm = document.querySelector(".update-user-form");
        updateUserForm.style.display = (updateUserForm.style.display === "none") ? "block" : "none";

        // Populate the update form with user data
        document.getElementById("id_user_update").value = userId;
        // You may need to implement an AJAX request to fetch the user data and fill the form fields accordingly.
    }
</script>

</body>
</html>