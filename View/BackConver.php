<?php
include "../Controller/messageC.php";
include '../Controller/phpfunctions.php';
$c = new messageC();
$tab = $c->listmessages();
?>
<center>
    <h1>List of Messages</h1>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id message</th>
        <th>Id conversation</th>
        <th>Id utilisateur</th>
        <th>message</th>
        <th>Time sent</th>
        <th>sent_by</th>
        <!--<th>Delete</th>-->
    </tr>

    <?php
    foreach ($tab as $message) {
    ?>
        <tr>
            <td><?= $message['idm']; ?></td>
            <td><?= $message['idcon']; ?></td>
            <td><?= $message['idu']; ?></td>
            <td><?= $message['mess']; ?></td>
            <td><?= formaterDate($message['sent']); ?></td>
            <td><?= aouc($message['sent_by']); ?></td>
            <!--
            <td align="center">
                <form method="POST" action="updatemessage*.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP // echo $message['id']; ?> name="id">
                </form>
            </td>
            <td>
                <a href="deletemessage*.php?id=<?php //$message['id']; ?>">Delete</a>
            </td>-->
        </tr>
    <?php
    }
    ?>
</table>