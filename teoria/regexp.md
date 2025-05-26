# espressioni regolari
Le espressioni regolari sono uno strumento potentissimo per la manipolazione delle stringhe; PHP supporta diversi tipi di espressioni regolari e prevede numerose funzioni che le
utilizzano:

- preg_match($pattern, $subject, $matches) cerca $pattern in $subject e mette il risultato in $matches
- preg_match_all($pattern, $subject, $matches) cerca $pattern in $subject e mette tutti i risultati in $matches
- preg_replace($pattern, $replacement, $subject) rimpiazza tutte le occorrenze di $pattern con $replacement in $subject
- preg_grep($pattern, $array) restituisce un array formato dagli elementi di $array che corrispondono a $pattern
- preg_split($pattern, $subject) restituisce un array di elementi ottenuto spezzando $subject in base a $pattern

## sintassi delle espressioni regolari
Le espressioni regolari sono semplici stringhe delimitate da slash (/) all'interno delle quali una serie di caratteri riveste una funzione specifica:

carattere          | significato
-------------------|------------------------------------------
\+                 | una o più occorrenze di un carattere o di un gruppo di caratteri
\*                 | zero o più occorrenze (di un carattere o di un gruppo di caratteri)
?                  | zero o una occorrenza (di un carattere o di un gruppo di caratteri)
[]                 | delimitano una classe di caratteri
^                  | fuori da una classe indica l'inizio della stringa, all'interno di una classe funge da negazione
.                  | qualsiasi carattere diverso dall'andata a capo
$                  | la fine della stringa
()                 | delimitano una sottostringa
{}                 | indicano il numero esatto, minimo o massimo o l'intervallo di occorrenze di un carattere o di un gruppo di caratteri
\-                 | specifica una serie di elementi o un intervallo (es. 0-9)
\|                 | l'operatore OR
\                  | escape per i caratteri speciali
