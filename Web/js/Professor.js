
document.getElementById("professor").addEventListener("change", BuscaProfessor);
        	function BuscaProfessor() {
        		//alert("entrou");
   					$.post( "Professor_process.php", 
						{
						txtprof: $("#professor").val(),
						ocorrencia: "1" 
						}

					).done(function( data ) {
					//alert(data);
					
        				document.getElementById("resp").innerHTML = data;
					
					});	
				}