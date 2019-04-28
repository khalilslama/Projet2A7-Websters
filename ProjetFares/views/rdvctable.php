<html>  
    <head>  
        <title>RDVC Backend</title>  
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
    function fetch_data()  
    {  
        $.ajax({  
            url:"../core/rdvc/select.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data').html(data);  
            }  
        });  
    }  
    fetch_data();  
    $(document).on('click', '#btn_add', function(){  
        var idclient = $('#idclient').text();
		var type = $('#type').text();
		var status = $('#status').text();
		var date = $('#date').text();
        if((idclient == '')||(date == '')||(type == '')||(status == ''))  
        {  
            alert("Veuillez entrer toutes les donnés");
            return false;  
        }   
        $.ajax({  
            url:"../core/rdvc/insert.php",  
            method:"POST",  
            data:{idclient:idclient, date:date, type:type, status:status},  
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
            url:"../core/rdvc/edit.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                //alert(data);
				$('#result').html("<div class='alert alert-success'>"+data+"</div>");
            }  
        });  
    }
    $(document).on('blur', '.idclient', function(){  
        var id = $(this).data("id1"); 
        var idclient = $(this).text();
        edit_data(id, idclient, "idclient");  
    });  
    $(document).on('blur', '.date', function(){  
        var id = $(this).data("id2");  
        var date = $(this).text();  
        edit_data(id, date, "date");  
    });
	$(document).on('blur', '.type', function(){  
        var id = $(this).data("id3");  
        var type = $(this).text();  
        edit_data(id, type, "type");  
    });
	$(document).on('blur', '.status', function(){  
        var id = $(this).data("id4"); 
        var status = $(this).text();  
        edit_data(id, status, "status");  
    });
    $(document).on('click', '.btn_delete', function(){  
        var id=$(this).data("id5");  
        if(confirm("Veuillez confirmer votre action"))  
        {  
			$.ajax({  
                url:"../core/rdvc/delete.php",  
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