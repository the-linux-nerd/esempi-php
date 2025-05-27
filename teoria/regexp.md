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

Le classi di caratteri sono utilizzate per indicare degli insiemi di caratteri; vediamo qualche esempio:

classe             | significato
-------------------|----------------------------------------------------------------
[abc]              | uno qualunque tra i caratteri a, b o c
[^abc]             | qualsiasi carattere tranne a, b o c
[a-z]              | qualsiasi carattere compreso fra a minuscola e z minuscola
[A-Z]              | qualsiasi carattere compreso fra a maiuscola e z maiuscola
[0-9]              | qualsiasi numero fra 0 e 9
[a-z0-9]           | qualsiasi carattere fra a minuscola e z minuscola e qualsiasi numero fra 0 e 9

Esistono delle classi predefinite, che possono essere utilizzate per semplificare le espressioni regolari e renderle più leggibili:

classe             | significato
-------------------|--------------------------------------------------------
\d                 | qualsiasi carattere numerico, equivale a [0-9]
\D                 | qualsiasi carattere diverso da una cifra, equivale a [^0-9]
\s                 | qualsiasi carattere di spaziatura (spazio, tabulazione, carattere di ritorno a capo), equivale a [\t\n\r]
\S                 | qualsiasi carattere diverso da spaziatura, equivale a [^\t\n\r]
\w                 | qualsiasi carattere alfanumerico, equivale a [a-zA-Z0-9_]
\W                 | qualsiasi carattere non alfanumerico, equivale a [^a-zA-Z0-9_]

Le espressioni regolari prevedono dei quantificatori che specificano il numero di occorrenze di una data stringa o classe, ad esempio:

quantificatore     | significato
-------------------|---------------------------------------------------------------
a+                 | una o più occorrenze della lettera a
a*                 | zero o più occorrenze della lettera a
a?                 | zero o una occorrenza della lettera a
a{2}               | esattamente due occorrenze della lettera a
a{2,4}             | almeno due ma non più di quattro occorrenze della lettera a
a{2,}              | due o più occorrenze della lettera a
a{,4}              | al massimo quattro occorrenze della lettera a

Dopo la slash di chiusura dell'espressione regolare è possibile indicare dei modificatori che ne specificano il comportamento:

modificatore       | significato
-------------------|---------------------------------------------------------------
i                  | esegue una ricerca case-insensitive
m                  | applica le ancore ^ e $ ad ogni riga di testo
g                  | esegue una ricerca "globale", ossia trova tutte le occorrenze senza fermarsi alla prima
o                  | valuta l'espressione regolare solamente una volta
s                  | fa in modo che . corrisponda a tutti i caratteri, comprese le nuove righe
x                  | consente di utilizzare spazi bianchi e commenti all'interno di un'espressione regolare per maggiore chiarezza

# link-o-grafia
- https://regex101.com/
- https://www.youtube.com/watch?v=8FFTOKi7nHo
