<?php
// Inclure le fichier config
include "config.php";
// Definir les variables
$reference = $nom = $description = $prixachat = $prixvente = $quantite = $type="";
$reference_err = $name_err = $description_err = $prixachat_err = $prixvente_err = $quantite_err = $type_err="";
 
// Traitement
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Validate reference
$input_reference = trim($_POST["reference"]);
if(empty($input_reference)){
    $reference_err = "Veuillez entrez la reference du produit.";
} else{
    $reference = $input_reference;
}
    // Validate name
    $input_name = trim($_POST["nom"]);
    if(empty($input_name)){
        $name_err = "Veuillez entrez un nom.";
    } else{
        $nom = $input_name;
    }
    
    // Validate description
    $input_description = trim($_POST["descript"]);
    if(empty($input_description)){
        $description_err = "Veuillez entrez une description.";     
    } else{
        $description = $input_description;
    }

    // Validate prixachat
    $input_prixachat = trim($_POST["prix_achat"]);
    if(empty($input_prixachat)){
        $prixachat_err = "Veuillez entrez le prix d'achat.";
     } elseif(!ctype_digit($input_prixachat)){
            $prixachat_err = "Veuillez entrez une valeur positive.";     
    } else{
        $prixachat = $input_prixachat;
    }

    // Validate prix vente
    $input_prixvente = trim($_POST["prix_vente"]);
    if(empty($input_prixvente)){
        $prixvente_err = "Veuillez entrez le prix de vente.";  
     } elseif(!ctype_digit($input_prixvente)){
            $prixvente_err = "Veuillez entrez une valeur positive.";   
    } else{
        $prixvente = $input_prixvente;
    }
    
    // Validate quantite
    $input_quantite = trim($_POST["quantite"]);
    if(empty($input_quantite)){
        $quantite_err = "Veuillez entrez les quantites.";     
    } elseif(!ctype_digit($input_quantite)){
        $quantite_err = "Veuillez entrez une valeur positive.";
    } else{
        $quantite = $input_quantite;
    }
    
// Validate Type de produit
    $input_type = trim($_POST["typ"]);
    if(empty($input_type)){
        $type_err = "Veuillez entrez un type.";     
    } else{
         $type = $input_type;
    }

    // verifiez les erreurs avant enregistrement
    if(empty($reference_err) && empty($name_err) && empty($description_err) && empty($prixachat_err) && empty($prixvente_err) && empty($quantite_err) && empty($type_err)){
               // Prepare an insert statement
        $sql = "INSERT INTO STOCKS (reference, nom, descript, prix_achat, prix_vente, quantite, typ) VALUES (?, ?, ?, ?, ?, ?, ?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Lier les variables à la requette preparée
            mysqli_stmt_bind_param($stmt, "sssddds", $param_reference, $param_nom, $param_description, $param_prixachat, $param_prixvente, $param_quantite, $param_type);
            // Regler les parametres
            $param_reference =$reference;
            $param_nom = $nom;
            $param_description = $description;
            $param_prixachat = $prixachat;
            $param_prixvente = $prixvente;
            $param_quantite = $quantite;
            $param_type=$type;
                      
            // executer la requette
            if(mysqli_stmt_execute($stmt)){
                // opération effectuée, retour
                header("location: index.php");
                exit();
            } else{
                echo "Oops! une erreur est survenue.";
            }
            
        }
        
        // Close statement
         mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .wrapper{
            width: 700px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="menu">
<?php include 'header.php';?>
</div>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Ajouter un produit Vap Factory</h2>
                    <p>Remplissez le formulaire pour ajouter des nouveaux produits</p>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                   
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="typ" id="cigarette" value="Vapoteuses" checked>
                        <label class="form-check-label" for="inlineRadio1">Vapoteuses </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="typ" id="liquide" value="E-Liquides">
                        <label class="form-check-label" for="inlineRadio2">Liquides</label>
                    </div>

                    <div class="form-group">
                            <label>Reference</label>
                            <input type="text" name="reference" class="form-control <?php echo (!empty($reference_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $reference; ?>">
                            <span class="invalid-feedback"><?php echo $reference_err;?></span>
                        </div>    
                    <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="nom" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nom; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="descript" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>"><?php echo $description; ?></textarea>
                            <span class="invalid-feedback"><?php echo $ecole_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Prix achat</label>
                            <input type="number" step="any" name="prix_achat" class="form-control <?php echo (!empty($prixachat_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prixachat; ?>">
                            <span class="invalid-feedback"><?php echo $prixachat_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Prix Vente</label>
                            <input type="number" name="prix_vente" class="form-control <?php echo (!empty($prixvente_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prixvente; ?>">
                            <span class="invalid-feedback"><?php echo $prixvente_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Quantite</label>
                            <input type="number" name="quantite" class="form-control <?php echo (!empty($quantite_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quantite; ?>">
                            <span class="invalid-feedback"><?php echo $quantite_err;?></span>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                        <a href="index.php" class="btn btn-secondary ml-2">Annuler</a>

                        

                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>