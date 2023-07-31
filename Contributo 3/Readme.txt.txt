# Contributo 2 PHP-MySQL

Componenti gruppo:
- Ahmed Ilyas Kerrouche

Indirizzo Repository:
- https://github.com/eXplosive57/Contributo-2-Kerrouche.PHP-MySQL

Descrizione progetto:

L'idea del progetto consiste nella realizzazione di un sorta di shop per Smartphone. Un utente una volta registrato verrá
portato sulla homepage del sito dove potrá visualizzare le novitá del momento.L'utente puó decidere se acquistare o meno un dispositivo dal catalogo, contenuti nel relativo file XML. 
Una volta scelta la quantitá che si desidera, la si puó aggiungere al carrello. Verrete indirizzate nel carrello dove potrete vedere tutti gli articoli aggiunti con la relativa quantitá. 
In qualsiasi momento é possibile procedere all'acquisto degli articoli, elimando dal carrello tutti i prodotti.

> Nel database é presente un utente Admin, colui che puó a differenza degli altri utenti, inserire un nuovo dispositivo al catalogo. <br>
Per accedere con l'utente admin usare: <br>
  > Username: Admin <br>
  Password: Admin

L'utente ADMIN, se loggato, può inserire uno smartphone al catalogo. L'inserimento avviene tramite un'opportuna form dalla quale, mediante opportuni script php, è possibile estrarre i dati da inserire negli appositi file XML.

Le caratteristiche di XML (ed in particolare del modello DOM - Document Object Model) che si sono volute testare (ed implementare) in questo contributo sono state le seguenti:

- Visualizzazione dei dati contenuti in un file XML, da script PHP;
- Ricerca di un elemento contenuto in un file XML, da script PHP;
- Inserimento di un elemento contenuto in un file XML, da script PHP;