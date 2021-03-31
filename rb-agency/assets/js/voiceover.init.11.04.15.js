jQuery(document).ready(function($) {

	var audioPlayerJS;
    audiojs.events.ready(function() {
        audioPlayerJS = audiojs.createAll();
    });
    
    //listener for audio
    function PlayPause(){
        $(".play-button").html('<i class="fa fa-play"></i>');
    }
    
	$(".mp3-link").on('click',function(){
		//data-profileid
	});
	
	//remove voice over link on name
	$('.profile-voiceover strong').each(function() {
		var profileName = $(".profile-voiceover strong a").html();
		$(this).html(profileName);
		
	});
	
	
	$(".site_link.hover-audio").hover(function() {
        $(this).find('ul').stop().slideDown();
    }, function() {
        $(this).find('ul').stop().slideUp();
	});

	$(".links").on('click','.play-button',function(){
		var audioPlayer = document.getElementById('voice-over-player');    
        var sourceUrl = $(this).attr("voicelink");
	    audioPlayer.pause();
	    
	    
	    
	    //check if pause or play
	    var audioContent = $(this).html();
	    if(audioContent == '<i class="fa fa-pause"></i>'){
	        console.log('request pause');
	        audioPlayerJS[0].pause();
	        PlayPause();
	    }else{
	    
		    audioPlayer.src = sourceUrl;
		    audioPlayer.load();//suspends and restores all audio element
		
		    //audio[0].play(); changed based on Sprachprofi's comment below
		    audioPlayer.oncanplaythrough = audioPlayer.play();
		    
	        //console.log('request to play');
	        audioPlayerJS[0].play();
	        
	        PlayPause();
		    $(this).html('<i class="fa fa-pause"></i>');
	        audioPlayer.addEventListener('ended', PlayPause, false);
	    }
	    
	    return false;
	});
	
	
	$("ul.media-categories-link li a").on('click',function(){
		//clear all spacer for multiple audio
		resethoverMedia();
		
		$("ul.media-categories-link li a").removeClass("active");
		$(this).addClass("active");
		var classDisplay = $(this).attr('media-cate-id');
		
		//trigger the media category select All
		$("ul.media-categories-link2 li a").removeClass("active");
		//$("ul.media-categories-link2 li a[media-cate-id='all']").addClass("active");
		
		
		//console.log(classDisplay);
		if(classDisplay == 'all'){
			$('.rbprofile-list[data-profileid]').show();
			//$('.profile-voiceover ul.links li').show();
		}else{
			$('.rbprofile-list[data-profileid]').hide();
			$('.rbprofile-list.'+classDisplay).show();
			$('.profile-voiceover ul.links li').show();
		}
		reset_media_noAll();
		
		
		return false;
	});
	
	function resethoverMedia(){
	
		jQuery('.profile-voiceover li.site_link.spacer-voice').html('');
		jQuery('.profile-voiceover li.site_link.hover-audio').show();
		jQuery('.profile-voiceover li.site_link.hover-audio i').show();
	}
	
	$("ul.media-categories-link2 li a").on('click',function(){
	
		var requestMediaCat = $("ul.media-categories-link li a[class='active']").attr('media-cate-id');
		if (requestMediaCat === undefined ){
			//trigger the main as all.. 
			$("ul.media-categories-link li a[media-cate-id='all']").addClass("active");
			requestMediaCat = 'all';
		}
		//console.log(requestMediaCat);
		
		$("ul.media-categories-link2 li a").removeClass("active");
		$(this).addClass("active");
		var classDisplay = $(this).attr('media-cate-id');
		
		
		
		//console.log(classDisplay);
		if(classDisplay == 'all'){
			if(requestMediaCat == 'all'){
				$('.rbprofile-list[data-profileid]').show();
				$('.profile-voiceover ul.links li').show();
			}else{
				$('.rbprofile-list.'+requestMediaCat).show();
				$('.rbprofile-list.'+requestMediaCat+' .profile-voiceover ul.links li').show();
			}
		}else{
		
			$('.rbprofile-list[data-profileid]').hide();
			
			if(requestMediaCat == 'all'){
				$('.rbprofile-list.'+classDisplay).show();
				$('.profile-voiceover ul.links li:NOT(.site_link)').hide();
				$('.profile-voiceover ul.links li.'+classDisplay).show();
			}else{
				$('.rbprofile-list.'+requestMediaCat+'.'+classDisplay).show();
				$('.rbprofile-list.'+requestMediaCat+'.'+classDisplay+' .profile-voiceover ul.links li:NOT(.site_link)').hide();
				$('.rbprofile-list.'+requestMediaCat+'.'+classDisplay+' .profile-voiceover ul.links li.'+classDisplay).show();
			}
		}
		
		
		
		resethoverMedia();
		//console.log(classDisplay);
		if(classDisplay != 'all'){
			jQuery('.profile-voiceover li.site_link.hover-audio ul > li[style="display: block;"],[style="display: inline-block;"]').each(function (i) {
			//jQuery('.profile-voiceover li.site_link.hover-audio ul > li:visible').each(function (i) {
				$(this).parent().parent().siblings('li.spacer-voice').append($(this).html());
				//console.log($(this).html());
			});
			jQuery('.profile-voiceover li.site_link.hover-audio').hide();
		}
		
		var prof_elem = $('.voiceover .vertical-col .rbprofile-list');
		if(prof_elem.parent().is('.vertical-col')) {
			prof_elem.unwrap();
		}

	/* 	var visibledivs = jQuery('.voiceover > .rbprofile-list:visible');
		var totaldiv = visibledivs.length;
		if(totaldiv > 1){
			var profiles_per_col = totaldiv / 4;
			profiles_per_col = Math.round(profiles_per_col);
			console.log(totaldiv);
			console.log(profiles_per_col);
			for(var i = 0; i < visibledivs.length; i+=profiles_per_col) {
				if(totaldiv == 6) {
					if(i<3) {
						visibledivs.slice(i, i+profiles_per_col).wrapAll('<div class="vertical-col"></div>');
					} else {
						visibledivs.wrapAll('<div class="vertical-col"></div>');
					}
				} else {
					visibledivs.slice(i, i+profiles_per_col).wrapAll('<div class="vertical-col"></div>');
				}				
			}
		} */

		return false;
	});
	
	
	
	
	var mediaTypeActive = [];
	$('.rbprofile-list[data-profileid]').each(function() {
		var data = $(this).attr('mp3_type');
		var array_data = data.split(' ');
		
		/* $.each( array_data, function( key, value ){
            
		}); */
        $.merge(mediaTypeActive, array_data);
		//console.log($(this).attr('mp3_type'));
		
		//
	});	
	$.merge(mediaTypeActive, ['all']);
	var onlymediaShow= mediaTypeActive.unique();
	//hide some media tab if not in all profiles listed
	$('.media-categories-link2 li a').each(function() {
		var mediaID = $(this).attr('media-cate-id');
		if(jQuery.inArray(mediaID, onlymediaShow) == -1){
			$(this).parent().hide();
		}
	});
	
	//default All - hu kers if on=bject exist or not.. jquery can handle it.
	$("ul.media-categories-link li a[media-cate-id='all']").addClass("active");
	//$("ul.media-categories-link2 li a[media-cate-id='all']").addClass("active");
	
	
	function reset_media_noAll(){
		
		//hide the All Media
		$("ul.media-categories-link2 li a[media-cate-id='all']").parent().hide();
		
		$('ul.media-categories-link2 li').each(function() {
			if($(this).is(':visible')){
				$('a',this).addClass("active");
				$('a',this).trigger("click");
				//console.log();
				return false;
			}
		});
	}
	
	reset_media_noAll();
	
	
});
Array.prototype.unique =
  function() {
    var a = [];
    var l = this.length;
    for(var i=0; i<l; i++) {
      for(var j=i+1; j<l; j++) {
        // If this[i] is found later in the array
        if (this[i] === this[j])
          j = ++i;
      }
      a.push(this[i]);
    }
    return a;
  };
  
  
  
  
  