<html>  
    <head>  
        <title>Staff Backend</title>  
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
				<h3 align="center">Staff<br />
				<span id="result"></span>
				<div id="live_data" style="width: 100%"></div>                 
			</div>  
		</div>
    </body>  	
</html>  
<script>  
$(document).ready(function(){  
    function fetch_data()  
    {  
        $.ajax({  
            url:"../core/staff/select.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data').html(data);  
            }  
        });  
    }  
    fetch_data();  
    $(document).on('click', '#btn_add', function(){  
        	var nom = $('#nom').text();
		var prenom = $('#prenom').text();
		var telephone = $('#telephone').text();
		var email = $('#email').text();
		var mdp = $('#mdp').text();
        if((nom == '')||(prenom == '')||(telephone == '')||(email == ''))  
        {  
            alert("Veuillez entrer toutes les donnés");
            return false;  
        }   
        $.ajax({  
            url:"../core/staff/insert.php",  
            method:"POST",  
            data:{nom:nom, prenom:prenom, telephone:telephone, email:email},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();  
            }  
        })  
    });  
    
	function edit_data(id, text, column_name)  
    {  
		$.ajax({  
            url:"../core/staff/edit.php",  
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
        edit_data(id, prenom, "prenom");  
    });
	$(document).on('blur', '.telephone', function(){  
        var id = $(this).data("id3");  
        var telephone = $(this).text();  
        edit_data(id, telephone, "telephone");  
    });
	$(document).on('blur', '.email', function(){  
        var id = $(this).data("id4"); 
        var email = $(this).text();  
        edit_data(id, email, "email");  
    });
    $(document).on('click', '.btn_delete', function(){  
        var id=$(this).data("id6");  
        if(confirm("Veuillez confirmer votre action"))  
        {  
			$.ajax({  
                url:"../core/staff/delete.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();  
                }  
            });  
        }  
    });  
});  
</script>