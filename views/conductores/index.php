<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>conductores</title>
</head>
<body>
    <?php require 'views/nav.php';?>
    <h2>Conductores</h2>
    <?php
        print_r($this->conductores); 
    ?>
    <table class="table table-dark table-hover mt-4 ">
        <thead  class="sticky-top">
            <tr>
                <?php
                $conductor = $this->conductores[0];  
                foreach( $conductor as $key => $value){

                ?>
                <th><?= $key ?></th>
                <?php
                }       
                ?>
            </tr>

        </thead>
        <tbody>
                <?php
                $conductor = $this->conductores[0];  
                foreach( $conductor as $key => $value){

                ?>
                <th><?= $key ?></th>
                <?php
                }       
                ?>
        </tbody>
    </table>
</body>
</html>