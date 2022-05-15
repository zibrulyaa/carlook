<table class="table">
    <tbody>
    <tr>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>Должность</th>
        <th>Телефон</th>
        <th class="edit"></th>
        <th class="edit"></th>
    </tr>

    <?php
    $vars = getManager();
    foreach ($vars as $var):
    $id = $var['id'];?>
    <tr>
        <?
            $post = getPostById($var['post']);
        ?>
        <td><?php  echo $var['firstName']?></td>
        <td><?php  echo $var['lastName']?></td>
        <td><?php  echo $var['middleName']?></td>
        <td><?php  echo $post?></td>
        <td><?php  echo $var['phone']?></td>
        <td class="edit">
            <a class="edit__link" href="vendor/manager/popup.php?id=<?=$id;?>"><img src="images/edit.svg" alt=""></a>
        </td>
        <td class="edit">
            <a class="edit__link" href="vendor/manager/delete.php?id=<?=$id;?>"><img src="images/delete.svg" alt=""></a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>