<?php
include 'C:/xampp/htdocs/LocalArt/Controller/userC.php';
include 'user_back.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Table</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href="assets/css/style_userback.css">
	<script src='assets/js/js_userback.js'></script>
	
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
                        
						<button class="update-button" data-user-id="<?php echo $user['id_user']; ?>">Update</button>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No users found.</p>
    <?php } ?>

    <!-- Update User Form -->
    <div class="update-user-form" style="width: 5000px;"   >
        <form method="POST" action="">
            <label for="id_user_update">ID User:</label>
            <input type="text" id="id_user_update" name="id_user"  required>
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



</body>
</html>