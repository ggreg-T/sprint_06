<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .wrapper{
            width: 900px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
   
</head>
<body>

<?php 
// recuperation de la reference
$search =  $_POST["search_ref"];
 ?>

<div class="menu">
<?php include 'header.php';?>
</div>


    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 d-flex justify-content-between">
                        <h2 class="pull-left">Vap Factory</h2>
                        <a href="create.php" class="btn btn-outline-danger"><i class="bi bi-plus"></i> Créer une nouvelle entrée</a>
                    </div>
                    <?php

                    // Inclure le fichier config
                    include "config.php";
                    
                    // select query execution
                    $sql = "SELECT * FROM STOCKS WHERE reference ='$search'";
                    
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Réference</th>";
                                        echo "<th>Nom</th>";
                                        echo "<th>Description</th>";
                                        echo "<th>Prix achat</th>";
                                        echo "<th>Prix vente</th>";
                                        echo "<th>Quantité</th>";
                                        echo "<th>Type</th>";
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['reference'] . "</td>";
                                        echo "<td>" . $row['nom'] . "</td>";
                                        echo "<td>" . $row['descript'] . "</td>";
                                        echo "<td>" . $row['prix_achat'] . "</td>";
                                        echo "<td>" . $row['prix_vente'] . "</td>";
                                        echo "<td>" . $row['quantite'] . "</td>";
                                        echo "<td>" . $row['typ'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="read.php?id='. $row['id'] .'" class="me-3" ><span class="bi bi-eye"></span></a>';
                                            echo '<a href="update.php?id='. $row['id'] .'" class="me-3" ><span class="bi bi-pencil"></span></a>';
                                            echo '<a href="delete.php?id='. $row['id'] .'" ><span class="bi bi-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>Pas d\'enregistrement</em></div>';
                        }
                    } else{
                        echo "Cette réference n'existe pas, vous pouvez la céer";
                    }
 
                    // Fermer connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>







<!-- Welcome <?php echo $_POST["search_ref"]; ?><br>
La reference est la suivante: <?php echo $_POST["search_ref"]; ?> -->

