<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Memori-Emulator — Create-Call</title>
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
        if (isset($_SESSION['id_usuario'])) {
          echo "Olá, " . $_SESSION['nm_usuario'];
        } else {
          echo "<script>alert('Você não está logado'); history.back();</script>";
          exit;
        }
      ?>
    </header>

    <div class="layout">
      <aside class="sidebar">
        <nav>
          <a href="firstscrean.php">Home-</a>
          <a href="report.php">Creat-Call</a>
          <a href="#">Calls-</a>
          <a href="#">Reserve-</a>
        </nav>
      </aside>

      <section class="main-panel card">
        <form method="POST" action="save_call.php">
          <div class="form-group">

            <?php
              include 'conexao.php'; 
            ?>

            <!-- TYPE -->
            <label for="type">Type:</label>
            <select class="form-control" name="type" id="type">
              <?php
                $query = $conexao->query("SELECT * FROM tb_type");
                while ($r = $query->fetch_assoc()) {
                  echo "<option value='{$r['id_type']}'>{$r['nm_type']}</option>";
                }
              ?>
            </select>

            <!-- URGENCY -->
            <label for="urgency">Urgency:</label>
            <select class="form-control" name="urgency" id="urgency">
              <?php
                $query = $conexao->query("SELECT * FROM tb_urgency");
                while ($r = $query->fetch_assoc()) {
                  echo "<option value='{$r['id_urgency']}'>{$r['nm_urgency']}</option>";
                }
              ?>
            </select>

            <!-- CATEGORY -->
            <label for="category">Category:</label>
            <select class="form-control" name="category" id="category">
              <?php
                $query = $conexao->query("SELECT * FROM tb_category");
                while ($r = $query->fetch_assoc()) {
                  echo "<option value='{$r['id_category']}'>{$r['nm_category']}</option>";
                }
              ?>
            </select>

            <!-- TITLE -->
            <label class="label-inline">Title:
              <input id="callTitle" name="callTitle" type="text" required>
            </label>

            <!-- DESCRIPTION -->
            <label class="label-large">Description:
              <textarea id="callDescription" name="callDescription" rows="6" required></textarea>
            </label>

            <div class="actions">
              <button class="btn" type="submit">Send</button>
            </div>

          </div>
        </form>
      </section>

    </div> <!-- END layout -->
  </div> <!-- END page-container -->

<script src="script.js"></script>
</body>
</html>
