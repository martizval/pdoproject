<?php

require_once 'db.php';
$db =new DB();
$data=$db->getData();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title>PDO PROJECT</title>
    </head>
    <body>
        <h1>PDO</h1>
        <div class="container">
            <div class="left-pane">
                <h2>Insertar</h2>
                <form action="insert.php" method="POST">
                    <input type="text" name="name"
                           placeholder="Name" class="gt-input rounded-left">
                    <input type="submit" name="insertData"
                           value="Insert" class="gt-button rounded-right">
                </form>
                <h2>Borrar</h2>
                <form action="deleteData.php" method="POST">
                    <select name="id" id="deleteList"
                            class="gt-input full-width rounded-left">
                        <?php foreach ($data as $item){?>
                        <option value="<?php echo $item['id']?>"><?php echo $item['id']. ' - '.$item['name'] ?></option>
                        <?php }?>
                    </select>
                    <input type="submit" name="deleteData"
                           value="Delete" class="gt-button rounded-right">
                    </form>
                    <h2>Editar</h2>
                    <form action="editData.php" method="POST">
                        <select name="id" id="editList" class="gt-input 
                                full-width rounded-left">
                        <?php foreach ($data as $item){?>
                        <option value="<?php echo $item['id']?>"><?php echo $item['id']. ' - '.$item['name'] ?></option>
                        <?php }?>
       
                        </select>
                        <input type="text" name="name"
                               placeholder="Name" class="gt-input">
                        <input type="submit" name="editData"
                               value="Update" class="gt-button rounded-right">
                    </form>
            </div>
            
            <div class="right-pane">
                <h2>Data</h2>
                
                <form method="POST">
                    <input type="text" name="name" placeholder="Search Name"
                           class="gt-input rounded-left rounded-right">
                </form>
                <div class="data-wrapper">
                    <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $i){?>
                        <tr>
                            <td><?php echo $i['id']?></td>
                            <td><?php echo $i['name']?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </body>
</html>
