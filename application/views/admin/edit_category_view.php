<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    // print_r($category);
?>
    <?php echo form_open("CategoryController/update_category/".$category[0]->id) ?>
        <input type="text" readonly  value="<?php echo $category[0]->id;?>">
        <input type="text" name="category_name" value="<?php echo $category[0]->category_name;?>">
        <input type="submit" value="update">
    <?php echo form_close() ?>
</body>
</html>