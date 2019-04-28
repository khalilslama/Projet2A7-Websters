<?php  
 $connect = mysqli_connect("localhost", "root", "", "2a7");
 $output = '';  
 $sql = "SELECT * FROM rdvc ORDER BY idrdvc DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="16%">ID</th>  
                     <th width="16%">ID Client</th>  
                     <th width="16%">Date</th>
		     <th width="16%">Type</th>
		     <th width="16%">Etat</th>
                     <th width="16%"></th>  
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["idrdvc"].'</td>  
                     <td data-id1="'.$row["idrdvc"].'" class="idclient">'.$row["idclient"].'</td>  
		     <td data-id2="'.$row["idrdvc"].'" class="date" contenteditable>'.$row["date"].'</td>
		     <td data-id3="'.$row["idrdvc"].'" class="type">'.$row["type"].'</td>
		     <td data-id4="'.$row["idrdvc"].'" class="status" contenteditable>'.$row["status"].'</td>  
                     <td><button type="button" name="delete_btn" data-id5="'.$row["idrdvc"].'" class="btn btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="idclient" contenteditable></td>  
		<td id="date" contenteditable></td>
		<td id="type" contenteditable></td>
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
                			<td id="idclient" contenteditable></td>  
					<td id="date" contenteditable></td>
					<td id="type" contenteditable></td>
					<td id="status" contenteditable></td>
                			<td><button type="button" name="btn_add" id="btn_add" class="btn btn-success">+</button></td> 
			   </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>