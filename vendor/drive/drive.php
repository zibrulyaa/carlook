<table class="table">
    <tbody>
    <tr>
        <th>Название</th>
        <th class="edit"></th>
        <th class="edit"></th>
    </tr>
    <?php
    $drives = getDrive();
    foreach ($drives as $drive):
        $id = $drive['id'];?>
        <tr>
            <td><?php  echo $drive['name']?></td>
            <td class="edit">
                <a class="edit__link" href="vendor/drive/popup.php?id=<?=$id;?>"><img src="images/edit.svg" alt=""></a>
            </td>
            <td class="edit">
                <a class="edit__link" href="vendor/drive/delete.php?id=<?=$id;?>"><img src="images/delete.svg" alt=""></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>