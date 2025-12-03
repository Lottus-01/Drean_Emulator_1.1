<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Memori-Emulator — Inicial</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="page-container">
    <img src="memospriteL.png" class="orn-left" alt="">
    <img src="memospriteR.png" class="orn-right" alt="">

    <header class="topbar">
      <div class="top-title small">Memori-Emulator</div>
      <div class="page-title">Home-</div>
      
        <?php
        session_start();
        if (isset($_SESSION['id_usuario'])){
          echo "Olá, ".$_SESSION['nm_usuario'];
        } else {
          echo "<script> alert ('Você Não esta logado') history.back(); </script>";
        }
         ?>
    </header>

    <div class="layout">
      <aside class="sidebar">
        <nav>
          <a href="report.php">Creat-Call</a>
          <a href="list_calls.php">Calls-</a>
          <a href="#">Reserve-</a>
          <a href="login.html">Exit-</a>
        </nav>
      </aside>

      <section class="main-panel card">
        <div class="panel-inner">
          <div class="status-grid">
            <div class="status">New-</div>
            <div class="status">Reminders</div>
            <div class="status">On-service-</div>
            <div class="status">Pendent-</div>
            <div class="status">Solved-</div>
            <div class="status">Closed-</div>
          </div>
        </div>
      </section>
    </div>
  </div>

<script src="script.js"></script>
</body>
</html>
