<?php
    $this->title = 'Управления Испытаниями';
?>

<button class="add">Добавить испытания</button>

<table>
    <tr>
        <th>Тип испытания</th>
        <th>Пол</th>
        <th>Возрастная категория</th>
        <th>Приоритет</th>
    </tr>
    <?php foreach ($data as $elem):?>
    <tr>
        <td><?=$elem['type_trials']?></td>
        <td><?=$elem['floor']?></td>
        <td><?=$elem['age']?></td>
        <td><?=$elem['priority']?></td>
        <td><a href="?id=<?=$elem['id']?>"><i>картинка</i></a></td>
    </tr>
    <?php endforeach;?>
</table>

<form method="post">
    <ul>
        <li><label>Тип испытания: </label><input type="text" name="type_trial"></li>
        <li><label>Пол: </label><input type="text" name="floar"></li>
        <li><label>Возрастная категори: </label><input type="text" name="age"></li>
        <li><label>Приоритет: </label><input type="number" name="number"></li>
    </ul>
    <input type="submit" name="addTrial" value="Добавить">
</form>


