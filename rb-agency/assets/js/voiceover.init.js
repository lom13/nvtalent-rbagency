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
	    	console.log('play');
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
		
		//Reset all
		jQuery('#profile-list li.playbutton').each(function() {
			var mp3type = jQuery(this).attr('mp3_type2');
			// show Commercial only by default
			if (jQuery(this).hide()) {
				jQuery(this).show();
			}
		});

		// Upon clicking category tab, it will only show those mp3 with the same category
		jQuery('#profile-list li.playbutton').each(function() {
			var mp3type = jQuery(this).attr('mp3_type2');
			// show Commercial only by default
			if (mp3type != classDisplay) {
				jQuery(this).hide();
			}
		});

		// Hide multiple mp3s
		jQuery(document).ready(function() {
			jQuery('.playhamburger').each(function() {
			    var mp3type = jQuery(this).attr('mp3_type2');
			    if(classDisplay != mp3type){
			        jQuery(this).hide()
			    }

			});
		});

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
				// $('.profile-voiceover ul.links li:NOT(.site_link)').hide();
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
			// jQuery('.profile-voiceover li.site_link.hover-audio').hide();
		}
		
		// $("div.vertical-col:empty").remove();
		var prof_elem = $('.vertical-col .rbprofile-list');
		// if(prof_elem.parent().is('div.vertical-col')) {
			prof_elem.unwrap();
		// } else {

		// }

	 	var visibledivs = $('.voiceover > .rbprofile-list:visible');

	 	var text = visibledivs.find(".name").text().split(' ');
		var last = text.pop();
		// console.log(last);

		var sorteddivs = $('.voiceover > .rbprofile-list:visible').sortElements(function(a, b){
		    return $(a).find(".name").text().split(' ').pop() > $(b).find(".name").text().split(' ').pop() ? 1 : -1;
		});

		var totaldiv = visibledivs.length;
		// console.log(totaldiv);
		if(totaldiv > 1){
			var profiles_per_col = totaldiv / 4;
			var profiles_per_col_round = Math.round(profiles_per_col);
			var profiles_per_col_plus = Math.round(profiles_per_col) + 1;
			var pwake = String(profiles_per_col);
			var pwake_index = pwake.indexOf(".");
			var pwake_length = pwake.length;
			var pwake_pwake = pwake.substr(pwake_index,pwake_length);
			// var pwake = profiles_per_col.substr();
			// profiles_per_col = Math.round(profiles_per_col);
			// console.log("total "+totaldiv);
			// console.log("percol "+profiles_per_col);
			// console.log("pwake index "+pwake.indexOf("."));
			// console.log("pwake length "+pwake.length);
			// console.log("pwake "+pwake.substr(pwake_index,pwake_length));
			

			var ctr = 0;
			for(var i = 0; i < visibledivs.length; i+=profiles_per_col) {

				if(totaldiv % 4 !== 0){
					if(pwake_pwake == ".25" && ctr == 0){
						profiles_per_col = profiles_per_col_plus;
						// console.log("hahaha");
					} else {
						profiles_per_col = profiles_per_col_round;	
					}
					// if( profiles_per_col > 4){
						// profiles_per_col = profiles_per_col_plus;
					// } else {
					// 	profiles_per_col = profiles_per_col_round;
					// }					
				} else {
					profiles_per_col = profiles_per_col_round;
				}

				if(totaldiv == 6) {
					profiles_per_col = profiles_per_col_round;
					if(i<4) {
						sorteddivs.slice(i, i+profiles_per_col).wrapAll('<div class="vertical-col"></div>');
					} else {
						sorteddivs.slice(i, i+1).wrapAll('<div class="vertical-col"></div>');
					}
				} else {					
					sorteddivs.slice(i, i+profiles_per_col).wrapAll('<div class="vertical-col"></div>');
				}
				ctr++;
				// console.log("i "+i);
			}
		} 

		return false;
	});
	
	
	
	
	var mediaTypeActive = [];
	$('.rbprofile-list[data-profileid]').each(function() {
		var data = $(this).attr('mp3_type');
		var array_data = data.split(' ');
		// console.log('This one two: '+data);
		/* $.each( array_data, function( key, value ){
            
		}); */
        $.merge(mediaTypeActive, array_data);
		//console.log($(this).attr('mp3_type'));
		
		//
	});	
	$.merge(mediaTypeActive, ['all']);
	var onlymediaShow= mediaTypeActive.unique();

	// console.log(onlymediaShow);

	//hide some media tab if not in all profiles listed Or categories
	$('.media-categories-link2 li a').each(function() {
		var mediaID = $(this).attr('media-cate-id');
		// console.log("MediaID: "+mediaID);
		// console.log(jQuery.inArray(mediaID, onlymediaShow) == -1);
		if(jQuery.inArray(mediaID, onlymediaShow) == -1){
			$(this).parent().hide();
		}
	});
	
	//default All - hu kers if on=bject exist or not.. jquery can handle it.
	$("ul.media-categories-link li a[media-cate-id='all']").addClass("active");
	//$("ul.media-categories-link2 li a[media-cate-id='all']").addClass("active");
	
	// By loading the page. It will remove all mp3 if not Commercial mp3
	jQuery('#profile-list li.playbutton').each(function() {
		var mp3type = jQuery(this).attr('mp3_type2');
		// show Commercial only by default
		if (mp3type != "custom_mp3_1") {
			jQuery(this).hide();
		}
	});

	jQuery(document).ready(function() {
		jQuery('.playhamburger').each(function() {
			console.log('mp3typedsa:');
		    var mp3type = jQuery(this).attr('mp3_type2');
		    console.log(mp3type != 'custom_mp3_1');
		    if("custom_mp3_1" != mp3type){
		        jQuery(this).hide()
		    }

		});
	});
	

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
  
  
  
  
  /**
 * jQuery.fn.sortElements
 * --------------
 * @param Function comparator:
 *   Exactly the same behaviour as [1,2,3].sort(comparator)
 *   
 * @param Function getSortable
 *   A function that should return the element that is
 *   to be sorted. The comparator will run on the
 *   current collection, but you may want the actual
 *   resulting sort to occur on a parent or another
 *   associated element.
 *   
 *   E.g. $('td').sortElements(comparator, function(){
 *      return this.parentNode; 
 *   })
 *   
 *   The <td>'s parent (<tr>) will be sorted instead
 *   of the <td> itself.
 */
jQuery.fn.sortElements = (function(){
 
    var sort = [].sort;
 
    return function(comparator, getSortable) {
 
        getSortable = getSortable || function(){return this;};
 
        var placements = this.map(function(){
 
            var sortElement = getSortable.call(this),
                parentNode = sortElement.parentNode,
 
                // Since the element itself will change position, we have
                // to have some way of storing its original position in
                // the DOM. The easiest way is to have a 'flag' node:
                nextSibling = parentNode.insertBefore(
                    document.createTextNode(''),
                    sortElement.nextSibling
                );
 
            return function() {
 
                if (parentNode === this) {
                    throw new Error(
                        "You can't sort elements if any one is a descendant of another."
                    );
                }
 
                // Insert before flag:
                parentNode.insertBefore(this, nextSibling);
                // Remove flag:
                parentNode.removeChild(nextSibling);
 
            };
 
        });
 
        return sort.call(this, comparator).each(function(i){
            placements[i].call(getSortable.call(this));
        });
 
    };
 
})();