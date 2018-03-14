$(function(){
	
	/*
	$("#tabAgenda").click(function(){
		$("#refreshClandar").click();
	});
	*/
	

	
		
	
	
});

function upContent(url) {
	var loading = '<div style="margin:auto;width:100px" id="loadingFormula"><img src="img/standard/loaders/loading32.gif" /></div>';
	if($("#divAgenda").html() == ''){
		//$("#divAgenda").html(loading);
	}
	$("table.calendar").html(loading); 
	$.ajaxQ.abortAll();
	$.ajax({
		type: 'GET',
		url: url,
		beforeSend: function(){					
			$("#wrapper_body").css({'opacity':'0.2'});
			$(".pagetitle").append('<div id="contentLoader"></div>');
		},
		success: function(msg){
			console.log(msg);
			$("#divAgenda").html(msg);
			//statusEstimateCheck();
		}
	}); 
}

$.ajaxQ = (function(){
  var id = 0, Q = {};

  $(document).ajaxSend(function(e, jqx){
    jqx._id = ++id;
    Q[jqx._id] = jqx;
  });
  $(document).ajaxComplete(function(e, jqx){
    delete Q[jqx._id];
  });

  return {
    abortAll: function(){
      var r = [];
      $.each(Q, function(i, jqx){
        r.push(jqx._id);
        jqx.abort();
      });
      return r;
    }
  };

})();

function sortEstimate(a,b){
	if(!b.length > 0){
		return false;
	}
	var indexa = setIndexEstimate(a);
	var indexb = setIndexEstimate(b);
	var calcDef = indexa - indexb;
	if (calcDef > 0) return true;
	else return false;
}

function setIndexEstimate(a)
{	
	if(a.hasClass("white-gradient")){
		return 0;
	}
	if(a.hasClass("red-gradient")){ 
		return 1;
	}
	if(a.hasClass("orange-gradient")){
		return 2;
	}
	if(a.hasClass("green-gradient")){
		return 3;
	}
	if(a.hasClass("blue-gradient")){
		return 4;
	}
	return 0;
}