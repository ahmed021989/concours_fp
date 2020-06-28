//CHANGEMENT DES LETTRE  FRANCAIS-ARABE
function changer_lettre(id) {
    var tab = new Array;
    tab["a"] = "ض";
    tab["z"] = "ص";
    tab["e"] = "ث";
    tab["r"] = "ق";
    tab["t"] = "ف";
    tab["y"] = "غ";
    tab["u"] = "ع";
    tab["i"] = "ه";
    tab["o"] = "خ";
    tab["p"] = "ح";
    tab["^"] = "ج";
    tab["$"] = "د";
    tab["q"] = "ش";
    tab["s"] = "س";
    tab["d"] = "ي";
    tab["f"] = "ب";
    tab["g"] = "ل";
    tab["h"] = "ا";
    tab["j"] = "ت";
    tab["k"] = "ن";
    tab["l"] = "م";
    tab["m"] = "ك";
    tab["ù"] = "ط";
    tab["*"] = "ذ";
    tab["w"] = "ئ";
    tab["x"] = "ء";
    tab["c"] = "ؤ";
    tab["v"] = "ر";
    tab["b"] = "لا";
    tab["n"] = "ى";
    tab[","] = "ة";
    tab[";"] = "و";
    tab[":"] = "ز";
    tab["!"] = "ظ";

    tab["Y"] = "إ";
    tab["T"] = "لإ";
    tab["G"] = "لأ";
    tab["H"] = "أ";
    tab["J"] = "ـ";
    tab["B"] = "لآ";
    tab["N"] = "آ";

    tab["A"] = "ض";
    tab["C"] = "ؤ";
    tab["D"] = "ي";
    tab["E"] = "ث";
    tab["F"] = "ب";
    tab["I"] = "ه";
    tab["J"] = "ت";
    tab["K"] = "ن";
    tab["L"] = "م";
    tab["M"] = "ك";
    tab["O"] = "خ";
    tab["P"] = "ح";
    tab["Q"] = "ش";
    tab["R"] = "ق";
    tab["S"] = "س";
    tab["U"] = "ع";
    tab["V"] = "ر";
    tab["W"] = "ئ";
    tab["X"] = "ء";
    tab["Z"] = "ص";

    tab["²"] = "";
    tab["1"] = "";
    tab["2"] = "";
    tab["3"] = "";
    tab["4"] = "";
    tab["5"] = "";
    tab["6"] = "";
    tab["7"] = "";
    tab["8"] = "";
    tab["9"] = "";
    tab["0"] = "";
    tab["°"] = "";
    tab["+"] = "";



    var txt = document.getElementById(id).value;

    for (var i = 0; i < txt.length; i++) {
        txt = document.getElementById(id).value;
        old_txt = txt.charCodeAt(i);
        if (old_txt >= 97 && old_txt <= 123 && !isNaN(old_txt) || old_txt >= 65 && old_txt <= 90 && !isNaN(old_txt) || old_txt == 33 || String.fromCharCode(old_txt) == "^" || old_txt == 36 || old_txt == 42 || old_txt == 44 || old_txt == 59 || old_txt == 58 || old_txt == 249) {
            new_txt = tab[String.fromCharCode(txt.charCodeAt(i))];
            document.getElementById(id).value = txt.replace(String.fromCharCode(old_txt), new_txt);
        }

    }
}

//Charger lettre Arabe Français

