$(document).ready(function(){
	
	 	$("#btn_enviar").click(function(){
       		
	 		login = document.getElementById("matricula").value;
    		senha = document.getElementById("senha").value;

    		if (login=="" || senha=="") {
        		text = "Campos login ou senha vazios !!!";
        		document.getElementById("resp").innerHTML = text;
    		}else{
    		
 				$.post( "veryLogin.php", 
					{
					matricula: $("#matricula").val(), 
					senha: $("#senha").val(), 
					}
				).done(function( data ) {
					//alert(data);
					//window.location.replace("veryLogin.php");
					if(data=="0"){
						/*document.getElementById('matricula').value = "";
						window.location.replace("aluno.php");
						*/
						text = "Usuário encontrado !!!";
        				document.getElementById("resp").innerHTML = text;
					}else{
						text = "Usuário não encontrado !!!";
        				document.getElementById("resp").innerHTML = text;
					}
				});	
			}
    	});





	});