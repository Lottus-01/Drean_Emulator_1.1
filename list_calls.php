<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Memori-Emulator — Calls</title>

  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c0f408d1cc.js" crossorigin="anonymous"></script>

</head>
<body>

  <div class="page-container">

    <!-- ORNAMENTOS -->
    <img src="memospriteL.png" class="orn-left" alt="">
    <img src="memospriteR.png" class="orn-right" alt="">

    <!-- TOPBAR ---------------------------------------------------------------------------------------- -->
    <header class="topbar">
      <div class="top-title small">Memori-Emulator</div>
      <div class="page-title">Calls-</div>

      <?php
      session_start();
      if (isset($_SESSION['id_usuario'])) {
        echo "Olá, ".$_SESSION['nm_usuario'];
      } else {
        echo "<script>alert('Você não está logado'); history.back();</script>";
        exit;
      }
      ?>
    </header>

    <!-- LAYOUT ---------------------------------------------------------------------------------------- -->
    <div class="layout">

      <!-- SIDEBAR -->
      <aside class="sidebar">
        <nav>
          <a href="report.php">Create-Call</a>
          <a href="list-calls.php">Calls-</a>
          <a href="#">Reserve-</a>
          <a href="login.html">Exit-</a>
        </nav>
      </aside>

      <!-- MAIN PANEL ---------------------------------------------------------------------------------- -->
      <section class="main-panel card">
        <h2 style="margin-bottom:15px; font-size:22px;">Lista de Chamados</h2>

        <table class="table table-dark table-hover" style="border-radius:10px; overflow:hidden;">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tipo</th>
              <th>Categoria</th>
              <th>Urgência</th>
              <th>Título</th>
              <th>Descrição</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>

            <?php
            include "conexao.php";

            $select = "SELECT * FROM tb_call";
            $query = $conecta->query($select);

            while ($call = $query->fetch_assoc()) { ?>

              <tr>
                <td><?= $call['id_call'] ?></td>
                <td><?= $call['fk_type'] ?></td>
                <td><?= $call['fk_category'] ?></td>
                <td><?= $call['fk_urgency'] ?></td>
                <td><?= $call['nm_title'] ?></td>
                <td><?= $call['nm_description'] ?></td>

                <td>
                  <i class="fa-solid fa-pen-to-square" style="cursor:pointer; color:#bfa1ff;"></i>
                  &nbsp;
                  <i class="fa-solid fa-trash" style="cursor:pointer; color:#ff6b6b;"></i>
                </td>
              </tr>

            <?php } ?>

          </tbody>
        </table>

      </section>

    </div>
  </div>

</body>
</html>
