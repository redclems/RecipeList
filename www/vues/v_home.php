<main>
  <article>
    <h1>RecipeList</h1>

    <div class="carrousel">
      <?php
      foreach (array(1, 1.2, 1.36, 1.5, 1.8, 2.12, 2.30, 2.5, 3, 3.5, 4.5, 5) as &$noteMeans) {
        $title = "marbrer au jus de pamplemousse et la citronade";
        $url = "../../image/Recipe/recipe-1.jpg"; //<?= $url
        $idRecipe = 1;
        $nbDisplay = 1;

        require('./vues/util/v_displayRecipe.php');
      }
       ?>
   </div>

  </article>
  <aside>
    <h2>Les nouvelle recette<h2>
  </aside>


</main>
