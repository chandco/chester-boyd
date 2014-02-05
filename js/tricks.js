// JavaScript Document

$(window).load(function() {
  $("body").removeClass("preload");
});


$(document).ready(function(e) {
    
	
	// add prev and next to any carousel 
	$("#homepage-panels").append("<span id='next'></span><span id='prev'></span>");
	
	$(document).on("click","span#next",function(e) {
		$("#homepage-panels").cycle('next');
	});
	
	$(document).on("click","span#prev",function(e) {
		$("#homepage-panels").cycle('prev');
	});
	
	
	
	// add GA tracking to mailtos
	/*
	onclick="_gaq.push(['_trackEvent', 'Outbound', 'Other', 'mailto:sales@itavenues.co.uk?subject=Web Enquiry&amp;body=Hi ITA*, can you help?']);"
	*/
	
	$("a[href*='mailto']").each(function() {
                    $(this).click(function (ev) {
                        var pageView = '/mailto/' + $(this).attr('href').substring(7);
                        _gat._getTrackerByName()._trackEvent('Mailto', pageView);
                    });
        });
});
	
	

