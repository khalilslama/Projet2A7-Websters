<div class="form-group">
 <label>Tourpoitrine</label>
 <input type="text" name="Tourpoitrine" id="Tourpoitrine" class="form-control" />
</div>
<div class="form-group">
 <label>tourtaille</label>
 <input type="text" name="tourtaille" id="tourtaille" class="form-control" />
</div>
<div class="form-group">
 <label>tourbassin</label>
 <input type="text" name="tourbassin" id="tourbassin" class="form-control" />
</div>
<div class="form-group">
 <label>L_taille</label>
 <input type="text" name="L_taille" id="L_taille" class="form-control" />
</div>

<div class="form-group">
 <label>H_poitrine</label>
 <input type="text" name="H_poitrine" id="H_poitrine" class="form-control" />
</div>
<div class="form-group">
 <label>E_poitrine</label>
 <input type="text" name="E_poitrine" id="E_poitrine" class="form-control" />
</div>
<div class="form-group">
 <label>Carruredos</label>
 <input type="text" name="Carruredos" id="Carruredos" class="form-control" />
</div>
<div class="form-group">
 <label>Carruredevant</label>
 <input type="text" name="Carruredevant" id="Carruredevant" class="form-control" />
</div>

<div class="form-group">
 <label>L_epaule</label>
 <input type="text" name="L_epaule" id="L_epaule" class="form-control" />
</div>
<div class="form-group">
 <label>Grosseurbras</label>
 <input type="text" name="Grosseurbras" id="Grosseurbras" class="form-control" />
</div>
<div class="form-group">
 <label>Tourpoignet</label>
 <input type="text" name="Tourpoignet" id="Tourpoignet" class="form-control" />
</div>
<div class="form-group">
 <label>Hauteurgenou</label>
 <input type="text" name="Hauteurgenou" id="Hauteurgenou" class="form-control" />
</div>
<div class="form-group">
 <label>L_taille_terre</label>
 <input type="text" name="L_taille_terre" id="L_taille_terre" class="form-control" />
</div>
<div class="form-group">
 <label>Longeurtotale</label>
 <input type="text" name="Longeurtotale" id="Longeurtotale" class="form-control" />
</div>
<script>
 $(document).ready(function () {

  
  var Tourpoitrine = localStorage.getItem('Tourpoitrine');
  var tourtaille = localStorage.getItem('tourtaille');
  var tourbassin = localStorage.getItem('tourbassin');
  var L_taille = localStorage.getItem('L_taille');
  var H_poitrine = localStorage.getItem('H_poitrine');
  var E_poitrine = localStorage.getItem('E_poitrine');
  var Carruredos = localStorage.getItem('Carruredos');
  var Carruredevant = localStorage.getItem('Carruredevant');
  var L_epaule = localStorage.getItem('L_epaule');
  var Grosseurbras = localStorage.getItem('Grosseurbras');
  var Tourpoignet = localStorage.getItem('Tourpoignet');
  var Hauteurgenou = localStorage.getItem('Hauteurgenou');
  var L_taille_terre = localStorage.getItem('L_taille_terre');
  var Longeurtotale = localStorage.getItem('Longeurtotale');

  $('#Tourpoitrine').val(Tourpoitrine);
  $('#tourtaille').val(tourtaille);
  $('#tourbassin').val(tourbassin);
  $('#L_taille').val(L_taille);
  $('#H_poitrine').val(H_poitrine);
  $('#E_poitrine').val(E_poitrine);
  $('#Carruredos').val(Carruredos);
  $('#Carruredevant').val(Carruredevant);
  $('#L_epaule').val(L_epaule);
  $('#Grosseurbras').val(Grosseurbras);
  $('#Tourpoignet').val(Tourpoignet);
  $('#Hauteurgenou').val(Hauteurgenou);
  $('#L_taille_terre').val(L_taille_terre);
  $('#Longeurtotale').val(Longeurtotale);

  /*if(images != '')
  {
   $('#uploaded_image').html('<img src="images/'+images+'" class="img-thumbnail" width="100" />');
   $('#hidden_images').val(images);
  }*/

 });
</script>