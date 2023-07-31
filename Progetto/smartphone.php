
<?php

include('config.php');
$con = new mysqli($host,$userName,$password,$dbName);

session_start();
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

    <title>SmartPhone</title>
    <link rel="stylesheet" href="index.css?v=2" />

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
        <li style=float:right><a href="carrello.php">CARRELLO (<?php echo $count ?>)</a></li> <?php
      }
      ?>
      <li><a>Sei loggato come, <?php echo $_SESSION['nome'] ?> </a></li>

    </div>
  </li>
</ul>

<?php 
      if(isset($_SESSION['ok'])) {
        
        ?>

      <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <h3><?php echo $_SESSION['ok'] ?></h3>
        </div>  
<?php
        
        unset($_SESSION['ok']);
      }



  
$xmlFile = "catalogo.xml";

$xml = simplexml_load_file($xmlFile);

foreach($xml->smartphone as $smartphone){
        $id = $smartphone->id;
        $nome = $smartphone->nome;
        $marca = $smartphone->marca;
        $prezzo = $smartphone->prezzo;
        $batteria = $smartphone->batteria;
        $descrizione = $smartphone->descrizione;
        $foto = $smartphone->img;

        

      ?>
        <div>
               <table>
                     <tr>            
                    <th> Nome </th>
                    <td><?php echo $nome ?></td>
                    </tr>
    
                     <tr>          
                    <th> Marca </th>    
                    <td><?php echo $marca ?></td>
                    </tr>
    
                     <tr>            
                    <th> Prezzo </th>    
                    <td><?php echo $prezzo ?>$</td>
                    </tr>
    
                    <tr>             
                    <th> Batteria </th>    
                    <td><?php echo $batteria ?>mAh</td>
                    </tr>

                    <tr>           
                    <th> Descrizione </th>     
                    <td><?php echo $descrizione ?> </td>
                    </tr>

                     <tr>          
                    <th> Immagine </th>     
                    <td><?php echo "<img  src ='" . $foto . "' width='30%'>";?></td>
                    </tr>
    
                </table>
            </div>

            
            <form action="gestionecarrello.php" method="POST">
            
              <input name="nome" hidden value = "<?php echo $nome; ?>">
              <input name="prezzo" hidden value = "<?php echo $prezzo; ?>">
    
            
              <label for="qty">Quantita</label>
              <input type="number" name="qty" id="qty" required pattern="[0-99]+" title="Inserisci un quantita numerica">
            <br>
          <button type="submit" name="aggiungi">AGGIUNGI</button>
          
            </form>
      <?php
}

?>
</div>



</body>

</html>