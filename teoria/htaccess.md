# il file .htaccess
Il file .htaccess è un file di configurazione di Apache che indica al server web come comportarsi con la cartella corrente e le sue sotto cartelle, sovrascrive
le direttive globali e può essere sovrascritto da ulteriori file .htaccess collocati nelle sotto cartelle. Può essere utilizzato per una moltitudine di compiti,
fra cui forse i più comuni sono l'URL rewriting e la protezione di cartelle con autenticazione HTTP. Ecco una panoramica di ciò che si può ottenere con questo
file:

- gestire pagine di errore personalizzate
- gestire i reindirizzamenti
- comprimere i files prima di trasmetterli al client
- bloccare gli spider
- prevenire l’hotlinking delle immagini
- bloccare l’accesso a specifici file del sito
- proteggere un singolo file o un'intera directory con password
- bloccare determinati indirizzi IP
- bloccare visitatori provenienti da un preciso dominio
- limitare la dimensione di upload dei file
- gestire la cache dei file

## URL rewriting
Questa è una delle attività più importanti che si possono fare con .htaccess, in quanto consente di gestire URL SEO-friendly senza rinunciare alla potenza di automazione
garantita da PHP. Per utilizzare l'URL rewriting è innanzitutto necessario attivare il motore di rewriting:
```
RewriteEngine on
```
Fatto questo è possibile cominciare a specificare delle regole, con la seguente sintassi:
```
RewriteRule pattern sostituzione [flagOpzionali]
```
In questo schema pattern rappresenta l'espressione regolare da applicare e sostituzione rappresenta l'URL così come dev'essere riscritto dalla regola; i flag opzionali sono:

flag            | significato
----------------|----------------------------------------------------
F               | accesso proibito, genera un errore 403 sul client
L               | ultima regola da interpretare
NC              | attiva il matching case-insensitive
R=code          | il client sarà rediretto alla URL costruita nel campo Substitution con il codice di stato HTTP specificato

### esempio #1
Redirect a una nuova pagina:
```
Redirect 301 /vecchiapagina.html https://www.domimio.com/nuova-pagina.html
```
### esempio #2
Redirect al dominio canonico:
```
RewriteCond %{HTTP_POST} !www\.dominio\.com$
RewriteRule (.*) http://www.dominio.com/$1 [R=301,L]
```
### esempio #3
Riscrittura di un URL:
```
RewriteRule ^prodotto-([0-9]+)\.html$ prodotto.php?id=$1 [NC]
```
### esempio #4
Bloccare l'hotlinking:
```
RewriteCond %{HTTP_REFERER} !^$
RewriteCond %{HTTP_REFERER} !^http(s)?://(www\.)?dominio.com [NC]
RewriteRule \.(jpg|jpeg|png|gif|bmp)$ - [NC,F,L]
```

# link-o-grafia
- https://httpd.apache.org/docs/2.4/howto/htaccess.html
- https://www.html.it/articoli/i-file-htaccess-in-apache/
