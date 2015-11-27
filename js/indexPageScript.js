$( document ).ready(function( $ ) {
    $( "#SignUpbtn" ).click(function() {
        $( "#loginSection" ).css("visibility",'hidden');
		$( "#signup" ).css("visibility",'visible');
    });
    $( "#SignUpFormCancelbtn" ).click(function() {
        $( "#loginSection" ).css("visibility",'visible');
		$( "#signup" ).css("visibility",'hidden');
    });  	
});