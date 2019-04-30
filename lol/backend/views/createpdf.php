<?php
function fetch_data()  
{  
      $output = '';  
        $connect = mysqli_connect("localhost", "root", "", "najehhautecouture");  
        $sql = "SELECT * FROM article";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>
                                    <td><img src="image/'.$row['image'].'"></td>
                                    <td>'.$row['reference'].'</td>
                                    <td>'.$row['nomarticle'].'</td>
                                    <td>'.$row['description'].'</td>
                                    <td>'.$row['margedage'].'</td>
                                    <td>'.$row['margedeprix'].'</td>           
                                </tr>  
                          ';  
      }  
      return $output;  
}  
 if(isset($_POST["pdf"]))  
 {  
      require_once('../../tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Catalog");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = "";  
      $content .= "  
      <h3 align="."center".">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br />  
      <table id="."lol".">
                                <tr>
                                    <th>Image</th>
                                    <th>reference</th>
                                    <th>Nom de l'article</th>
                                    <th>description</th>
                                    <th>marge D'age</th>
                                    <th>marge de prix</th>
                                    <th>status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr> 
      ";  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('sample.pdf', 'I');  
 }  
 ?>  