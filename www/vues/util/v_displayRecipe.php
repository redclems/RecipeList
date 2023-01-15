<section class="recipeView" style='background-image: url("<?= $url ?>");'>
  <div class="attRecipe">
    <div class="chrono">
      <img class="iconDisplayRecipe" src="../../image/icon/thermomix.png" alt="needIcon">
      <p>5<p>
    </div>
    <img class="iconDisplayRecipe" src="../../image/icon/chrono.png" alt="timeIcon">
  </div>
  <div class="texteDisplay">
    <h3><?= $title ?><h3>
    <div class="note">
      <div class="rating">
        <div class="stars">
          <?php foreach (array(0, 1, 2, 3, 4) as &$value) { ?>
            <tr>
                <td>
                  <!--<input class="starHover" id="note<?= $nbDisplay ?>-<?= $idRecipe ?>-<?= $value ?>" name="note" type="radio" value="<?= $value ?>">-->
                  <div class="star <?php
                  if($noteMeans >= $value + 1){
                    echo "starOn";
                  }else if($noteMeans >= $value+0.25 && $noteMeans < $value + 1.25){
                    echo "starHalf";
                  }else{
                    echo "starOff";
                  } ?>"></div>
                </td>
            </tr>
          <?php }
          unset($value);?>
        </div>
        <p><?= $noteMeans ?>/5</p>
      </div>
    </div>
  </div>
</section>
