# funzionamento di PHP nel web server
PHP è un linguaggio interpretato lato server, che viene quindi eseguito nel momento in cui il server web
riceve una richiesta che implica l'erogazione di una risorsa il cui sottostante è un file PHP.

Ad esempio, a una richiesta HTTP di questo tipo:

```
GET /ciao.php
```

il web server andrà a cercare nella propria document root (la cartella dove sono contenuti i file del sito)
un file che si chiama ciao.php, lo passerà all'interprete PHP che restituirà un output di qualche tipo
(tipicamente un listato HTML ma anche un'immagine, un PDF, e così via). Il server web utilizzerà quindi
l'output ricevuto dall'interprete PHP come risposta al client HTTP.
