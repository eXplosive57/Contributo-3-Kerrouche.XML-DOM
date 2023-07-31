<?php

include('config.php');
$con = new mysqli($host,$userName,$password,$dbName);


session_start();



$prodotto = $con->real_escape_string($_POST['nomeprodotto']);
$prezzo = $con->real_escape_string($_POST['prezzo']);
$descrizione = $con->real_escape_string($_POST['descrizione']);
$immagine = $con->real_escape_string($_POST['immagine']);
$marca = $con->real_escape_string($_POST['marca']);
$batteria = $con->real_escape_string($_POST['batteria']);

$path = "foto/";

$percorso = $path . $immagine;

$xmlFile = "catalogo.xml";
$xmlstring = "";

foreach(file($xmlFile) as $nodo){   //Leggo il contenuto del file XML

    $xmlstring.= trim($nodo); 
}

$documento = new DOMDocument();
$documento->loadXML($xmlstring);    //Carico il contenuto del file XML dentro $documento per poterlo manipolare tramite DOM



        //controllo se già esiste il prodotto
        $catalogo = $documento->documentElement;    //Nodo radice del documento XML
        $smartphone = $documento->createElement('smartphone');  //Creo un nuovo elemento smartphone il quale è composto da una sequenza di elementi
        $nome2 = $documento->createElement('nome');
        $marca2 = $documento->createElement('marca');
        $prezzo2 = $documento->createElement('prezzo');
        $batteria2 = $documento->createElement('batteria');
        $descrizione2 = $documento->createElement('descrizione');
        $foto2 = $documento->createElement('img');

        if ($_SERVER["REQUEST_METHOD"] === "POST") {



            if ($_SESSION['tipo'] == 0) {
        
                $smart_esiste = false;
        
        // Controllo se lo smartphone esiste gia nel catalogo
        
        foreach ($catalogo->getElementsByTagName('smartphone') as $smart) {
        
            $smarte_presente = $smart->getElementsByTagName('nome')->item(0)->nodeValue;  
        
            if ($smarte_presente === $prodotto) {
        
                $smart_esiste = true;
                
                break; 
            }
        }
        
        if ($smart_esiste) {
            $_SESSION['notok'] = "Attenzione! Smartphone gia' presente.";
            header("location: inserimento.php");
            
            
        } else{

        $nome2->nodeValue = $prodotto;
        $marca2->nodeValue = $marca;
        $prezzo2->nodeValue = $prezzo;
        $batteria2->nodeValue = $batteria;
        $descrizione2->nodeValue = $descrizione;
        $foto2->nodeValue = $percorso;

        $smartphone->appendChild($nome2);   //Aggiungo il nodo $nome2 come figlio del nodo smartphone
        $smartphone->appendChild($marca2);  //Aggiungo il nodo $marca2 come figlio del nodo smartphone
        $smartphone->appendChild($prezzo2); //Aggiungo il nodo $prezzo2 come figlio del nodo smartphone
        $smartphone->appendChild($batteria2);   //Aggiungo il nodo $batteria2 come figlio del nodo smartphone
        $smartphone->appendChild($descrizione2);    //Aggiungo il nodo $descrizione2 come figlio del nodo smartphone
        $smartphone->appendChild($foto2);   //Aggiungo il nodo $foto2 come figlio del nodo smartphone

        $catalogo->appendChild($smartphone);    // Aggiungo il nodo smartphone come figlio della radice catalogo
        $documento->formatOutput = true;    //Formatta il documento XML per renderlo più leggibile


        $xml = $documento->saveXML();
        file_put_contents($xmlFile, $xml);  //sovrascrive il contenuto del vecchio file XML con quello nuovo
        $_SESSION['ok'] = "Prodotto inserito correttamente!";
        header("location: smartphone.php");
        }
    }
}
?>