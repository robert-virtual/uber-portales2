<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>conductores</title>
    <link rel="stylesheet" href="<?=URL?>public/css/usuarios.css">

</head>
<body>
    <?php require 'views/nav.php';?>
    <h2>Conductores</h2>
   
    <main class="m-4 row">
        <div class="col-8">
            <div class="my-custom-scroll-bar overflow-auto">
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
                            foreach ($this->conductores as $value) {
                            ?>
                                
                                <tr  style="cursor:pointer;" onclick="location.href='/conductores/get/<?=$value['id'] ?>'"  >
                                    <?php
                                    foreach ($conductor as $key => $v) {
                                    ?>
                                        <th scope="row"><?=$value["$key"]?></th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php
                            }
                        ?>
                    </tbody>
                </table>

            </div>

        </div>

    </main>
</body>
</html>