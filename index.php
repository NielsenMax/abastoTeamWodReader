<?php
require_once 'simplexlsx-master/src/SimpleXLSX.php';

if (! $wod = SimpleXLSX::parse('CICLO2.xlsx') ) {
  
  echo SimpleXLSX::parse_error();
}

$rows = $wod->rows();
$columns = Array(Array());

foreach (range(0,count($rows)) as $i) {
    if(!empty($rows[$i])){
    foreach (range(0,count($rows[$i])) as $j) {
        if(!empty($rows[$i][$j])){
            $columns[$j][$i] = $rows[$i][$j];
        }
    }
    }
}

$index;
?>
<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Team Abasto</title>
    </head>
    <body>
        <div class="jumbotron text-center">
            <h1>Team Del Abasto</h1>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <?php
                if(! empty($_GET["index"])){
                    echo '<a href="index.php?index=' . ($_GET["index"] - 1) . '" class="btn btn-primary"><</a>';
                }
                ?>
                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Día
                    </button>
                    <div class="dropdown-menu">
                    <?php 
                    foreach(range(1,count(array_filter($rows[0]))) as $i){
                        if(!empty( $rows[0][$i])){
                        echo '<a class="dropdown-item" href=index.php?index=' . $i .'>' . $rows[0][$i] . '</a>'; 
                        }
                    }
                    ?>
                    </div>
                </div>
                <?php
                if(! empty($_GET["index"]) && !empty($columns[$_GET["index"] + 1])){
                echo '<a href="index.php?index=' . ($_GET["index"] + 1) . '" class="btn btn-primary">></a>';
                }
                ?>
            </div>
            <div class="row justify-content-center">
                <a href="index.php?index=0" class="btn btn-primary">WARM UP</a>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-sm-8 text-center">
                    <ul class="list-group">
                    <?php 
                    if(!empty($_GET["index"])){
                        foreach (array_filter($columns[$_GET["index"]]) as $cell) {
                        //echo '<li class="list-group-item list-group-item-secondary">' . $cell . '</li>';
                            if( strpos($cell,"WOD") !== false ){
                                echo '<li class="list-group-item list-group-item-warning">' . $cell . '</li>';
                            }elseif(strpos($cell,"WEIGHTLIFTING & STRENGHT") !== false){
                                echo '<li class="list-group-item list-group-item-danger">' . $cell . '</li>';
                            }elseif(strpos($cell,"STAMINA") !== false){
                                echo '<li class="list-group-item list-group-item-success">' . $cell . '</li>';
                            }elseif(strpos($cell,"MIDLINE") !== false){
                                echo '<li class="list-group-item list-group-item-info">' . $cell . '</li>';
                            }elseif(strpos($cell,"GIMNASTIC") !== false){
                                echo '<li class="list-group-item list-group-item-primary">' . $cell . '</li>';
                            }elseif(strpos($cell,"STRUCTURE") !== false){
                                echo '<li class="list-group-item list-group-item-primary">' . $cell . '</li>';
                            }elseif(strpos($cell,"Día") !== false){
                                echo '<li class="list-group-item list-group-item-secondary">' . $cell . '</li>';
                            }
                            else{
                                echo '<li class="list-group-item list-group-item-light text-dark">' . $cell . '</li>';
                                
                        }
                    }
                    }else{
                        foreach (array_filter($columns[0]) as $cell) {
                            if(strpos($cell,"WARM UP") !== false){
                                echo '<li class="list-group-item list-group-item-success">' . $cell . '</li>';
                            }else{
                            echo '<li class="list-group-item list-group-item-light text-dark">' . $cell . '</li>';
                            }
                        }
                    }
                    ?>
                    </ul>
                    <blockquote class="blockquote">
                    <footer class="blockquote-footer">Team del Abasto Ciclo 2</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>