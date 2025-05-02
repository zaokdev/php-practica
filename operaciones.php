<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con PHP</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.3/cosmo/bootstrap.min.css
" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Hola mundo</h1>
    <?php
        //PRINTS
        echo "<h1>Hola mundo desde PHP</h1>"; 
        //VARIABLES
        $texto = "<p>Probando variable desde PHP</p>";
        echo $texto;
        
        //USANDO FUNCIONES DE OTRO ARCHIVO
    ?>
    
    <p>Hoy es <?=hoy()?></p>
</body>
</html>