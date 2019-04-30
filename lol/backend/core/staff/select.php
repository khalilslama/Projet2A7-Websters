<?php  
 $connect = mysqli_connect("localhost", "root", "", "test");
 $output = '';  
 $sql = "SELECT * FROM staff ORDER BY idstaff DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="14%">ID</th>  
                     <th width="14%">Nom</th>  
                     <th width="14%">Prenom</th>
		     <th width="14%">Telephone</th>
		     <th width="14%">Email</th>
		     <th width="14%">Mot de Passe</th>
                     <th width="14%"></th>  
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["idstaff"].'</td>    
		     <td data-id1="'.$row["idstaff"].'" class="nom" contenteditable>'.$row["nom"].'</td>
		     <td data-id2="'.$row["idstaff"].'" class="prenom" contenteditable>'.$row["prenom"].'</td>
		     <td data-id3="'.$row["idstaff"].'" class="telephone" contenteditable>'.$row["telephone"].'</td>
		     <td data-id4="'.$row["idstaff"].'" class="email" contenteditable>'.$row["email"].'</td>
		     <td data-id5="'.$row["idstaff"].'" class="mdp">'.$row["mdp"].'</td>  
                     <td><button type="button" name="delete_btn" data-id6="'.$row["idstaff"].'" class="btn btn-danger btn_delete">x</button></td>  
                </tr>';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="nom" contenteditable></td>  
				<td id="prenom" contenteditable></td>
				<td id="telephone" contenteditable></td>
				<td id="email" contenteditable></td>
				<td id="mdp"></td>
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
					<td id="mdp"></td>
                	<td><button type="button" name="btn_add" id="btn_add" class="btn btn-success">+</button></td> 
			   </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>