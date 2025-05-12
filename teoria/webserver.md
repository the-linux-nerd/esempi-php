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

## struttura di una richiesta HTTP
Una richiesta HTTP è tipicamente composta di una riga di richiesta e zero o più righe di intestazione, e
opzionalmente un corpo (utile nel caso di richieste POST e PUT ad esempio). Essendo testo semplice, la
richiesta è facilmente leggibile e può presentarsi in modo simile a questo:

```
GET /index.html HTTP/1.1
Host: www.esempio.bogus
User-Agent: Mozilla/5.0
Accept: text/html
```

La prima riga, di richiesta, è formata dal metodo (in questo caso GET), dall'indirizzo della risorsa richiesta
(/index.html) e dalla versione del protocollo HTTP usata. Il significato dei campi dell'header invece è il seguente:

campo          | significato
---------------|---------------------------------------
Host           | il nome di dominio con cui si sta chiamando il server (fondamentale nel caso il server hosti più domini)
User-Agent     | l'applicazione che effettua la richiesta
Accept         | il tipo di contenuto (MIME type) che il client accetta come risposta
Authorization  | se necessario, le credenziali per accedere alla risorsa (HTTP auth)

Il corpo, se presente, contiene le informazioni che il client vuole inviare al server con la richiesta.

## struttura di una risposta HTTP
Tipicamente una risposta HTTP è formata da una riga di stato, zero o più header e un corpo opzionale.
Normalmente somiglia a qualcosa del genere:

```
HTTP/1.1 200 OK
Content-Type: text/html; charset=UTF-8
Content-Length: 1234
Date: Tue, 12 May 2025 10:00:00 GMT

<html>
<body>
<h1>Benvenuto!</h1>
</body>
</html>
```

Si noti che il corpo è separato dagli headers da una riga vuota. La riga di stato è formata da una dichiarazione
della versione del protocollo utilizzata (HTTP/1.1), dal codice di stato (200) e da una breve descrizione (OK).
Il significato dei campi dell'header è il seguente:

campo           | significato
----------------|---------------------------------------
Content-type    | il tipo (MIME type) del contenuto del corpo
Content-length  | la lunghezza in byte del corpo
Date            | la data in cui la risposta è stata creata
Server          | il tipo di server che ha generato la risposta
Set-Cookie      | eventuali cookie da settare sul client

# link-o-grafia
- https://it.wikipedia.org/wiki/Codici_di_stato_HTTP
