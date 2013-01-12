// "Installeur Sooth ERP" , BSD license, http://www.sootherp.fr/
// "Installeur Sooth ERP" makes use of "Spin.js" and "JQuery", both under MIT license
// See README and LICENSE files.
$(function() {

	  	///////////
		//
		// BUTTON 1
		//
		///////////

		$(".button1").live('click' , function() {

		// On masque les messages d'erreur
		$('.error').hide();


		var unzipped = $("input#unzipped").val();


		if (unzipped == "false") {

		$( "#process_form" ).empty().append("Extraction des archives en cours, veuillez patienter...");
		var target = document.getElementById('spin1');
		var spinner = new Spinner(opts).spin(target);
		}

		var step = 1;

		var dataString = 'step='+ step +'&unzipped='+ unzipped;


			$.ajax({
			type: "POST",
			url: "./process.php",
			data: dataString,
				success: function(data) {
				if (unzipped == "false") {
				target.parentNode.removeChild(target);
				}
				$( "#process_form" ).empty().append( data );

				}
			});
		return false;
		});

	  	///////////
		//
		// BUTTON 1b
		//
		///////////

	 $('.button1b').live('click' , function(){


		var step = '1b';


		var dataString = 'step='+ step;

			 $.ajax({
		  type: "POST",
		  url: "./process.php",
		  data: dataString,
		  success: function(data) {

			$('.menuHeader').removeClass('active').next().slideUp();
			$('.menuHeader:eq(1)').toggleClass('active').next().slideDown();
			$("#icon1").attr("src", "./images/tick.png");
			$("#icon2").attr("src", "./images/down.png");
			$("#h2-1").attr("style", "background-image: url('./images/h2.png'); background-repeat: no-repeat");
			$("#h2-2").attr("style", "background-image: url('./images/h2square.png'); background-repeat: no-repeat");


		  }
		 });



		  return false;



	  });



	  	///////////
		//
		// BUTTON 2
		//
		///////////

		$(".button2").live('click' , function() {
		
		// On masque les messages d'erreur
		$('.error').hide();
		

				


		

		var step = 2;


			var host = $("input#host").val();
			if (host == "") {
		  $("label#host_error").show();
		  $("input#host").focus();
		  return false;
		}
			var dbname = $("input#dbname").val();
			if (dbname == "") {
		  $("label#dbname_error").show();
		  $("input#dbname").focus();
		  return false;
		}
		  var username = $("input#username").val();
			if (username == "") {
		  $("label#username_error").show();
		  $("input#username").focus();
		  return false;
		}

		var pass = $("input#pass").val();

		

			var dataString = 'step='+ step + '&username='+ username + '&host=' + host + '&dbname=' + dbname + '&pass=' + pass;

			if (username != "" && host != "" && dbname != "")
			{
			//var target = document.getElementById('spin2');
			//var spinner = new Spinner(opts).spin(target);
			}
        

			$.ajax({
			type: "POST",
			url: "./process.php",
			data: dataString,
				success: function(data) {
				$( "#process_form2" ).empty().append( data );
				$('.error').hide();
				
 
				}
			});

		return false;
		});
		
		
		///////////
		//
		// BUTTON 2b
		//
		///////////
		
		
		

	 $('.button2b').live('click' , function(){


		var step = '2b';


		var dataString = 'step='+ step;

			 $.ajax({
		  type: "POST",
		  url: "./process.php",
		  data: dataString,
		  success: function(data) {

		 

				$('.menuHeader').removeClass('active').next().slideUp();
				$('.menuHeader:eq(2)').toggleClass('active').next().slideDown();
				$("#icon2").attr("src", "./images/tick.png");
				$("#icon3").attr("src", "./images/down.png");
				$("#h2-2").attr("style", "background-image: url('./images/h2.png'); background-repeat: no-repeat");
				$("#h2-3").attr("style", "background-image: url('./images/h2square.png'); background-repeat: no-repeat");



		  }
		 });



		  return false;



	  });


	  	///////////
		//
		// BUTTON 3
		//
		///////////


		$(".button3").click(function() {
		$( "#process_form3" ).empty().append("Construction de la base de donn&eacute;es en cours, veuillez patienter...");
		var target = document.getElementById('spin3');
		var spinner = new Spinner(opts).spin(target);


		var step = 3;


		var dataString = 'step='+ step;



			$.ajax({
		  type: "POST",
		  url: "./process.php",
		  data: dataString,
		  success: function() {


		  target.parentNode.removeChild(target);

				$('.menuHeader').removeClass('active').next().slideUp();
				$('.menuHeader:eq(3)').toggleClass('active').next().slideDown();
				$("#icon3").attr("src", "./images/tick.png");
				$("#icon4").attr("src", "./images/down.png");
				$("#h2-3").attr("style", "background-image: url('./images/h2.png'); background-repeat: no-repeat");
				$("#h2-4").attr("style", "background-image: url('./images/h2square.png'); background-repeat: no-repeat");



		  }
		 });
		return false;
		});


	});








	$(document).ready(function() {

		$('.menuContainer').hide();
		$('.menuHeader:first').addClass('active').next().show();

		});


	  	///////////
		//
		// SPIN
		//
		///////////


	var opts = {
	  lines: 24, // The number of lines to draw
	  length: 1, // The length of each line
	  width: 2, // The line thickness
	  radius: 16, // The radius of the inner circle
	  color: '#ff0', // #rbg or #rrggbb
	  speed: 1, // Rounds per second
	  trail: 70, // Afterglow percentage
	  shadow: false // Whether to render a shadow
	};

