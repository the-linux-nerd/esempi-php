# interfacciarsi con il database

## connessione

```
$server = "localhost";
$user = "username";
$pass = "password";
$db = "myDB";

$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
  die("connessione fallita: " . mysqli_connect_error());
}
```

## scrittura dei dati

```
$sql = "INSERT INTO persone (nome, cognome, numero)
VALUES ('Mario', 'Rossi', '123456789')";

if (mysqli_query($conn, $sql)) {
  echo "persona inserita";
} else {
  echo "errore: " . $sql . "<br>" . mysqli_error($conn);
}
```

## recuperare l'ultimo ID inserito

```
$last_id = mysqli_insert_id($conn);
```

## lettura dei dati

```
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$res = mysqli_query($conn, $sql);

if(mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)) {
    echo "id: " . $row["id"]. " - Name: " . $row["nome"]. " " . $row["cognome"]. "<br>";
  }
} else {
  echo "nessun risultato trovato";
}
```

## chiusura della connessione

```
mysqli_close($conn);
```

# link-o-grafia
- https://www.w3schools.com/php/php_mysql_intro.asp
