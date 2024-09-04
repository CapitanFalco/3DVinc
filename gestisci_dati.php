<?php
  // Verifichiamo se il form è stato inviato
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Salviamo i dati del cliente in un database o li inviamo via email
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $indirizzo = $_POST['indirizzo'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    // Salviamo i dati in un database
    $conn = mysqli_connect('127.0.0.1', 'root', 'Defalco08.', 'database');
    $query = "INSERT INTO clienti (nome, cognome, indirizzo, telefono, email) VALUES ('$nome', '$cognome', '$indirizzo', '$telefono', '$email')";
    mysqli_query($conn, $query);
    mysqli_close($conn);

    // Inviamo i dati via email
    $to = 'tua_email@example.com';
    $subject = 'Dati del cliente';
    $message = "Nome: $nome\nCognome: $cognome\nIndirizzo: $indirizzo\nTelefono: $telefono\nEmail: $email";
    mail($to, $subject, $message);
  }
?>