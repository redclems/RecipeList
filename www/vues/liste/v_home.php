<?php
require_once($file . "vues/liste/v_add.php");
?>
<main>
  <h1>Vos liste</h1>
  <div>
    <button class="reinitialise button" onclick="openAddList()">Ajouter une liste</button>
  </div>
  <script>
    function openAddList() {
      document.getElementById("FormAddList").style.display = "block";
    }

    function closeAddList() {
      document.getElementById("FormAddList").style.display = "none";
    }
  </script>
</main>
