
<?php


include('config.php');
$con = new mysqli($host,$userName,$password,$dbName);

session_start();
$totale= 0;
//controllo sulla variabile 'loggato'
if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true){
    header("location: accesso.php");
}
$count = 0;
if(isset($_SESSION['carrello']))
{
  $count=count($_SESSION['carrello']);
}


?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

    <title>CARRELLO</title>
    <link rel="stylesheet" href="index.css" />
    <style>

    h1 {
      color: #333;
      text-align: center;
    }


    </style>
</head>

<body>

<ul>
  <li><a href="home.php">HOME</a></li>
  <li> <a href="smartphone.php">CATALOGO</a></li>
      <?php 
          if ($_SESSION['tipo'] == 0 ) {
      
      ?>
      <li><a href="inserimento.php">INSERISCI SMARTPHONE</a></li>
      <?php } ?>
      
      <li><a href="logout.php">DISCONNETTI</a></li>
      
      <?php if($_SESSION['tipo'] == 1) {
        ?>
        <li style=float:right><a href="carrello.php">CARRELLO  (<?php echo $count ?>)</a></li> <?php
      }
      ?>
      <li><a>Sei loggato come, <?php echo $_SESSION['nome'] ?> </a></li>

    </div>
  </li>
</ul>


<?php 
      if(isset($_SESSION['esiste'])) {
        
        ?>

      <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <h3><?php echo $_SESSION['esiste'] ?></h3>
        </div>  
<?php
        
        unset($_SESSION['esiste']);
      }

      
      if(isset($_SESSION['acq'])) {
        
        ?>

      <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <h3><?php echo $_SESSION['acq'] ?></h3>
        </div>  
<?php
        
        unset($_SESSION['acq']);
      }



//controllo sulla variabile 'loggato'
if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true){
    header("location: accesso.php");
}else
{
  ?>
 <table> 
    <thead>
    <tr>
    <th>NOME</th>
    <th>PREZZO</th>
    <th>QUANTITA</th>
    <th></th>
    <th>TOTALE</th>
    </tr>
    </thead>
    <?php
    if(isset($_SESSION['carrello']))
    {
      
  foreach($_SESSION['carrello'] as $key => $value)
  {
    $totale = $totale + ($value["Prezzo"] * $value["Quantita"]);
    ?>
    <tr>
      <td><?php echo $value["Nome"] ?></td>
      <td><?php echo $value["Prezzo"] ?>$</td>
      <td>x<?php echo $value["Quantita"] ?></td>
      <td>
        <form action ='gestionecarrello.php' method='POST'>
          <button class='rosso' name='rimuovi' type="submit">RIMUOVI</button></td>
          <input type='hidden' name='nome' value='<?php echo $value['Nome']?>'>
        </form>
        
        
    </tr>

    <?php
  }
  
        ?>
        
        <td colspan="4"></td>
        
        <td class="centrato-totale">
          <?php echo $totale ?>$<form action ='svuota.php' method='POST'>
            <?php
              if(!empty($_SESSION['carrello'])){ ?>
                <button class='blu' name='svuota' type="submit">EFFETTUA ORDINE</button></td>
            </form> 
        </td>
    
  <?php
}
}
}
?>

</table>
</body>

</html>