function changer_lettre_fr(id) {
    var tab = new Array;
    tab["ض"] = "A";
    tab["ص"] = "Z";
    tab["ث"] = "E";
    tab["ق"] = "R";
    tab["ف"] = "T";
    tab["غ"] = "Y";
    tab["ع"] = "U";
    tab["ه"] = "I";
    tab["خ"] = "O";
    tab["ح"] = "P";
    tab["ش"] = "Q";
    tab["س"] = "S";
    tab["ي"] = "D";
    tab["ب"] = "F";
    tab["ل"] = "G";
    tab["ا"] = "H";
    tab["ت"] = "J";
    tab["ن"] = "K";
    tab["م"] = "L";
    tab["ك"] = "M";
    tab["ط"] = "ù";
    tab["ئ"] = "W";
    tab["ء"] = "X";
    tab["ؤ"] = "C";
    tab["ر"] = "V";
    tab["لا"] = "B";
    tab["ى"] = "N";
    tab["إ"] = "Y";
    tab["لإ"] = "T";
    tab["لأ"] = "G";
    tab["أ"] = "H";
    tab["ـ"] = "J";
    tab["لآ"] = "B";
    tab["آ"] = "N";
    tab["ض"] = "A";
    tab["ؤ"] = "C";
    tab["ي"] = "D";
    tab["ث"] = "E";
    tab["ب"] = "F";
    tab["ه"] = "I";
    tab["ت"] = "J";
    tab["ن"] = "K";
    tab["م"] = "L";
    tab["ك"] = "M";
    tab["خ"] = "O";
    tab["ح"] = "P";
    tab["ش"] = "Q";
    tab["ق"] = "R";
    tab["س"] = "S";
    tab["ع"] = "U";
    tab["ر"] = "V";
    tab["ئ"] = "W";
    tab["ء"] = "X";
    tab["ص"] = "Z";
	tab["د"] = "";
	tab["ذ"] = "";
	tab["ة"] = "";
	
	
	

    tab["'"] = "'";  
	tab["-"] = "-";
    tab["_"] = "_";
    tab[" "] = " ";

    var txt = document.getElementById(id).value;
    //alert(txt.charCodeAt(0));
	
	var elem= document.getElementById(id);
	//alert(elem);
//alert(elem);
window.onkeyup=function(even){ 

    if(even.key == 'AltGraph') {
      // alert('voila');
	   elem.value=elem.value+"@";
      
     // }
	}
}

    for (var i = 0; i < txt.length; i++) {
        txt = document.getElementById(id).value;
        old_txt = txt.charCodeAt(i);
		
        if (old_txt == 1601 || old_txt == 1602 || old_txt == 1603 || old_txt == 1604 || old_txt == 1605 || old_txt == 1606 || old_txt == 1607 || old_txt==1608 || old_txt == 1609 || old_txt == 1610
         || old_txt == 1590 || old_txt == 1591 || old_txt == 1592 || old_txt == 1593 || old_txt == 1594
       || old_txt==1580  || old_txt == 1581 || old_txt == 1582 ||old_txt==1583 || old_txt==1584 || old_txt == 1585 || old_txt == 1586 || old_txt == 1587 || old_txt == 1588 || old_txt == 1589
         || old_txt == 1572 || old_txt == 1574 || old_txt == 1575 || old_txt == 1576 || old_txt==1577 ||  old_txt == 1578 || old_txt == 1579
         || old_txt == 1569 
         || old_txt == 32 || old_txt == 39 || old_txt == 45 || old_txt == 95 && isNaN('old_txt')) {
            if (txt.charCodeAt(i) == 1575 && codePrec == 1604) {
                new_txt = "B";
                document.getElementById(id).value = txt.replace('Gا', new_txt);
            }
            else {
                new_txt = typeof (tab[String.fromCharCode(txt.charCodeAt(i))]) == 'undefined' ? '' : tab[String.fromCharCode(txt.charCodeAt(i))];
                document.getElementById(id).value = txt.replace(String.fromCharCode(old_txt), new_txt);
            }
            var codePrec = txt.charCodeAt(i);
        }
    }

}

/*window.onkeydown = function (e) {
  if (e.key === 'AltGraph') {
   // console.log(e.key);
alert($(id).val());
//alert(e.key);
  }
};*/
 function VerifMail()
{
	a = document.email.value;
	valide1 = false;
	for(var j=1;j<(a.length);j  ) {
		if(a.charAt(j)=='@') {
			if(j<(a.length-4)) {
				for(var k=j;k<(a.length-2);k  ) {
					if(a.charAt(k)=='.') valide1=true;
				}
			}
		}
	}
	
	if(valide1==false) { 
		alert("Veuillez saisir une adresse email valide.");
	return valide1;
	}

}

function onput(field){
$('#nom_specialite').addClass('keyboardInput');
	if(field.value==""){
		field.style.borderColor="#f00";
		 }
		else{
			 if(field.value.length>=2){
			field.style.borderColor="#090";
			var ok=  field.id+'1';
		  document.getElementById(ok).style.visibility='visible';	
			document.getElementById(ok).style.color='#090';
			
			var remove=  field.id+'2';
		  document.getElementById(remove).style.visibility='hidden';	
		
	
			 }
			 
			 else{
				 field.style.borderColor="#f00";
			var ok=  field.id+'1';
		  document.getElementById(ok).style.visibility='hidden';	
				
			var remove=  field.id+'2';
		  document.getElementById(remove).style.visibility='visible';
				document.getElementById(remove).style.color='#f00'; 
			 }
		 }
	}
	
	
	
	
	
	
