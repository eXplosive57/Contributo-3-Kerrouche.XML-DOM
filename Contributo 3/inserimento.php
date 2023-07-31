<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

    <title>INSERIMENTO SMARTPHONE</title>
    <link rel="stylesheet" href="index.css" />

</head>

<body>




<ul>
    <li><a href="home.php">HOME</a></li>
    <li> <a href="smartphone.php">CATALOGO</a></li>
    <li><a href="logout.php">DISCONNETTI</a></li>
    
    </div>
    </li>
</ul>

<?php 
      if(isset($_SESSION['notok'])) {
        
        ?>

      <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <h3><?php echo $_SESSION['notok'] ?></h3>
        </div>  
<?php
        
        unset($_SESSION['notok']);
      }

?>

<form action="insert.php" method="post">
    <h1>INSERISCI I DATI RELATIVI AL DISPOSITIVO</h1>

    <label for="nomeprodotto">Nome Dispositivo</label>
    <input type="text" name="nomeprodotto" id="nomeprodotto" pattern="[A-Za-z]+" title="Inserisci una stringa">

    <label for="marca">Marca</label>
    <input type="text" name="marca" id="marca" required pattern="[A-Za-z]+" title="Inserisci una stringa">

    <label for="prezzo">Prezzo</label>
    <input type="number" name="prezzo" id="prezzo" required pattern="[0-99]+" title="Inserisci un quantita numerica">

    <label for="descrizione">Descrizione</label>
    <input type="text" name="descrizione" id="descrizione" required pattern="[A-Za-z]+" title="Inserisci una stringa" >

    <label for="immagine">Scegli immagine:</label>
    <input type="file" id="immagine" name="immagine" accept="image/*">

    <label for="batteria">Capacita batteria:</label>
    <input type="number" name="batteria" id="batteria" required pattern="[0-99]+" title="Inserisci un quantita numerica">





    <input type="submit" value="invia">

</form>

</body>
<html>