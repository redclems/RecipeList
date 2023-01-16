<div class="Popup" id="FormAddList">
  <div class="backPopup backPopupTop" onclick="closeAddList()"></div>
  <div class="PopupCenterFlex">
    <div class="backPopup backPopupLeft" onclick="closeAddList()"></div>
    <form action="/action_page.php" class="center formPopup">
      <div class="item">
        <button class="close" type="button" onclick="closeAddList()"><img src="<?= $file ?>image/icon/cross.png" alt="close bouton"></button>
      </div>
      <h1>Ajouter une liste</h1>

      <p>
        <label class="label" for="name">Nom de la liste</label>
        <div>
          <input class="input" type="text" placeholder="entrée le nom" name="name" required>
        </div>
      </p>

      <button type="submit" class="reinitialise button">Ajouter</button>
      <button type="button" class="reinitialise button back" onclick="closeAddList()">Annuler</button>
    </form>
    <div class="backPopup backPopupRight" onclick="closeAddList()"></div>
  </div>
  <div class="backPopup backPopupBot" onclick="closeAddList()"></div>
</div>
