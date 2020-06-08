<form action="../items/insert" method="post">
    <input type="text" value="I have to..." onclick="this.value = ''" name="todo"> <input type="submit" value="insert">
</form>
<br/><br/>
<?php
$number = 0
?>

<?php foreach ($todo as $todoitem): ?>
    <a class="big" href="../items/view/<?php echo $todoitem['Item']['id'] ?>/<?php echo strtolower(str_replace(" ", "-", $todoitem['Item']['name'])) ?>">
        <span class="item">
            <?php echo ++$number ?>
            <?php echo $todoitem['Item']['name'] ?>
        </span>
    </a><br/>
<?php endforeach ?>
