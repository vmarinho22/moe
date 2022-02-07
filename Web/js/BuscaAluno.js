
document.getElementById("matricula").addEventListener("change", BuscaAluno);
        	function BuscaAluno() {
        		//alert("entrou");
   					$.post( "Aluno_processs.php", 
						{
						txtaluno: $("#matricula").val(),
						ocorrencia: "1" 
						}

					).done(function( data ) {
					//alert(data);
					
        				document.getElementById("resp").innerHTML = data;
					
					});	
				}