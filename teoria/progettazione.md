# come progettare un'applicazione web
In questo breve articolo vediamo alcuni approcci possibili per la progettazione di un'applicazione web. Prima di iniziare a progettarne una, tuttavia,
dobbiamo capire come questo tipo di applicazioni sono strutturate:

![Untitled 1](https://github.com/user-attachments/assets/d9494ffc-dc67-47c7-bebc-519ee4dc1032)

Tipicamente PHP è il cuore dell'applicazione, e si occupa di tutte le elaborazioni dati importanti. Il suo output, in forma di pagine HTML, è inviato
al client dove avvengono la renderizzazione della pagina, tramite anche i CSS eventualmente inclusi, e le elaborazioni lato client tramite JavaScript,
se presenti.

JavaScript a sua volta può chiamare direttamente il backend PHP per inviare e ricevere dati, solitamente tramite chiamate REST verso apposite API
esposte dal backend.

Lato storage, il backend PHP dispone solitamente del filesystem per l'archiviazione di file, e di un database, spesso MySQL, per l'archiviazione dei
dati strutturati secondo il modello relazionale; è possibile inoltre che sia presente un database non relazionale di qualche tipo, oltre a vari sistemi
di cache come Memcache e Redis.

## analisi e schema
Per prima cosa analizzare la struttura logica dell'applicazione che si deve realizzare. Quali pagine occorreranno? Quali librerie? Quali template?
Disegnare ogni file come un rettangolo in uno schema; poi collegare fra loro i vari file con delle linee che rappresentino il tipo di relazione che
si è pensata fra quei file:

- verde per i passaggi di dati (GET e POST)
- blu per gli include e i require
- rosso per la lettura diretta (ad es. tramite file_get_contents())

Una volta disegnato lo schema, procedere creando tutti i file vuoti, e inserire in ogni file una serie di brevi commenti che ne illustrino il funzionamento,
ma senza scrivere il codice. Fatto questo per tutti i file, si può iniziare a scrivere il codice, in questo ordine:

- template HTML
- librerie
- file PHP specifici per le varie pagine

Rispettando questo approccio si riuscirà a sviluppare in maniera più sistematica e strutturata, sprecando meno tempo e facendo meno errori.

## approccio per file
L'approccio più intuitivo è quello di creare un file PHP per ogni pagina della nostra applicazione. Se per esempio dobbiamo creare un'applicazione che
gestisca la prenotazione di un campo da tennis, questa plausibilmente avrà una pagina per la visualizzazione delle prenotazioni e una pagina per
l'inserimento, la modifica e la cancellazione delle prenotazioni. Un'ipotesi di struttura quindi potrebbe essere questa:

file              | spiegazione
------------------|--------------------------------------
lista.php         | visualizzazione dell'elenco delle pubblicazioni
form.php          | gestione delle operazioni di inserimento, cancellazione e modifica
stile.css         | foglio di stile per l'applicazione

Anche se può sembrare banale, una struttura del genere è perfettamente funzionante e nella sua semplicità serve allo scopo. Tuttavia è inapplicabile in
caso di software molto complessi, perché causerebbe un proliferare superfluo di file molto simili fra loro. In questi casi può essere più utile un
approccio basato su file raggruppati per funzioni e raggiungibili tramite route gestite da .htaccess.

Proseguendo comunque sull'approccio per file, la prima cosa da fare se vogliamo rendere la nostra applicazione più leggibile è disaccoppiare l'HTML dal
codice PHP; per farlo possiamo creare dei template HTML, uno per ogni pagina, in cui andremo a sostituire dei segnaposto convenzionali con i dati che
ci interessa rappresentare. Ovviamente esistono template manager specializzati (come Twig ad esempio) ma qui ci interessa capire il principio pertanto
costruiremo il nostro template manager personalizzato. Iniziamo creando un file HTML per ogni file PHP del nostro progetto:

file PHP          | file HTML              | spiegazione
------------------|------------------------|--------------------------------
lista.php         | lista.html             | visualizzazione dell'elenco delle pubblicazioni
form.php          | form.html              | gestione delle operazioni di inserimento, cancellazione e modifica

Per renderizzare il template potremo utilizzare una combinazione di file_get_contents() e str_replace(), molto semplicemente, andando a sostituire 
con un foreach() i segnaposto con i valori di un array associativo in base alle chiavi, che dovranno corrispondere appunto ai vari segnaposto.

Lo step successivo di semplificazione consiste ovviamente nel raccogliere in una libreria le funzioni di rendering, generalizzandole, quindi
aggiungendo anche per maggiore ordine un livello di sottocartelle avremo uno scenario simile a questo:

file PHP             | file HTML              | spiegazione
---------------------|------------------------|--------------------------------
lib/rendering.php    | -                      | libreria contenente le funzioni di rendering
lista.php            | tpl/lista.html         | visualizzazione dell'elenco delle pubblicazioni
form.php             | tpl/form.html          | gestione delle operazioni di inserimento, cancellazione e modifica

Raccogliere in librerie il codice ridondante è di estrema importanza al fine di semplificare la lettura dei sorgenti e facilitare la manutenzione del
programma; in particolare, ogni volta che si riusa una logica specifica essa andrebbe se possibile astratta in una funzione e le funzioni appunto
raccolte in librerie.

Seguendo il principio di semplificazione e raccolta del codice si noterà che vi sono ancora molte ridondanze fra i vari file PHP e probabilmente anche fra
i file dei template, specialmente se si moltiplicano le pagine. Si immagini ad esempio un programma che calcola l'area di cerchio, triangolo e rettangolo;
seguendo l'approccio visto finora avremo un file per la selezione della figura, un form per l'inserimento dei dati, e una pagina per la presentazione dei
risultati, ovvero qualcosa di simile:

file PHP             | file HTML              | spiegazione
---------------------|------------------------|--------------------------------
lib/calcoli.php      | -                      | libreria contenente le funzioni di calcolo delle aree
lib/rendering.php    | -                      | libreria contenente le funzioni di rendering
scelta.php           | tpl/scelta.html        | scelta della figura
form.php             | tpl/form.html          | inserimento dei dati della figura
risultati.php        | tpl/risultati.html     | presentazione dei risultati del calcolo

Si noterà che i file scelta.php, form.php e risultati.php presentano parti in comune e parti differenti. Supponiamo di raccogliere le parti comuni in un
unico file index.php che si occupi poi di includere le parti differenti e il template necessario in base al valore di un ipotetico parametro GET; siamo pronti
a passare all'approccio per route.

## approccio per route
L'approccio per route richiede la comprensione delle espressioni regolari e del funzionamento del file .htaccess (si veda la relativa teoria); compreso
questo, si può procedere a ristrutturare l'applicazione in questo modo:

file PHP                 | file HTML              | spiegazione
-------------------------|------------------------|--------------------------------
lib/calcoli.php          | -                      | libreria contenente le funzioni di calcolo delle aree
lib/rendering.php        | -                      | libreria contenente le funzioni di rendering
opt/scelta.php           | tpl/scelta.html        | codice custom e template di scelta della figura
opt/form.php             | tpl/form.html          | codice custom e template di inserimento dei dati della figura
opt/risultati.php        | tpl/risultati.html     | codice custom e template di presentazione dei risultati del calcolo
.htaccess                | -                      | file di routing
index.php                | -                      | file principale dell'applicazione

Il file index.php conterrà un elenco in forma di array associativo delle varie pagine che compongono l'applicazione, e in base a quello andrà a richiamare
i file specifici della pagina richiesta. Lo scopo del file .htaccess è quello di reindirizzare tutte le richieste di tipo /nomefile.html a /index.php?pagina=<pag>
in modo da consentire al file index.php di gestire correttamente la route. Si supponga ad esempio di avere un file .htaccess così formato:

```
RewriteEngine on
RewriteRule ^[\/]*([a-zA-Z0-9\.\-\_]+).(html|php) index.php?p=$1 [L,QSA]
```

Questa semplice regola ci consente di trasformare un url di tipo prova.html in index.php?p=prova il che a sua volta rende possibile l'indirizzamento per route
alla pagina prova. Dovremo avere, in index.php o in un file inc/pagine.php un array con in chiave gli identificativi di pagina, ad esempio:

```
$pagine = array(
    'prova' => array(
        'contenuto' => array(
            'titolo' => 'prova',
            'h1' => 'pagina di prova',
            ...
        ),
        'template' => 'tpl/main.html',
        'include' => [
          ...
        ],
    ),
);
```

Proseguendo il ragionamento, vediamo che ci sono almeno tre compiti relativi alle pagine che possono essere raccolti in un file inc/pagine.php per semplicità:

- dichiarare l'elenco delle pagine
- valorizzare la pagina di default se nessuna pagina è specificata
- predisporre il menù di navigazione

Consideriamo la cartella inc/ come il luogo dove inserire i file che vanno inclusi in ogni pagina e opt/ la cartella dove inserire i file che devono essere inclusi
solo in caso ci si trovi su una determinata pagina. In questo modo potremo includere automaticamente tutte le librerie e tutti i file inclusi con dei glob() e dei
foreach(). Si immagini un index.php che inizi con il seguente codice:

```
foreach (glob("lib/*.php") as $file) {
    require_once $file;
}

foreach (glob("inc/*.php") as $file) {
    require_once $file;
}

foreach( $p['include'] as $file ) {
    require_once $file;
}
```

Si vede bene che partendo in questo modo è possibile evitare di includere manualmente i singoli file. La variabile $p rappresenta la pagina corrente, in riferimento
all'array visto sopra.

Riguardo il rendering dell'HTML non c'è molto da aggiungere in questa sede, essendo l'argomento trattato altrove; basti dire che conviene effettuare il rendering del
template principale nel file index.php il che esaurisce i suoi compiti nell'architettura dell'applicazione.

## l'approccio model, view, controller
Andando più nel dettaglio per quanto riguarda l'analisi dell'architettura dell'applicazione, si vedrà che è necessario dividere in qualche modo le tre funzioni principali
relative ad ogni categoria di dati che si gestisce con l'applicazione. In particolare, possiamo enucleare i seguenti:

- gestione delle entità (inserimento, modifica, cancellazione)
- gestione degli input utente relativi alle entità (cosa fare quando l'utente invia un determinato input)
- gestire la visualizzazione delle entità e le relative interfacce

Questi tre compiti prendono il nome rispettivamente di model, controller e view; qui non si intende implementare strettamente il pattern MVC ma più che altro sfruttarlo
come canovaccio per organizzare i vari compiti fra i file. In particolare assegneremo:

- al model il compito di dichiarare tutte le funzioni necessarie come aggiungi(), modifica(), elimina(), elenca() eccetera
- al controller il compito di chiamare le funzioni appropriate in base all'input dato dall'utente con uno switch( $_REQUEST['azione'] ) { ... }
- alla view il compito di fare il rendering del template appropriato per la pagina, da passare poi al rendering generale di index.php

La struttura finale della nostra applicazione quindi potrebbe essere:

file                                              | spiegazione
--------------------------------------------------|-----------------------------------------------------------------------------------------------------
.htaccess                                         | file per le regole di routing
index.php                                         | file principale dell'applicazione (include gli altri file e fa il rendering generale)
tpl/main.html                                     | il template generale dell'applicazione
tpl/prova.lista.html                              | il template specifico per la lista delle entità di prova
tpl/prova.form.html                               | il template specifico per il form delle entità di prova
inc/db.php                                        | il file che si occupa della connessione al database
inc/pagine.php                                    | il file che si occupa di dichiarare le pagine, gestire la pagina di default e creare il menù
lib/rendering.php                                 | la libreria per il rendering dei template
opt/prova.model.php                               | include specifico per l'entità di prova contenente le funzioni per la gestione
opt/prova.controller.php                          | include specifico per l'entità di prova contenente la gestione degli input utente
opt/prova.view.php                                | include specifico per l'entità di prova contenente le logiche di rendering specifiche per l'entità

Un esempio di programma realizzato con un approccio simile a quello appena visto si può trovare nella lezione 10.01.


