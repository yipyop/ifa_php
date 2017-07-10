<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulaire</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  </head>

  <body>

<div class="container">

  <h1>Formulaire</h1><br>


  <form action="cible.php" method="post">

    <label for="number_of_credit" id="number_of_credit">Indiquez le nombre de crédits en cours</label><input class="form-control"  type="number" name="number_of_credit" value="1" min="1" max="5"><br>

    <fieldset>
      <legend>Crédit 1</legend>

      <label for="">Nature de l'emprunt</label>
      <select class="form-control" name="type_de_credit" id="type_de_credit">
         <option value="pret_personnel">Prêt personnel</option>
         <option value="pret_immobilier">Prêt immobilier</option>
         <option value="pret_travaux">Prêt travaux</option>
      </select><br>

      <label for="">Montant des mensualités</label><input class="form-control"  type="text" name="montant_mensualite" value=""><br>

      <label for="">Date de fin des mensualités</label>
      <div class="form-group">
                  <div class='input-group date' id='datetimepicker1'>
                      <input type='text' class="form-control" />
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
      </div><br>

      <label for="">Taux de crédit</label><input  class="form-control" type="number" name="taux_credit" value="0" max="15" min="0" step="0.1"><br>

      <label for="">Capital restant dû</label><input class="form-control"  type="text" name="capital_restant" value=""><br>

      <label for="">Capital emprunté</label><input class="form-control"  type="text" name="capital_emprunte" value=""><br>
    </fieldset>


    <button class="btn btn-control btn-primary" type="submit" name="validation_button" value="Envoyer le formulaire">Envoyer</button><br>

  </form>
</div>

    <script
      src="https://code.jquery.com/jquery-3.2.1.min.js"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous">
    </script>

    <!-- Latest compiled and minified JavaScript -->
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

  </body>
</html>