jQuery(document).ready(function() {
	$(function() {
	 $('.n_telephone').mask('(00) 0-00-00-00');
	});
    /*
	
	
        Fullscreen background
    */
	 

        
$(window).load(function() {
   //   alert("window load occurred!");
  // $('.registration-form input').attr("required",'true');
 // $('#marie1').prop('checked',true);
	  	 $('.registration-form .n_peiece_sv').attr("required",'true');
	 $('.registration-form .date_delive_piece_sv').attr("required",'true');
	
	 if($('#sexef').is(':checked')){
		$('#div_service').hide();
	 }
	 if($('#marie1').is(':checked')){
		$('#nbr_enfant').prop('readonly',true);
	 }
	 
	  if($('#major1').is(':checked')){
		$('#divmaj').show();
		

	 }
	   if($('#option3').is(':checked')){
		$('#date_sourci').show();
		$('#date_sourci').val('11/11/1111');
	 }
	 
	  if($('#option3').is(':checked')==false){
		$('#date_sourci').hide();
		//$('#date_sourci').removeAttr('required');
		$('#date_sourci').val('11/11/1111');
	 }
});
//end windows load

$('#major1').on('click', function() {	
   $('#divmaj').show();
    
});
$('#major0').on('click', function() {		
			$('#mention_diplome').val('');
		$('#anne_major').val('');
		$('#n_piece_major').val('');
			$('#date_piece_major').val('');
			$('#de').val('');
			
			$('#mention_diplome').css('border-color', function(){	 
			return '#ccc';	});
			$('#de').css('border-color', function(){	 
			return '#ccc';	});
			$('#anne_major').css('border-color', function(){	 
			return '#ccc';});
			$('#n_piece_major').css('border-color', function(){	 
			return '#ccc';});
			$('#date_piece_major').css('border-color', function(){	 
			return '#ccc';});
			
				$('#mention_diplome1').css('visibility', 'hidden');
						$('#de1').css('visibility', 'hidden');
		$('#anne_major1').css('visibility', 'hidden');
		$('#n_piece_major1').css('visibility', 'hidden');
			$('#date_piece_major1').css('visibility', 'hidden');
			
				$('#mention_diplome2').css('visibility', 'hidden');
						$('#de2').css('visibility', 'hidden');
		$('#anne_major2').css('visibility', 'hidden');
		$('#n_piece_major2').css('visibility', 'hidden');
			$('#date_piece_major2').css('visibility', 'hidden');
			
			  $('#divmaj').hide();	
 
});


	$('#sexef').on('click', function() {	
   $('#div_service').hide();
    
});

$('#option3').on('click', function(){
$('#date_sourci').show();	
	

});
$('#option4').on('click', function(){
$('#date_sourci').hide();	

});
$('#option2').on('click', function(){
$('#date_sourci').hide();	

});
$('#option1').on('click', function(){
$('#date_sourci').hide();	

});
	$('#sexeh').on('click', function() {		
    $('#div_service').show();
    
});


$('#marie1').on('click', function() {		
$('#nbr_enfant').prop('readonly',true);
    $('#nbr_enfant').val('0'); 
});
$('#marie2').on('click', function() {		
$('#nbr_enfant').prop('readonly',false);
  
});


   
    
    $('#top-navbar-1').on('shown.bs.collapse', function(){
    	$.backstretch("resize");
    });
    $('#top-navbar-1').on('hidden.bs.collapse', function(){
    	$.backstretch("resize");
    });
    
    /*
        Form
    */
    $('.registration-form fieldset:first-child').fadeIn('slow');
    
    $('.registration-form select').on('click', function() {
    	$(this).removeClass('input-error');
	
    });
	
	//changer le span on input
	  var parent_fieldset = $(this).parents('fieldset');
    
	
	
	$('input[type=text], input[type=password],  input[type=date],   textarea, select').on('input', function() {
		
		 if($(this).val()==""){
		 $(this).addClass('input-error');
		 }
		 else{
			 if($(this).val().length>=2 ){
				 
			$(this).css('border-color', function(){	 
			return '#090';
			
			});
			var ok= '#'+ $(this).attr('id')+'1';
			$(ok).css('visibility', 'visible');
			$(ok).css('color','#090');
			
			var remove= '#'+ $(this).attr('id')+'2';
			$(remove).css('visibility', 'hidden');
	
			//alert (div);
			//$('#'+div).html(' <span  class="glyphicon glyphicon-ok form-control-feedback" >');
			
			 }
			 else{
				$(this).css('border-color', function(){	 
			return '#f00';
			}); 
			var remove= '#'+ $(this).attr('id')+'2';
			$(remove).css('visibility', 'visible');
			$(remove).css('color','#f00');
			
			var ok= '#'+ $(this).attr('id')+'1';
			$(ok).css('visibility', 'hidden');
    	$(this).addClass('input-error');
			 }
		 }
    });
	
		$('input[type=email]').on('input', function() {
	 if($(this).attr("id") == "email"){
		state = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($(this).val());
		if(state==false){
			$(this).css('border-color', function(){	 
			return '#f00';
			}); 
			var remove= '#'+ $(this).attr('id')+'2';
			$(remove).css('visibility', 'visible');
			$(remove).css('color','#f00');
			//	alert($(remove).attr('id'));
			
			var ok= '#'+ $(this).attr('id')+'1';
			$(ok).css('visibility', 'hidden');
    	$(this).addClass('input-error');
			next_step = false;
			$(this).addClass('input-error');
				$(this).attr("required", "true");
		}
		else{
		$(this).css('border-color', function(){	 
			return '#090';
			
			});
			var ok= '#'+ $(this).attr('id')+'1';
			$(ok).css('visibility', 'visible');
			$(ok).css('color','#090');
			
			var remove= '#'+ $(this).attr('id')+'2';
			$(remove).css('visibility', 'hidden');	
		}
		
				}
				else{
			$(this).css('border-color', function(){	 
			return '#090';
			
			});
			var ok= '#'+ $(this).attr('id')+'1';
			$(ok).css('visibility', 'visible');
			$(ok).css('color','#090');
			
			var remove= '#'+ $(this).attr('id')+'2';
			$(remove).css('visibility', 'hidden');
				}
			//alert (div);
			//$('#'+div).html(' <span  class="glyphicon glyphicon-ok form-control-feedback" >');
			
});
		
			 
			 
	
	
		$('input[type=number]').on('input', function() {
		
		 if($(this).val()==""){
		 $(this).addClass('input-error');
		  $(this).css('border-color', function(){	 
			   return '#f00';
			}); 
		     var remove= '#'+ $(this).attr('id')+'2';
			$(remove).css('visibility', 'visible');
			 $(remove).css('color','#f00');
			
			 var ok= '#'+ $(this).attr('id')+'1';
			$(ok).css('visibility', 'hidden');
    		$(this).addClass('input-error');
		 }
		 else{
			 
			 
			 
			 
			
			 
			 
			 
			 
			 if($(this).attr('id')=='n_telephone' & ($(this).val().length==9 || $(this).val().length==10)){
				                $(this).css('border-color', function(){	 
			                     return '#090';
			
			                         });
			                     var ok= '#'+ $(this).attr('id')+'1';
			                     $(ok).css('visibility', 'visible');
			                     $(ok).css('color','#090');
			
			                      var remove= '#'+ $(this).attr('id')+'2';
			                      $(remove).css('visibility', 'hidden'); 
			                      }
			                      else{
			                       if($(this).val().length>=1 & $(this).attr('id')!='n_telephone'){
			                                 $(this).css('border-color', function(){	 
			                                 return '#090';
			
			                                      });
			                                  var ok= '#'+ $(this).attr('id')+'1';
			                                  $(ok).css('visibility', 'visible');
			                                  $(ok).css('color','#090');
			
			                                  var remove= '#'+ $(this).attr('id')+'2';
			                                  $(remove).css('visibility', 'hidden');
                                              }
											  else{
												 $(this).addClass('input-error');
		  $(this).css('border-color', function(){	 
			   return '#f00';
			}); 
		     var remove= '#'+ $(this).attr('id')+'2';
			$(remove).css('visibility', 'visible');
			 $(remove).css('color','#f00');
			
			 var ok= '#'+ $(this).attr('id')+'1';
			$(ok).css('visibility', 'hidden');
    		$(this).addClass('input-error');  
											  }
			                                   
			 }
		 }
    });
	
	
	
	
	
	
	 
	 $('.registration-form .btn-forget').on('click', function() {
	
    var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
		
		parent_fieldset.find('input, textarea,select').each(function() {
        $(this).prop("required",false);
		$(this).val('');	
		$(this).removeClass('input-error');
		$(this).css('border-color', function(){	 
			return '#ccc';
			
			});
		
			var ok= '#'+ $(this).attr('id')+'1';
			$(ok).css('visibility', 'hidden');
		
			var remove= '#'+ $(this).attr('id')+'2';
			$(remove).css('visibility', 'hidden');
			
		if($(this).is(':required')){
			next_step = false;
		}	
		});	
    	if( next_step ) {
			
    		parent_fieldset.fadeOut(400, function() {			
	    		$(this).next().fadeIn();
				 $("html, body").animate({scrollTop: 0},"slow");
	    	});
    	}	
    });
	 
	
    
    // next step
    $('.registration-form .btn-next').on('click', function() {
    	var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
    	parent_fieldset.find('input, textarea,select').each(function() {
    	
    			
				
				 if($(this).val().length>=1){
			$(this).css('border-color', function(){	 
			return '#090';
			
			});
			var ok= '#'+ $(this).attr('id')+'1';
			$(ok).css('visibility', 'visible');
			$(ok).css('color','#090');
			
			var remove= '#'+ $(this).attr('id')+'2';
			$(remove).css('visibility', 'hidden');
		
			//alert (div);
			//$('#'+div).html(' <span  class="glyphicon glyphicon-ok form-control-feedback" >');
			
			 }
			 else{
				$(this).css('border-color', function(){	 
			return '#f00';
			}); 
			var remove= '#'+ $(this).attr('id')+'2';
			$(remove).css('visibility', 'visible');
			$(remove).css('color','#f00');
			//	alert($(remove).attr('id'));
			
			var ok= '#'+ $(this).attr('id')+'1';
			$(ok).css('visibility', 'hidden');
    	$(this).addClass('input-error');
			next_step = false;
			$(this).addClass('input-error');
				$(this).attr("required", "true");
				
			 }
    		  		
    	});
    	
    	if( next_step ) {
    		parent_fieldset.fadeOut(400, function() {
	    		$(this).next().fadeIn();
				 $("html, body").animate({scrollTop: 0},"slow");
	    	});
    	}
    	
    });
	
	
	//nextstep 01
	  $('.registration-form .btn-next_etap1').on('click', function() {
		
    	var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
    	
    	parent_fieldset.find('input, textarea,select').each(function() {
    	if($('#sexef').is(':checked') &&($(this).attr("id") == "n_peiece_sv" || $(this).attr("id") == "date_delive_piece_sv"|| $(this).attr("id") == "date_fin_source_sv" ))  {
    			
				
				$(this).removeAttr('required');
    			$(this).removeClass('input-error');
				
    		}
    		else
			//***************
			if($('#option3').is(':checked')==false && $(this).attr("id") == "date_fin_source_sv" ){
			$(this).removeAttr('required');
    			$(this).removeClass('input-error');	
				$('#date_fin_source_sv').val('');
			}
			else
			//********************
			 if($(this).val().length>=1){
				if($(this).attr("id") == "email"){
		state = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($(this).val());
		if(state==false){
			$(this).css('border-color', function(){	 
			return '#f00';
			}); 
			var remove= '#'+ $(this).attr('id')+'2';
			$(remove).css('visibility', 'visible');
			$(remove).css('color','#f00');
			//	alert($(remove).attr('id'));
			
			var ok= '#'+ $(this).attr('id')+'1';
			$(ok).css('visibility', 'hidden');
    	$(this).addClass('input-error');
			next_step = false;
			$(this).addClass('input-error');
				$(this).attr("required", "true");
		}
		else{
		$(this).css('border-color', function(){	 
			return '#090';
			
			});
			var ok= '#'+ $(this).attr('id')+'1';
			$(ok).css('visibility', 'visible');
			$(ok).css('color','#090');
			
			var remove= '#'+ $(this).attr('id')+'2';
			$(remove).css('visibility', 'hidden');	
		}
		
				}
				else{
			$(this).css('border-color', function(){	 
			return '#090';
			
			});
			var ok= '#'+ $(this).attr('id')+'1';
			$(ok).css('visibility', 'visible');
			$(ok).css('color','#090');
			
			var remove= '#'+ $(this).attr('id')+'2';
			$(remove).css('visibility', 'hidden');
				}
			//alert (div);
			//$('#'+div).html(' <span  class="glyphicon glyphicon-ok form-control-feedback" >');
			
			 }
			 else{
				 
				$(this).css('border-color', function(){	 
			return '#f00';
			}); 
			var remove= '#'+ $(this).attr('id')+'2';
			$(remove).css('visibility', 'visible');
			$(remove).css('color','#f00');
			//	alert($(remove).attr('id'));
			
			var ok= '#'+ $(this).attr('id')+'1';
			$(ok).css('visibility', 'hidden');
    	$(this).addClass('input-error');
			next_step = false;
			$(this).addClass('input-error');
				$(this).attr("required", "true");
				
			 }
    		  		
    	});
    	
    	if( next_step ) {
    		parent_fieldset.fadeOut(400, function() {
				
				$(this).next().fadeIn();
				 $("html, body").animate({scrollTop: 0},"slow");
	    	});
		
    	}
    	
    });
	
	//nextstep 03
	  $('.registration-form .btn-next_etap3').on('click', function() {
    	var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
    	
    	parent_fieldset.find('input, textarea,select').each(function() {
    	if($('#major0').is(':checked') &&($(this).attr("id") == "mention_diplome" || $(this).attr("id") == "anne_major" || $(this).attr("id") == "de" ||$(this).attr("id") == "n_piece_major" || $(this).attr("id") == "date_piece_major"))  {
    			
				
				$(this).removeAttr('required');
    			$(this).removeClass('input-error');
    		}
    		else if($(this).val()==""){
			$(this).addClass('input-error');
				$(this).attr('required','true');
    			next_step = false;	
				
    		}
			else{
			$(this).removeClass('input-error');	
			}
    	});
    	
    	if( next_step ) {
    		parent_fieldset.fadeOut(400, function() {
				
				$(this).next().fadeIn();
				 $("html, body").animate({scrollTop: 0},"slow");
	    	});
		
    	}
    	
    });
	
    
    // previous   step 
    $('.registration-form .btn-previous').on('click', function() {
		
    	$(this).parents('fieldset').fadeOut(400, function() {
    		$(this).prev().fadeIn();
			 $("html, body").animate({scrollTop: 0},"slow");
    	});
    });
	
	
	// forget step
    
	//btn envoi
	    // next evoi
  $('.registration-form .btn-envoi').on('click', function() {
    	var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
    	
    	parent_fieldset.find('input, textarea,select').each(function() {
    		if( $(this).val() == "") {
				
    			$(this).addClass('input-error');
			
    			next_step = false;
					
    		}
			
    		else {
				if($('#pasword_valid').val()!=$('#pasword').val()){
					next_step = false;
					}
					else{
    			$(this).removeClass('input-error');
				
					
					}
    		}
    	});
    	
    	
    	
    });
	
    
    // submit
/* $('.registration-form .btn_envoi').on('submit', function(e) {
    	
    	$(this).find('input, textarea,select').each(function() {
    		if($(this).attr() == "required") {
    			//e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
				$(this).prop('required','false');
    		}
    	});
    	
    });*/
    
    
});
// diplome on plus
 $(document).ready(function(){

      var i=$('#tab_logic tr').length-3;
     $("#add_row").click(function(){
		 
      $('#addr'+i).html("<td><div class='input-group'><input name='nature_diplome_f"+i+"'id='nature_diplome_f"+i+"' type='text' class='form-control' oninput=\"changer_lettre(this.id);onput(this);\" /><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;'  id='nature_diplome_f"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;' id='nature_diplome_f"+i+"2'></span> </div></td> <td><div class='input-group'><input name='filiere_f"+i+"'id='filiere_f"+i+"' type='text' class='form-control '  oninput='onput(this)' /> <span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;'  id='filiere_f"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;' id='filiere_f"+i+"2'></span></div></td><td><div class='input-group'><input  name='specialite_f"+i+"'id='specialite_f"+i+"' type='text'  class='form-control input-md'  oninput='onput(this)' ><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;'  id='specialite_f"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;' id='specialite_f"+i+"2'></span></div></td><td><div class='input-group'><input  name='etablissement_f"+i+"' id='etablissement_f"+i+"' type='text'   class='form-control input-md' oninput='onput(this)'><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;'  id='etablissement_f"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;' id='etablissement_f"+i+"2'></span></div></td><td><div class='input-group'><input  name='numero_diplome_f"+i+"'id='numero_diplome_f"+i+"' type='number'   class='form-control input-md' oninput='onput(this)'><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;'  id='numero_diplome_f"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;' id='numero_diplome_f"+i+"2'></span></div></td><td><div class='input-group'><input  name='date_diplome_f"+i+"'id='date_diplome_f"+i+"' type='date'   class='form-control input-md' oninput='onput(this)'><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;width:100%;text-align:right;right:15px''  id='date_diplome_f"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;width:100%;text-align:right;right:15px' id='date_diplome_f"+i+"2'></span></div></td><td><div class='input-group'><input  name='date_f_de"+i+"'id='date_f_de"+i+"' min='1970' type='number'   class='form-control input-md' oninput='onput(this)'><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;'  id='date_f_de"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;' id='date_f_de"+i+"2'></span></div></td><td><div class='input-group'><input min='1971' name='date_f_jusqua"+i+"'id='date_f_jusqua"+i+"' type='number'   class='form-control input-md' oninput='onput(this)'><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;'  id='date_f_jusqua"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;' id='date_f_jusqua"+i+"2'></span></div></td><td><div class='input-group'><input  name='date_doctor"+i+"'id='date_doctor"+i+"' type='date'   class='form-control input-md' oninput='onput(this)'><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;width:100%;text-align:right;right:15px''  id='date_doctor"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;width:100%;text-align:right;right:15px'' id='date_doctor"+i+"2'></span></div></td> ");
//<textarea id="area" name="nature_diplome_f"  ></textarea>
   
	   $('#tab_logic').append('<tr id="addr'+($('#tab_logic tr').length-2)+'"></tr>');
      i++; 

  });
     $("#delete_row").click(function(){
    	  if(i>1){
			  
 $('#myModal').modal({
        show: 'true'
    }); 
	 $('#deletnon').show();
   $('#langok').hide();
	  $('#supr_ln').show();
	    $("#deletoui2").hide();
	      $("#deletoui").show();
		     $("#deletoui1").hide();
	    $('#change_lag').hide();
		 }
	 });

	 $("#deletoui").click(function(){
		 	 if(i>1){
	 $("#addr"+(i-1)).remove();
	
		 i--;	
			 }
	 });

});

