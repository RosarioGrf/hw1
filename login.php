<?php
  include 'authentication.php';
  
  if (checkAuth()) {
    header('Location: index.php');
    exit;
  }



/*****************REGISTRATI******************/
  if (!empty($_POST["nome"]) && !empty($_POST["cognome"])&& !empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"]) &&  !empty($_POST["confirm_password"]) && !empty($_POST["allow"]))
    {
    
    $error=array();
    $conn=mysqli_connect($dbconfiguration['host'], $dbconfiguration['user'], $dbconfiguration['password'], $dbconfiguration['name']);

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
      $error[] = "Username non valido";
    } else {
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $query = "SELECT username FROM users WHERE username = '$username'";
      $res = mysqli_query($conn, $query);
      if (mysqli_num_rows($res) > 0) {
        $error[] = "Username già utilizzato";
      }
    }

    if (strlen($_POST["password"]) < 8) {
      $error[] = "Caratteri password insufficienti";
    } 

    if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
      $error[] = "Le password non coincidono";
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $error[] = "Email non valida";
    } else {
      $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
      $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
      if (mysqli_num_rows($res) > 0) {
        $error[] = "Email già utilizzata";
      }
    }


    if (count($error) == 0) {
      $nome = mysqli_real_escape_string($conn, $_POST['nome']);
      $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $password = password_hash($password, PASSWORD_BCRYPT);

      $query = "INSERT INTO users(nome, cognome, username, email, password) VALUES('$nome', '$cognome', '$username', '$email', '$password')";
            
      if (mysqli_query($conn, $query)) {
        $_SESSION["_agora_email"] = $_POST["email"];
        $_SESSION["_agora_user_id"] = mysqli_insert_id($conn);
        mysqli_close($conn);
        header("Location: index.php");
        exit;
      } else {
        $error[] = "Errore di connessione al Database";
      }
    }

    mysqli_close($conn);
  }
  else if (isset($_POST["email"])) {
    $error = array("Riempi tutti i campi");
  }

/*****************ACCEDI******************/
  if (isset($_POST['email_acc']) && isset($_POST['password_acc'])) {
    $conn=mysqli_connect($dbconfiguration['host'], $dbconfiguration['user'], $dbconfiguration['password'], $dbconfiguration['name']);

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $email = mysqli_real_escape_string($conn, $_POST['email_acc']);
    $query = "SELECT * FROM users WHERE email = '".$email."'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        
    if (mysqli_num_rows($res) > 0) {
      $entry = mysqli_fetch_assoc($res);
      if (password_verify($_POST['password_acc'], $entry['password'])) {
        $_SESSION["_agora_email"] = $entry['email'];
        $_SESSION["_agora_user_id"] = $entry['id'];
        header("Location: index.php");
        mysqli_free_result($res);
        mysqli_close($conn);
        exit;
      }
    }
    $error_acc = "Email e/o password errati.";
  }
  else if (isset($_POST["email_acc"]) || isset($_POST["password_acc"])) {
    $error_acc = "Inserisci email e password.";
  }
?>

