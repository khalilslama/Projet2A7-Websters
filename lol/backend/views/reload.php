<?php
include "../../core/Collections.php";
include "../../core/Article.php";
if(isset($_POST['product']))
{
    echo"<tr>
                                    <th>Image</th>
                                    <th>reference</th>
                                    <th>Nom de l'article</th>
                                    <th>description</th>
                                    <th>marge D'age</th>
                                    <th>marge de prix</th>
                                    <th>status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>";
                                
                                $hi = new ArticleR();
                                $hi->afficherArticleB();
}
if($_POST['col'] == 1)
{
    $lol = htmlspecialchars($_POST['collect']);
     echo"<tr>
                            <th>Image</th>
                            <th id="."collection"." name="."collection"." value="."nomcollection".">Collection Title</th>
                            <th id="."styliste"." name="."styliste"." value="."nomstyliste".">Styliste Name</th>
                            <th id="."an"." name="."an"." value="."an".">Année</th>
                            <th id="."nbarticle"." name="."nbarticle"." value="."nbarticle".">Nombre d'article</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>";
                        $hi = new CollectionR();
                        $hi->afficherCollectionB($lol,"");

}  
if($_POST['order'] == 1 )
{
     echo"<tr>
                            <th>Image</th>
                            <th id="."collection"." name="."collection"." value="."nomcollection".">Collection Title</th>
                            <th id="."styliste"." name="."styliste"." value="."nomstyliste".">Styliste Name</th>
                            <th id="."an"." name="."an"." value="."an".">Année</th>
                            <th id="."nbarticle"." name="."nbarticle"." value="."nbarticle".">Nombre d'article</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>";
                        $hi = new CollectionR();
                        $hi->afficherCollectionB("",$_POST['by']);
}


?>