// traveux on plus
 $(document).ready(function(){
      var i=$("#tab_logic1 tr").length-3;
     $("#add_row1").click(function(){
      $('#trave'+i).html("<td> <div class='input-group'><input name='nature_travail"+i+"' id='nature_travail"+i+"' type='text' class='form-control' oninput='onput(this)'/><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;'  id='nature_travail"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;' id='nature_travail"+i+"2'></span></div> </td> <td><div class='input-group'><input name='date_publication"+i+"'id='date_publication"+i+"' type='date' class='form-control ' oninput='onput(this)' /><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;width:100%;text-align:right;right:15px'  id='date_publication"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;width:100%;text-align:right;right:15px' id='date_publication"+i+"2'></span></div> </td><td><div class='input-group'><input  name='nom_journal_publication"+i+"'id='nom_journal_publication"+i+"' type='text'  class='form-control input-md' oninput='onput(this)'><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;'  id='nom_journal_publication"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;' id='nom_journal_publication"+i+"2'></span></div></td><td><div class='input-group'><input  name='numero_journal_publication"+i+"'id='numero_journal_publication"+i+"' type='number'   class='form-control input-md' oninput='onput(this)'><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;'  id='numero_journal_publication"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;' id='numero_journal_publication"+i+"2'></span></div></td><td><div class='input-group'><input  name='date_journal_publication"+i+"' id='date_journal_publication"+i+"' type='date'   class='form-control input-md'oninput='onput(this)'><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;width:100%;text-align:right;right:15px'  id='date_journal_publication"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;width:100%;text-align:right;right:15px' id='date_journal_publication"+i+"2'></span></div></td> ");
//<textarea id="area" name="nature_diplome_f"  ></textarea>
      $('#tab_logic1').append('<tr id="trave'+($('#tab_logic1 tr').length-2)+'"></tr>');
      i++; 

  });
     $("#delete_row1").click(function(){
    	 if(i>1){
			
			  $('#myModal').modal({
        show: 'true'
    }); 
	  $('#deletnon').show();
	   $('#langok').hide();
	  $('#supr_ln').show();
	    $("#deletoui2").hide();
	      $("#deletoui").hide();
		     $("#deletoui1").show();
	    $('#change_lag').hide();
		 }
	 });
	
	  $("#deletoui1").click(function(){
		    if(i>1 ){
	 $("#trave"+(i-1)).remove();
		 i--;	
			}
		 });

});

// experiance on plus
 $(document).ready(function(){
      var i=$('#tab_logic2 tr').length-3;
     $("#add_row2").click(function(){
      $('#exper'+i).html("<td><div class='input-group'><input name='etablis_experiance"+i+"' id='etablis_experiance"+i+"' type='text' class='form-control' oninput='onput(this)' /> <span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;'  id='etablis_experiance"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;' id='etablis_experiance"+i+"2'></span></div></td> <td><div class='input-group'><input name='grade_experiance"+i+"'id='grade_experiance"+i+"' type='text' class='form-control '  oninput='onput(this)'/><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;'  id='grade_experiance"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;' id='grade_experiance"+i+"2'></span> </div></td><td><div class='input-group'><input  name='date_experiance_de"+i+"'id='date_experiance_de"+i+"' type='date' oninput='onput(this)' class='form-control input-md' ><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;width:100%;text-align:right;right:15px'  id='date_experiance_de"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;width:100%;text-align:right;right:15px' id='date_experiance_de"+i+"2'></span></div></td><td><div class='input-group'><input  name='date_experiance_jusqua"+i+"'id='date_experiance_jusqua"+i+"' type='date' oninput='onput(this)' class='form-control input-md'><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;width:100%;text-align:right;right:15px'  id='date_experiance_jusqua"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;width:100%;text-align:right;right:15px' id='date_experiance_jusqua"+i+"2'></span></div></td><td><div class='input-group'><input  name='numero_attestation"+i+"'id='numero_attestation"+i+"' type='number' oninput='onput(this)'  class='form-control input-md' oninput='onput(this)'><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;'  id='numero_attestation"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;' id='numero_attestation"+i+"2'></span></div></td><td><div class='input-group'><input  name='date_attestation"+i+"'id='date_attestation"+i+"' type='date' oninput='onput(this)'  class='form-control  input-md' ><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;width:100%;text-align:right;right:15px'  id='date_attestation"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;width:100%;text-align:right;right:15px' id='date_attestation"+i+"2'></span></div></td> <td><div class='input-group'><input  name='cause_fin_relation"+i+"'id='cause_fin_relation"+i+"' type='text'   class='form-control input-md' oninput='onput(this)'><span  class='glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left' style='visibility:hidden;'  id='cause_fin_relation"+i+"1'></span> <span class='glyphicon glyphicon-remove form-control-feedback' style='visibility:hidden;' id='cause_fin_relation"+i+"2'></span></div></td>");
//<textarea id="area" name="nature_diplome_f"  ></textarea>
      $('#tab_logic2').append('<tr id="exper'+($('#tab_logic2 tr').length-2)+'"></tr>');
      i++; 
  });
     $("#delete_row2").click(function(){
    	 if(i>1){
			
 $('#myModal').modal({
        show: 'true'
    }); 
	 $('#deletnon').show();
	   $('#langok').hide();
	  $('#supr_ln').show();
	   $("#deletoui2").show();
	      $("#deletoui").hide();
		     $("#deletoui1").hide();
	    $('#change_lag').hide();
		 }
	 });	 
	  
	 $("#deletoui2").click(function(){
		 	 if(i>1 ){
	 $("#exper"+(i-1)).remove();
		 i--;	
			 }
	 });
});

//radion button


$('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})


    