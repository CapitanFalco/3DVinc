<?php
// Connessione al database
$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Recupera i dati dal form
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$indirizzo = $_POST['indirizzo'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

// Inserisci i dati nel database
$sql = "INSERT INTO customers (nome, cognome, indirizzo, telefono, email) VALUES ('$nome', '$cognome', '$indirizzo', '$telefono', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Nuovo record creato con successo";
} else {
    echo "Errore: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