<html lang="it">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DJI Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="login.js" defer></script>
  </head>
  <body>
    <a href="index.php" class="back-button">← Torna alla home</a>
    <div class="wrapper">
      <div class="container" id="loginForm">
        <h2>Accedi a DJI</h2>
        <?php
          if (isset($error_acc)) {
            echo "<p class='error'>$error_acc</p>";
          }
        ?>
        <form name='form_accedi' method="post">
          <div class="email_acc">
            <label for='email_acc'>Email</label>
            <input type='text' name='email_acc' <?php if(isset($_POST["email_acc"])){echo "value=".$_POST["email_acc"];} ?>>
          </div>
          <div class="password-container">
            <label for='password'>Password</label>
            <input type='password' name='password_acc' <?php if(isset($_POST["password_acc"])){echo "value=".$_POST["password_acc"];} ?>>
            <span class="occhio-password">
              <img src="Immagini_sfondo_accesso/occhio_chiuso.png" alt="Toggle password visibility">
            </span>
          </div>


          <a href="#" class="pswforgot">Password Dimenticata? Ripristina &gt;</a>
          <div class="checkbox">
            <input type="checkbox" id="privacy-login">
            <label for="privacy-login">Clicca qui per ottenere vantaggi esclusivi, offerte e aggiornamenti su DJI</label>
          </div>
          <input type='submit' value='Accedi'>
        </form>
        <div class="link">Sei un nuovo utente? <a class="show-register">Crea il tuo account DJI</a></div>
        <div class="pedice">Continuando, dichiari di aver accettato l'informativa sulla privacy e i Termini di utilizzo</div>
      </div>



      <div class="container hidden" id="registerForm">
        <h2>Crea il tuo account DJI</h2>
        <form name='form_registrazione' method="post">
          <div class="nome">
            <label for='nome'>Nome</label>
            <input type='text' name='nome' <?php if(isset($_POST["nome"])){echo "value=".$_POST["nome"];} ?> >
            <div><span class="err">Devi inserire il tuo nome</span></div>
          </div>

          <div class="cognome">
            <label for='cognome'>Cognome</label>
            <input type='text' name='cognome' <?php if(isset($_POST["cognome"])){echo "value=".$_POST["cognome"];} ?> >
            <div><span class="err">Devi inserire il tuo cognome</span></div>
          </div>

          <div class="username">
            <label for='username'>Nome utente</label>
            <input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
            <div><span class="err">Nome utente non disponibile</span></div>
          </div>
          <div class="email">
            <label for='email'>Email</label>
            <input type='text' name='email' <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
            <div><span class="err">Indirizzo email non valido</span></div>
          </div>

          <div class="password-container password">
            <label for='password'>Password</label>
            <input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
            <span class="occhio-password">
              <img src="Immagini_sfondo_accesso/occhio_chiuso.png" alt="Toggle password visibility">
            </span>
            <div><span class="err">Inserisci almeno 8 caratteri</span></div>
          </div>

          <div class="password-container confirm_password">
            <label for='confirm_password'>Conferma Password</label>
            <input type='password' name='confirm_password' <?php if(isset($_POST["confirm_password"])){echo "value=".$_POST["confirm_password"];} ?>>
            <span class="occhio-password">
              <img src="Immagini_sfondo_accesso/occhio_chiuso.png" alt="Toggle password visibility">
            </span>
            <div><span class="err">Le password non coincidono</span></div>
          </div>

          <div class="checkbox allow"> 
            <input type='checkbox' name='allow' <?php if(isset($_POST["allow"])){echo $_POST["allow"] ? "checked" : "";} ?>>
            <label for='allow'>Ho letto e accettato l'informativa sulla privacy e le Condizioni di utilizzo del servizio DJI</label>
          </div>

          <div class="checkbox">
            <input type="checkbox" id="updates">
            <label for="updates">Ricevi notifiche, consigli e aggiornamenti sui prodotti, servizi, software e tanto altro da DJI</label>
          </div>
          <?php 
            if(isset($error)) {
              foreach($error as $err) {
              echo "<div class='errorj'><span>".$err."</span></div>";
              }
            }
          ?>
          <input type='submit' value='Registrati'>
        </form>
        <div class="link">Hai già un account? <a class="show-login">Accedi</a></div>
        <div class="pedice" class="link">Hai bisogno di aiuto con la registrazione? <a href="#">Domande frequenti Servizio di Assistenza DJI</a></div>
      </div>
    </div>

    
  <footer class="footer">
      <div class="footer-left">
        <p>Shot on DJI Mavic 3 Pro<br>© Jing Yan</p>
      </div>
      <div class="footer-right">
        <p>
          2025 © DJI |
          <a href="#">Informativa sulla privacy</a> |
          <a href="#">Termini di utilizzo</a> |
          <a href="#">Domande frequenti</a> |
          <a href="#">Servizio di assistenza DJI</a> |
          <a href="#">Mappa del sito</a> |
          <a href="#">Preferenze dei cookie</a>
        </p>
      </div>
    </footer>
  </body>
</html>
