$(document).ready(function() {
	$("#contact").submit(function() {
		var nom = $("#fullname").val();
		var email = $("#email").val();
		var numero = $("#numero").val();
		var sujet = $("#sujet").val();
		var message = $("#message").val();
		if (nom != "" && email != "" && numero != "" && sujet != "" && message != "") {
			$.ajax({
				type: "post",
				url: "contact.php",
				data: {
					'nom': nom,
					'email': email,
					'numero': numero,
					'sujet': sujet,
					'message': message
				},
				success: function(data) {
					if (data == "reussi") {
						$("#soumettre").html("Message Envoyé");
						$("#soumettre").addClass("alert alert-success").css("color", "white");
					} else {
						alert(data);
					}

				}
			});
		} else {
			alert("Veuillez remplir tous les champs");
		}
	});
});