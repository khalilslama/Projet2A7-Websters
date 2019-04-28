<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_bar.php');
require_once ('jpgraph/src/jpgraph_line.php');

$connect = mysqli_connect("localhost", "root", "", "test");
$query = "SELECT DATE_FORMAT(DatCreation, '%M') as month FROM client";
$result = mysqli_query($connect, $query);
$chart_data = '';
$compteurJanuary=0;
$compteurFebruary=0;
$compteurMarch=0;
$compteurApril=0;
$compteurMay=0;
$compteurJune=0;
$compteurJuly=0;
$compteurAugust=0;
$compteurSeptember=0;
$compteurOctober=0;
$compteurNovember=0;
$compteurDecember=0;
while($row = mysqli_fetch_array($result))
{
  if(strcmp($row["month"],"January")==0)
 {
  $compteurJanuary=$compteurJanuary+1;
 }
 if(strcmp($row["month"],"February")==0)
 {
  $compteurFebruary=$compteurFebruary+1;
 }
 if(strcmp($row["month"],"March")==0)
 {
  $compteurMarch=$compteurMarch+1;
 }
 if(strcmp($row["month"],"April")==0)
 {
  $compteurApril=$compteurApril+1;
 }
 if(strcmp($row["month"],"May")==0)
 {
  $compteurMay=$compteurMay+1;
 }
 if(strcmp($row["month"],"June")==0)
 {
  $compteurJune=$compteurJune+1;
 }
 if(strcmp($row["month"],"July")==0)
 {
  $compteurJuly=$compteurJuly+1;
 }
 if(strcmp($row["month"],"August")==0)
 {
  $compteurAugust=$compteurAugust+1;
 }
 if(strcmp($row["month"],"September")==0)
 {
  $compteurSeptember=$compteurSeptember+1;
 }
 if(strcmp($row["month"],"October")==0)
 {
  $compteurOctober=$compteurOctober+1;
 }
 if(strcmp($row["month"],"November")==0)
 {
  $compteurNovember=$compteurNovember+1;
 }
 if(strcmp($row["month"],"December")==0)
 {
  $compteurDecember=$compteurDecember+1;
 }
 
}


//bar1
$data1y=array($compteurJanuary,$compteurFebruary,$compteurMarch,$compteurApril,$compteurMay,$compteurJune,$compteurJuly,$compteurAugust,$compteurSeptember,$compteurOctober,$compteurNovember,$compteurDecember);
// Create the graph. These two calls are always required
$graph = new Graph(1050,600,'auto');
$graph->SetScale('textint',0,70);

$graph->SetY2OrderBack(false);

$theme_class = new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->SetMargin(40,20,46,80);

$graph->yaxis->SetTickPositions(array(0,10,20,30,40,50,60,70), array(5,15,25,35,45,55,65));


$months = $gDateLocale->GetShortMonth();
$months = array_merge(array_slice($months,0,12), array_slice($months,0,3));
$graph->SetBox(false);

$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array('A','B','C','D'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
// Setup month as labels on the X-axis
$graph->xaxis->SetTickLabels($months);

// Create the bar plots
$b1plot = new BarPlot($data1y);

// Create the grouped bar plot

$gbplot = new GroupBarPlot(array($b1plot));

// ...and add it to the graPH
$graph->Add($gbplot);

$b1plot->SetColor("#0000CD");
$b1plot->SetFillColor("#0000CD");
$b1plot->SetLegend("Nombre d'inscription");

$graph->legend->SetFrameWeight(1);
$graph->legend->SetColumns(6);
$graph->legend->SetColor('#4E4E4E','#00A78A');
$graph->SetMargin(500,0,200,60);
$graph->legend->Pos(0.20,0.95);



// Display the graph
$graph->Stroke();
?>