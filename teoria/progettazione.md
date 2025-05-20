# come progettare un'applicazione web
In questo breve articolo vediamo alcuni approcci possibili per la progettazione di un'applicazione web. Prima di iniziare a progettarne una, tuttavia,
dobbiamo capire come è strutturata:

![Untitled 1](https://github.com/user-attachments/assets/d9494ffc-dc67-47c7-bebc-519ee4dc1032)

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
