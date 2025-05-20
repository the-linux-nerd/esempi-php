# relazione fra form HTML e PHP
Le form HTML possono inviare dati ad altre pagine; il PHP è in grado di ricevere questi dati in forma organizzata tramite gli array associativi $_GET e $_POST.
C'è una corrispondenza fra i nomi dei campi HTML e le chiavi dell'array associativo che si genera in PHP, ad esempio un campo come questo:
```
<input type="text" name="prova">
```
genererà un PHP una variabile $_GET['prova'] o $_POST['prova'] (a seconda del metodo di invio utilizzato dal form HTML) valorizzata al valore inserito nel
campo stesso.
