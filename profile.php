<?php
    require_once 'authentication.php';
    require_once 'dbconfiguration.php';

    $userId = checkAuth();
    if (!$userId) {
        header("Location: login.php");
        exit;
    }

    $conn = mysqli_connect( $dbconfiguration['host'], $dbconfiguration['user'], $dbconfiguration['password'], $dbconfiguration['name']);

    $nome =  '';
    $cognome = '';  
    $email = '';

    if ($conn) {
        $query = "SELECT nome, cognome, email FROM users WHERE id = $userId";
        $res = mysqli_query($conn, $query);
        if ($res && $row = mysqli_fetch_assoc($res)) {
            $nome = htmlspecialchars($row['nome']);
            $cognome = htmlspecialchars($row['cognome']);
            $email = htmlspecialchars($row['email']);
        } else if (!$res) {
           echo "<p style='color:red;'>Errore query: " . mysqli_error($conn) . "</p>";
        }
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Profilo Utente</title>
    <link rel="stylesheet" href="profile/profile.css">
    <script src="profile/profile.js" defer></script>
</head>
<body>
    <?php require_once 'header.php'; ?>

    <div class="container">
        <aside class="sidebar">
            <h3>👤 Il mio account</h3>
            <ul>
                <li onclick="caricaSezione('profile/dati.php')">📝 Dati Personali</li>
                <li onclick="caricaSezione('profile/ordini.php')">📄 Ordini</li>
                <li onclick="caricaSezione('profile/coupon.php')">🎟️ Coupon</li>
                <li onclick="caricaSezione('profile/credito.php')">💳 Credito DJI</li>
                <li onclick="caricaSezione('profile/indirizzi.php')">📍 Indirizzi</li>
                <li onclick="caricaSezione('profile/pagamento.php')">💰 Pagamento</li>
            </ul>
        </aside>

        <main class="main">
            <section class="user-info">
                <div class="avatar">👤</div>
                <div>
                    <h2><?php echo $nome; ?></h2>
                    <h2><?php echo $cognome; ?></h2>
                    <p><?php echo $email; ?></p>
                </div>
            </section>

            <section id="contenuto" class="content-box">
                <p>Benvenuto! Seleziona una sezione dal menu a sinistra.</p>
            </section>
        </main>
    </div>

    <?php require_once 'footer.php'; ?>
</body>
</html>
