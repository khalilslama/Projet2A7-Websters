<?php  
 $connect = mysqli_connect("localhost", "root", "", "2a7");
 $output = '';
 $op0="";
 $op1="";
 $op2="";
 $op3="";
 $op4="";
 $op5="";
 $op6="";
 $op7="";
 $op8="";
 $op9="";
 $op10="";
 $op11="";
 $op12="";
 if(($_POST['sort']=="")||($_POST['sort']=="0"))
 {
	 $sql = "SELECT * FROM rdvprof ORDER BY idrdvprof ASC";
	 $op0="Selected";
 }
 else if($_POST['sort']=="1")
 {
	 $sql = "SELECT * FROM rdvprof ORDER BY nom ASC";
	 $op1="Selected";
 }
 else if($_POST['sort']=="2")
 {
	 $sql = "SELECT * FROM rdvprof ORDER BY prenom ASC";
	 $op2="Selected";
 }
 else if($_POST['sort']=="3")
 {
	 $sql = "SELECT * FROM rdvprof ORDER BY telephone ASC";
	 $op3="Selected";
 }
 else if($_POST['sort']=="4")
 {
	 $sql = "SELECT * FROM rdvprof ORDER BY email ASC";
	 $op4="Selected";
 }
 else if($_POST['sort']=="5")
 {
	 $sql = "SELECT * FROM rdvprof ORDER BY region ASC";
	 $op5="Selected";
 }
 else if($_POST['sort']=="6")
 {
	 $sql = "SELECT * FROM rdvprof ORDER BY localite ASC";
	 $op6="Selected";
 }
 else if($_POST['sort']=="7")
 {
	 $sql = "SELECT * FROM rdvprof ORDER BY nivetud ASC";
	 $op7="Selected";
 }
 else if($_POST['sort']=="8")
 {
	 $sql = "SELECT * FROM rdvprof ORDER BY date ASC";
	 $op8="Selected";
 }
 else if($_POST['sort']=="9")
 {
	 $sql = "SELECT * FROM rdvprof ORDER BY diplome ASC";
	 $op9="Selected";
 }
 else if($_POST['sort']=="10")
 {
	 $sql = "SELECT * FROM rdvprof ORDER BY spec ASC";
	 $op10="Selected";
 }
 else if($_POST['sort']=="11")
 {
	 $sql = "SELECT * FROM rdvprof ORDER BY adresse ASC";
	 $op11="Selected";
 }
 else if($_POST['sort']=="12")
 {
	 $sql = "SELECT * FROM rdvprof ORDER BY status ASC";
	 $op12="Selected";
 }
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <select name="sort" style="float: right;" id="sort">
	  	<option data-id="0" '.$op0.'>ID</option>
	  	<option data-id="1" '.$op1.'>Nom</option>
	  	<option data-id="2" '.$op2.'>Prénom</option>
	  	<option data-id="3" '.$op3.'>Téléphone</option>
	  	<option data-id="4" '.$op4.'>Email</option>
	  	<option data-id="5" '.$op5.'>Région</option>
	  	<option data-id="6" '.$op6.'>Localité</option>
	  	<option data-id="7" '.$op7.'>Niveau</option>
	  	<option data-id="8" '.$op8.'>Date</option>
	  	<option data-id="9" '.$op9.'>Diplome</option>
	  	<option data-id="10" '.$op10.'>Spécialisation</option>
	  	<option data-id="11" '.$op11.'>Adresse</option>
	  	<option data-id="12" '.$op12.'>Etat</option>
	  </select>
	  <br>
	  <br>
	  <div class="table-responsive">  
           <table class="table table-bordered" id="table">  
                <tr>  
                     <th width="6%">Id</th>  
                     <th width="6%">Nom</th>  
                     <th width="6%">Prénom</th>
					 <th width="6%">Téléphone</th>
					 <th width="7%">Email</th>
					 <th width="6%">Région</th>
					 <th width="6%">Localité</th>
					 <th width="6%">Niveau</th>
					 <th width="6%">Date</th>
					 <th width="6%">Diplome</th>
					 <th width="6%">Specialisation</th>
					 <th width="7%">Adresse</th>
					 <th width="6%">CV</th>
					 <th width="6%">Etat</th>
                     <th width="6%">Delete</th>
					 <th width="6%">Embaucher</th>
                </tr>';  
 $rows = mysqli_num_rows($result);
 $i=1;
 if($rows > 0)  
 {  
      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["idrdvprof"].'</td>  
                     <td data-id1="'.$row["idrdvprof"].'" class="nom">'.$row["nom"].'</td>  
                     <td data-id2="'.$row["idrdvprof"].'" class="prenom">'.$row["prenom"].'</td>  
					 <td data-id3="'.$row["idrdvprof"].'" class="telephone">'.$row["telephone"].'</td>
					 <td data-id4="'.$row["idrdvprof"].'" class="email">'.$row["email"].'</td>
					 <td data-id5="'.$row["idrdvprof"].'" class="region">'.$row["region"].'</td>
					 <td data-id6="'.$row["idrdvprof"].'" class="localite">'.$row["localite"].'</td>
					 <td data-id7="'.$row["idrdvprof"].'" class="nivetud">'.$row["nivetud"].'</td>
					 <td data-id8="'.$row["idrdvprof"].'" class="date" contenteditable>'.$row["date"].'</td>
					 <td data-id9="'.$row["idrdvprof"].'" class="diplome">'.$row["diplome"].'</td>
					 <td data-id10="'.$row["idrdvprof"].'" class="spec" >'.$row["spec"].'</td>
					 <td data-id11="'.$row["idrdvprof"].'" class="adresse" >'.$row["adresse"].'</td>
					 <td data-id12="'.$row["idrdvprof"].'"><a download="cv.jpg" href="data:image/jpeg;base64,'.base64_encode( stripslashes($row['piccv']) ).'"/ title="CV"><button type="button" name="download_btn" class="btn btn-download btn_download">↓</button></a></td>
					 <td data-id14="'.$row["idrdvprof"].'" class="status" contenteditable>'.$row["status"].'</td>  
                     <td><button type="button" name="delete_btn" data-id15="'.$row["idrdvprof"].'" class="btn btn-danger btn_delete">x</button></td>  
                     <td><button type="button" name="addstaff_btn" data-id16="'.$i.'" class="btn btn-success" id="btn_addstaff">x</button></td>  
                </tr>  
           ';
		  $i=$i+1;
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="nom" contenteditable></td>  
                <td id="prenom" contenteditable></td> 
				<td id="telephone" contenteditable></td>
				<td id="email" contenteditable></td>
				<td id="region" contenteditable></td>
				<td id="localite" contenteditable></td>
				<td id="nivetud" contenteditable></td>
				<td id="date" contenteditable></td>
				<td id="diplome" contenteditable></td>
				<td id="spec" contenteditable></td>
				<td id="adresse" contenteditable></td>
				<td id="piccv" contenteditable></td>
				<td id="status" contenteditable></td>
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '
				<tr>  
					<td></td>  
					<td id="nom" contenteditable></td>  
					<td id="prenom" contenteditable></td> 
					<td id="telephone" contenteditable></td>
					<td id="email" contenteditable></td>
					<td id="region" contenteditable></td>
					<td id="localite" contenteditable></td>
					<td id="nivetud" contenteditable></td>
					<td id="date" contenteditable></td>
					<td id="diplome" contenteditable></td>
					<td id="spec" contenteditable></td>
					<td id="adresse" contenteditable></td>
					<td id="piccv" contenteditable></td>
					<td id="status" contenteditable></td>
					<td><button type="button" name="btn_add" id="btn_add" class="btn btn-success">+</button></td>  
			   </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>