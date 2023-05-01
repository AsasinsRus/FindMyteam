<?php
    session_start();
    require_once 'includes/connect.php';

    $users = mysqli_query($connect, "SELECT * FROM `users`");
?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Ім'я</th>
          <th scope="col">Логін</th>
          <th scope="col">E-mail</th>
          <th scope="col">Пароль</th>
          <th scope="col">Роль</th>
        <?php
           if($_SESSION['user']['role'] == 'admin')
            {
                ?><th scope="col">Дія</th><?php
            }
        ?>
        </tr>
      </thead>
      <tbody>
<?php

    if($_SESSION['user']['role'] == 'admin')
    {
        foreach ($users as $user)
        {
            ?>
            <tr>
                <th scope="row"><?= $user['id']?></th>
                <td><?= $user['full_name']?></td>
                <td><?= $user['login']?></td>
                <td><?= $user['email']?></td>
                <td><?= $user['password']?></td>
                <td><?= $user['role']?></td>
                <?php if($_SESSION['user']['login'] != $user['login']) {?>
                <td><a href="includes/user-panel/change-user-menu.php?id=<?=$user['id']?>">змінити</a><br>
                    <a href="includes/user-panel/delete-confirmation.php?id=<?=$user['id']?>">видалити</a></td>
                <?php
                }
                else
                {?>
                    <td><a href="includes/user-panel/change-user-menu.php?id=<?=$user['id']?>">змінити</a></td>
                <?php
                }?>
            </tr>
            <?php
        }
    }
    else
    {
        foreach ($users as $user)
        {
            ?>
            <tr>
                <th scope="row"><?= $user['id']?></th>
                <td><?= $user['full_name']?></td>
                <td><?= $user['login']?></td>
                <td><?= $user['email']?></td>
                <td><?= $user['password']?></td>
                <td><?= $user['role']?></td>
            </tr>
            <?php
        }
    }
?>
      </tbody>
    </table>


