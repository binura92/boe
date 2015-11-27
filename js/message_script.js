$( document ).ready(function( $ ) {
	$( "#MsgIcon" ).click(function() {
  		$( "#MsgBox" ).animate({right:'-250'},800);
	});
	$( "#MsgInbox" ).click(function() {
  		$( "#MsgBox" ).animate({right:'0'},800);
	});
	$( "#MsgViewClose" ).click(function() {
  		$( "#MsgBox" ).animate({right:'-250'},800);
	});	
	$( "#InboxClose" ).click(function() {
  		$( "#MsgBox" ).animate({right:'-500'},800);
	});
	$( "#NewMsg" ).click(function() {
  		$( "#NewMessage" ).css("visibility",'visible')
	});
	$( "#MSGCancelButton" ).click(function() {
  		$( "#NewMessage" ).css("visibility",'hidden')
	});	
	$( "#MSGSendButton" ).click(function() {
  		$( "#NewMessage" ).css("visibility",'hidden')
	});					
});