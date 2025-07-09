# template e rendering delle pagine
Una volta mossi i primi passi con PHP e approcciato il rendering delle pagine tramite la scrittura diretta dei tag con echo() o peggio ancora
tramite l'inserimento di snippet <?php ... ?> all'interno dell'HTML, ci si renderà conto che è necessario utilizzare un sistema più evoluto per
questo compito.

L'approccio più semplice, ma anche più limitato, può essere una funzione di questo tipo:

```
function render($tpl, $dati) {
    $contenuto = file_get_contents($tpl);
    foreach ($dati as $k => $v) {
        $contenuto = str_replace('{{' . $k . '}}', $v, $contenuto);
    }
    return $contenuto;
}
```

Passando alla funzione il percorso del template HTML e l'array associativo dei dati da sostituire questa provvederà a restituire l'HTML finito.
Ovviamente questo non consente di implementare cicli e costrutti decisionali a livello di template, quindi si tratta di un approccio piuttosto
grezzo, ma che è sufficiente per i primi progetti.

## lavorare con un template manager
Esistono numerosi template manager come Twig (https://twig.symfony.com/) o Smarty (https://www.smarty.net/) che possono essere utilizzati non soltanto
per risolvere questi problemi di base, ma anche per estendere enormemente le possibilità di gestione dei template. Installare Twig richiede una
buona dimestichezza con Composer, mentre altri engine come Smarty possono semplicemente essere scaricati e installati nel vostro progetto.

