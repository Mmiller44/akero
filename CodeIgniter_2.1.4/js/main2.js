$(document).ready(function() {

	var login = false;
	var register = false;

    $('#login_link').click(function() {
    	if(login == false)
    	{
    		login = true;
    	}else{
    		login = false;
    	};

    	if(register == true){
    		register = false;
    		$('#register_form').slideToggle(300);
        	$(this).toggleClass('close');
    	};

        $('#login_form').slideToggle(300);
        $(this).toggleClass('close');
    });

    $('#register_link').click(function() {
    	if(register == false)
    	{
    		register = true;
    	}else{
    		register = false;
    	};

    	if(login == true){
    		login = false;
    		$('#login_form').slideToggle(300);
        	$(this).toggleClass('close');
    	};

        $('#register_form').slideToggle(300);
        $(this).toggleClass('close');
    });
}); // end ready