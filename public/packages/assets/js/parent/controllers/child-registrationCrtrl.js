var childRegistrationCrtrl = {

	delete:function(id){

		if (id != null || id != "") {
			Curiosity.notyInput("Escribe la palabra ELIMINAR para continuar.","text",function(input){
				 if(input == "ELIMINAR" || input == "eliminar"){
					  childRegistration.delete(id,"POST",function(){
						  window.location.reload();
					  });
				 }else {
				 	  Curiosity.noty.info("La palabra escrita no es correcta")
				 }
		 });
		}
	},

	getSons:function(success){
		childRegistration.getSons(success);
  }

};
