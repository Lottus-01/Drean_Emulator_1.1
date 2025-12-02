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
          <a href="firstscrean.php">Home-</a>
          <a href="report.php">Creat-Call</a>
          <a href="#">Calls-</a>
          <a href="#">Reserve-</a>
        </nav>
      </aside>

      <section class="main-panel card">
        <form>
          <div class="form-group">
            <label for="type">Type:</label>
            <select class="form-control" name="type" id="type">

              <?php
                include 'conexao.php';
                $select = "SELECT * FROM tb_type";
                $query = $conexao->query($select);
                while ($resultado = $query->fetch_assoc()) { ?>

                  <option value="id_type"><?php echo $resultado['nm_type'] ?> </option> 

              <?php } ?>
                  
            </select>
            

            <label for="urgency">Urgency:</label>
            <select class="form-control" name="urgency" id="urgency">

              <?php
                include 'conexao.php';
                $select = "SELECT * FROM tb_urgency";
                $query = $conexao->query($select);
                while ($resultado = $query->fetch_assoc()) { ?>

                  <option value="id_urgency"><?php echo $resultado['nm_urgency'] ?> </option> 

              <?php } ?>
                  
            </select>

            <label for="category">Category:</label>
            <select class="form-control" name="category" id="category">

              <?php
                include 'conexao.php';
                $select = "SELECT * FROM category";
                $query = $conexao->query($select);
                while ($resultado = $query->fetch_assoc()) { ?>

                  <option value="id_category"><?php echo $resultado['nm_category'] ?> </option> 

              <?php } ?>
                  
            </select>

            <label class="label-inline">Title:
              <input id="callTitle" type="text" required>
            </label>

            <label class="label-large">Description:
              <textarea id="callDescription" rows="6" required></textarea>
            </label>

            <div class="actions">
              <button class="btn" type="submit">Send</button>
            </div>
          </div>
      </form>
      </section>
    </div>
  </div>

<script src="script.js"></script>
</body>
</html>
