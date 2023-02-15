	// diferenças entre keyup e keydown: keyup não chama a função quando a tecla é pressionada, enquanto o keydown já faz isso.
	$(document).ready(() => {
		$("#resultado").hide();
		// keydown não funciona
		$("#pesquisar").keyup(() => {
			$("datalist").empty()
			$.ajax({
				method: "POST",
				url: "http://localhost/search/index.php/home/searching",
				data: { nome: $("#pesquisar").val() },
				success: function (r) {
					r = JSON.parse(r);

					for (rr in r) {
						var i = 1;
						$("<option></option>").attr({ id: i, value: r[rr]["nome"] }).appendTo("datalist")
						i++;
						// console.log(r[rr]["nome"])

					}
				},

				error: function (request, status, error) {
					console.log(status)
				}
			});

		});

	});