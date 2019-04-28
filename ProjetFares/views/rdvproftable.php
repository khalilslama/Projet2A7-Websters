<html>  
    <head>  
        <title>RDVPROF Backend</title>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    </head>  
    <body>  
        <div class="container" style="width: 100%">  
            <br />  
            <br />
			<br />
			<div class="table-responsive">  
				<h3 align="center">Rendez-vous Professionels<br />
				<span id="result"></span>
				<div id="live_data" style="width: 100%"></div>                 
			</div>  
		</div>
    </body>  	
</html>  
<script>  
$(document).ready(function(){  
    function fetch_data(sort)  
    {  
		$.ajax({  
            url:"../core/rdvprof/select.php",
			data:{sort:sort},
            method:"POST",  
            success:function(data){  
				$('#live_data').html(data);  
            }  
        });
    }  
    fetch_data("");  
	$(document).on('change', '#sort', function(){
		var tri = ($(this).find(":selected").data("id"));
		fetch_data(tri);
	})
    $(document).on('click', '#btn_add', function(){  
        var nom = $('#nom').text();
        var prenom	 = $('#prenom').text();
		var telephone = $('#telephone').text();
		var email = $('#email').text();
		var region = $('#region').text();
		var localite = $('#localite').text();
		var nivetud = $('#nivetud').text();
		var date = $('#date').text();
		var diplome = $('#diplome').text();
		var spec = $('#spec').text();
		var adresse = $('#adresse').text();
		var status = $('#status').text();
        if((nom == '')||(prenom == '')||(telephone == '')||(email == '')||(region == '')||(localite == '')||(nivetud == '')||(date == '')||(diplome == '')||(spec == '')||(adresse == '')||(status == ''))  
        {  
            alert("Veuillez entrer toutes les donnés");
            return false;  
        }   
        $.ajax({  
            url:"../core/rdvprof/insert.php",  
            method:"POST",  
            data:{nom:nom, prenom:prenom, telephone:telephone, email:email, region:region, localite:localite, nivetud:nivetud, date:date, diplome:diplome, spec:spec, adresse:adresse, status:status},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data("");  
            }  
        })  
    });
	
	$(document).on('click', '#btn_addstaff', function(){
		fetch_data("");
        var Table = document.getElementById('table');
		var id = Table.rows[$(this).data("id16")].cells[0].innerHTML;
		var Cells = Table.rows.item($(this).data("id16")).cells;
		for(var j = 1; j < 5; j++)
		{
			var cellVal = Cells.item(j).innerHTML;
			if(j==1)
				{
					var nom = cellVal;
				}
			if(j==2)
				{
					var prenom	 = cellVal;
				}
			if(j==3)
				{
					var telephone = cellVal;
				}
			if(j==4)
				{
					var email = cellVal;
				}
		}
        if(confirm("Voulez vous embaucher "+nom+"?"))  
        {  
			$.ajax({  
                url:"../core/staff/addstaff.php",  
                method:"POST",  
                data:{nom:nom, prenom:prenom, telephone:telephone, email:email, id:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data("");  
                }  
            });
        }
    }); 
    
	function edit_data(id, text, column_name)  
    {  
		$.ajax({  
            url:"../core/rdvprof/edit.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                //alert(data);
				$('#result').html("<div class='alert alert-warning'>"+data+"</div>");
            }  
        });  
    }  
    $(document).on('blur', '.nom', function(){  
        var id = $(this).data("id1"); 
        var nom = $(this).text();
        edit_data(id, nom, "nom");  
    });  
    $(document).on('blur', '.prenom', function(){  
        var id = $(this).data("id2");  
        var prenom = $(this).text();  
        edit_data(id,prenom, "prenom");  
    });
	$(document).on('blur', '.telephone', function(){  
        var id = $(this).data("id3");  
        var telephone = $(this).text();  
        edit_data(id,telephone, "telephone");  
    });
	$(document).on('blur', '.email', function(){  
        var id = $(this).data("id4"); 
        var email = $(this).text();  
        edit_data(id,email, "email");  
    });
	$(document).on('blur', '.region', function(){  
        var id = $(this).data("id5");  
        var region = $(this).text();  
        edit_data(id,region, "region");  
    });
	$(document).on('blur', '.localite', function(){  
        var id = $(this).data("id6");  
        var localite = $(this).text();  
        edit_data(id,localite, "localite");  
    });
	$(document).on('blur', '.nivetud', function(){  
        var id = $(this).data("id7");  
        var nivetud = $(this).text();  
        edit_data(id,nivetud, "nivetud");  
    });
	$(document).on('blur', '.date', function(){  
        var id = $(this).data("id8");  
        var date = $(this).text();  
        edit_data(id,date, "date");  
    });
	$(document).on('blur', '.diplome', function(){  
        var id = $(this).data("id9");  
        var diplome = $(this).text();  
        edit_data(id,diplome, "diplome");  
    });
	$(document).on('blur', '.spec', function(){  
        var id = $(this).data("id10");  
        var spec = $(this).text();  
        edit_data(id,spec, "spec");  
    });
	$(document).on('blur', '.adresse', function(){  
        var id = $(this).data("id11");  
        var adresse = $(this).text();  
        edit_data(id,adresse, "adresse");  
    });
	$(document).on('blur', '.status', function(){  
        var id = $(this).data("id14");  
        var status = $(this).text();  
        edit_data(id,status, "status");  
    });
    $(document).on('click', '.btn_delete', function(){  
        var id=$(this).data("id15");  
        if(confirm("Veuillez confirmer votre action"))  
        {  
			$.ajax({  
                url:"../core/rdvprof/delete.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data("");  
                }  
            });  
        }
	}); 
});  
</script>