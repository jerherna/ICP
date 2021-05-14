/*Common JS functions for Forms and Views
 * IBSI
 * */

/* TODO: TO retrieve the detail from the specified view in Maintenance db
 * @param: view- the name of the view in maintenance
 * @param: key - the first column in the view, should be categorized
 * @param: col - number, the column value to retrieve
 * @param: type - text/datetime/number depending on the type of value
 * @param: select - jquery select object where the list options will be populated
 * */
function getMaintLookup(view,key,col,type,select){

	var url = getRootPath() + 'hris-maintenance.nsf/'+view+'?Readviewentries&Count=-1&ExpandView&outputformat=JSON';

	if( key!="" )
		url += "&RestrictToCategory=" + key;
	else
		url += "&RestrictToCategory=x-x-x"; // dummy key, the objective is to retrieve none
	
	select.empty();
	select.append('<option value="" disabled selected>---</option>');
	
	$.getJSON(url, function(data){
	
		$.each(data['viewentry'], function(i, entry){
			var _value = entry['entrydata'][col][type][0];
			select.append('<option value="'+ _value + '">' + _value + '</option>');
			
		})
	
	})

}


function getPersonLookup(view,key,col,type,select){

	var url = getRootPath() + 'icpweb.nsf/'+view+'?Readviewentries&Count=-1&ExpandView&outputformat=JSON';

	if( key!="" )
		url += "&RestrictToCategory=" + key;
	else
		url += "&RestrictToCategory=x-x-x"; // dummy key, the objective is to retrieve none
	
	select.empty();
	select.append('<option value="" disabled selected>---</option>');
	
	$.getJSON(url, function(data){
	
		$.each(data['viewentry'], function(i, entry){
			var _value = entry['entrydata'][col][type][0];
			select.append('<option value="'+ _value + '">' + _value + '</option>');
			
		})
	
	})

}



/* TODO:
 * since the modal plugin has changed, this functions will cater for the existing codes that uses the showAlert function
 */
$(function(){
    $.extend({
        showAlert: function() {
    		var args = arguments[0] || {};
    		var modalWrapper = BootstrapModalWrapperFactory.createModal({
    			message: args.body,
    			title: args.title,
    			closable: true,
    			closeByBackdrop: false,
    			buttons: [
    			    {
    			        label: "Ok",
    			        cssClass: "btn btn-primary",
    			        action: function (button, buttonData, originalEvent) {
    			             return this.hide();
    			        }
    			    }
    			]
    		});
    		modalWrapper.show();
        }
    })
});


/*
 * TODO: 
 * $CommonAPI : common web functions will always call the (WebUtilities) agent from personnel information
 * e.g: @GetNotifications(), @DBLookup()
 * EDITED FOR ICP Web
 */
var $CommonAPI = getRootPath() + 'icpweb.nsf/webutilities?openagent';

( function($) {
	'use strict';

	// iOS web app full screen hacks.
	if (window.navigator.standalone == true) {
		// make all link remain in web app mode.
		$('a').click( function() {
			window.location = $(this).attr('href');
			return false;
		});
	};

	/*
	 * TODO: Custom Session Timeout
	 * default to 15 mins before session expire
	 * will auto logout session 10 sec after warning without any action
	 */
	jQuery.ajax({
	    type: "GET",
	    url: getRootPath() + 'icpweb.nsf/plugins/bootstrap-session-timeout/dist/bootstrap-session-timeout.js',
	    dataType: 'script',
	    cache: true,
	    success: function(){
			var root = getRootPath();
			$.sessionTimeout({
			    keepAliveUrl: '',
			    logoutUrl: root + 'icpweb.nsf?logout&redirectto=' + root + 'icpbweb.nsf/',
			    redirUrl: root + 'icpweb.nsf.nsf?logout&redirectto=' + root + 'icpweb.nsf.nsf/',
			    warnAfter: 900000,
			    redirAfter: 920000,
			    countdownBar: true,
			    countdownMessage: 'Logging out in {timer} seconds.'
			})
		}
	})
	
	
	/**
	 * TODO: Set navigation link active collapsed on page open
	 * Construct the Breadcrumbs
	 */
	$( function() {
		//debugger;
		var _temp = [];
		var _breadcrumbs = new Array('Home',$('.nav-lavel').text());
		var _u = $('#preview').attr('src') || window.sessionStorage.getItem('nextPage'); //document.location.href;
		
		if( _u!= undefined )
			_u = _u.toLowerCase();
		
		$('#main-menu-navigation .menu-item').each(function(i, a){
			//debugger;
			var _l = getUrlParameter('content',$(this).attr('href').toLowerCase());
			
			if (_l != "#" && _l != "" && _u.indexOf(_l) >-1 ){
				
				// clear default open, is-shown active
				$('#main-menu-navigation .menu-item')
					.removeClass('is-shown active open');
				
				$('#main-menu-navigation .nav-item')
					.removeClass('is-shown active open');
				
				
				$('.open')
					.removeClass('open');
				
				
				$(this).addClass('is-shown active');
				_temp.push($(this).text());
				
				var parent = $(this).parent();
				
				while(parent.length>0){
					
					$(parent).addClass('open');
					parent = parent.parent();
					
					if(parent.hasClass('navigation-main'))
						return false; // exit if parent is not in navigation menu
					
					if( parent.hasClass('has-sub'))
						_temp.push(  parent.children('a:first').text() ); 
					
				}
				
				//console.log($(this).parentsUntil('.nav-item.has-sub'));
				return false;
			}
			
		})
		
		for(var j=_temp.length-1; j>= 0;j--){
			_breadcrumbs.push(_temp[j]);
		}
		
		
		$('#page-header').text( _breadcrumbs.slice(-1)[0] );
		$('#page-title').text( _breadcrumbs[1] );
		
		$(_breadcrumbs).each(function(i, v){
			
			if( i==0 ){ // Home will always be in index 0
				$('.breadcrumb').append(
						'<li class="breadcrumb-item"><a href="'+ $personInfoPath +'/index?openpage"><i class="ik ik-home"></i></a></li>'
				)
			}else if( i==(_breadcrumbs.length-1) ){
				$('.breadcrumb').append(
						'<li class="breadcrumb-item active">'+ v +'</a></li'	// set active class on the last index
				)
			}else{
				$('.breadcrumb').append( 
						'<li class="breadcrumb-item">'+ v +'</a></li'	
				)
			}
		})
	});

	/* TODO: Populate the profile photo in top menu
	 * Will retrieve the cache data for the same user in every page
	 */
	$( function() {
		
		var setProfile = function( data ){
			
			$profile = data;
			debugger;
			if (data.photourl === '') {
				$('.avatar-profile').attr('src', $personInfoPath + '/img/empty-profile.jpg?');
				console.log(data.errormsg);
			} else {
				if($profile.photofilename!=''){
					$('.avatar-profile').attr('src', $profile.photourl + '/0/' + $profile.unid + '/$File/' + $profile.photofilename + '?');
				}else{
					$('.avatar-profile').attr('src', $personInfoPath + '/img/empty-profile.jpg?');
				}
			}
		} // end setProfile()
		
		$.ajax({
			type: "get",
			dataType: "json",
			url:  $CommonAPI,
			data: {
				action : '@GetUserProfile',
				key : $user,
					fields : encodeURI('EmployeeNo,FullName,Department,DeptHead,Supervisor,NotesID,Email,PhotoFileName')
			},
			beforeSend: function () {
	                if (sessionCache.exist(this.url)) {
	                    setProfile(sessionCache.get(this.url));
	                    return false;
	                }
	                return true;
	            }
		}).done(function(jqXHR,textStatus) {
			sessionCache.set(this.url, jqXHR, setProfile);
		})
		
	})

	// Modify the .domino-actionbar
	$( function() {
		// move the domino action bar to a new container
		debugger;
		var $actionbar = $('.custom-actionbar .navbar-nav');
		$.each($('.domino-actionbar td a'), function(index, item) {
			$(this).addClass('btn btn-link btn-sm text-secondary px-2');
			$('.custom-actionbar').append($(this))
		});

		// remove the domino action bar separator
		$('.domino-actionbar-sep').remove();

		// remove the default domino action bar
		$('.domino-actionbar').remove();
	})

	// To populate notifications on the top menu
	$( function() {
		$
				.ajax( {
					url : $CommonAPI,
					cache : true,
					data : {
						action : '@GetNotifications',
						key : $user
					},
					cache : false,
					success : function(data) {
						data = $('<div>' + data + '</div>');
						$('.notifications-wrap').html(
								data.find('#noti-content').html());
						$('#notiDropdown .badge').text(
								data.find('#noti-count').text());
					}
				})
	});

	// work around to toggle off all the dropdown menu on top window when
	// clicked on the iframe window
	$( function() {
		var iframe = $('#preview');
		if (iframe.length > 0) {
			iframe.on("load", function() {
				iframe.contents().click( function(event) {
					$('.show', top.document).each( function(i, p) {
						$(p).removeClass('show');
					})
				})
			})
		}
	})

})(jQuery)

/*
 * TODO: Return the url path EXCLUDING the file name
 */
function getRootPath() {
	return location.href.substr(0, location.href.substr(0,
			location.href.lastIndexOf('.nsf')).lastIndexOf('/') + 1);
	href
}

/* TODO: Show All Notifications button
 * Use in bell notification menu/ Show all notifications link
 */
function showAllNotif() {

	$('.top-menu .notifications-wrap a').show(); // show hidden items, if any

	setTimeout( function() {
		$('#notiDropdown').closest('.dropdown').addClass('show'); // set
			// toggler
			// to show
			$('#notiDropdown').addClass('show').attr('aria-expanded', true);

			$('.notification-dropdown').addClass('show'); // show the content
			// of the dropdown
		}, 100)
}

/* TODO: Will create a bootstrap div alert in the current page
 * Use for notifying the user 
 */
function showNotification(type, htmlMsg) {
	/* create an alert message */
	var iconClass;

	if (type === 'warning') {
		iconClass = 'fa fa-exclamation-circle';
	} else if (type === 'danger') {
		iconClass = 'fa fa-times-circle';
	} else if (type === 'success') {
		iconClass = 'fa fa-check-circle';
	} else if (type === 'info') {
		iconClass = 'fa fa-info-circle';
	}

	$('.main-content')
			.prepend(
					'<div class="alert alert-'
							+ type
							+ ' alert-dismissible">'
							+ '	<div class="row">'
							+ '		<div class="col-auto align-self-start"> <!-- or align-self-center -->'
							+ '			<i class="'
							+ iconClass
							+ '"></i>'
							+ '		</div>'
							+ '	<div class="col">'
							+ htmlMsg
							+ '	</div>'
							+ '	</div>'
							+ '	<button type="button" class="close" data-dismiss="alert">&times;</button>'
							+ '</div>')
}

/* TODO:  Common function for closing current form window
 * Will redirect to the url defined in session storage, if available
 */
var closeWindow = function() {
	if (sessionStorage.getItem('nextPage') !== null) {
		window.location = window.sessionStorage.getItem('nextPage');
	} else {
		window.location = $dbPath;
	}
}

/* TODO: Set switchery element ON/OFF
 * Should match with check box parameter
 */
function twitch(switchery, checked) {
    if((checked && !switchery.isChecked()) || (!checked && switchery.isChecked())) {
    	switchery.setPosition(true);
    	switchery.handleOnchange(true);
    }
}


/*
 * TODO: Audit Trail
 * New document will be ignored
 */
function historyLog() {
	var _this = this;
	this.elements ={};
	this.log=[];
	
	this.processHistoryLog = function(){
	
		$(_this.elements).each(function(i,val) {
   			 $.each(val,function(input,label)  {
				//console.log(label + " : " + input);
				
				var element = $('[name="'+input+'"]');
				var element_type = element.prop('type');
				var element_val = undefined;
				
				if( element_type==='text'
					|| element_type==='number'
					|| element_type==='textarea'
					|| element_type==='select-one'
					|| element_type==='checkbox'
					|| element_type==='select-multiple'){
						element_val = element.val()
				}else if( element_type==='radio' ){
					element_val = $("input[name='"+input+"']:checked").val()
				}
			
				element.attr('data-value',element_val) // store existing value in adata-value attr
			});
		});
		
		// bind on form submit to populate the history log
		$('form').on('submit', function(){
			_this.createHistoryLog();
		})
	};
	
	this.createHistoryLog = function(){
		
		if(window.IsNewDoc){
			if( "1"=== window.IsNewDoc )
				return false;
		}
		
		$(this.elements).each(function(i,val) {
		
   			 $.each(val,function(input,label)  {
   			 
				var element = $('[name="'+input+'"]');
				var element_data_val = element.attr('data-value');
				var element_type = element.prop('type');
				var element_val = undefined;
				
				if( element_type==='text'
					|| element_type==='number'
					|| element_type==='textarea'
					|| element_type==='select-one'
					|| element_type==='checkbox'
					|| element_type==='select-multiple'){
						element_val = element.val()
				}else if( element_type==='radio' ){
					element_val = $("input[name='"+input+"']:checked").val()
				}
				
				// join multiple value
				if(Array.isArray(element_val)){
					element_val = element_val.join(element_val,',')
				}
				
				// check if empty
				if(element_val==null || element_val.trim()==='' )
					element_val = 'None';
				
				if( element_data_val==null || element_data_val.trim()==='')
					element_data_val = 'None';
				
				if( element_val!= element_data_val ){
					_this.log.push( '<p class="text-secondary mb-0"><em><small><b>' + $user + '</b> updated the <b>'+label+'</b> from <b>' + element_data_val + '</b> to <b>' + element_val + '</b> on <b>'+ _this.now() +'</b></small></em></p>')
				}
				
			})
		})
		
		if (Array.isArray(_this.log) && _this.log.length) {
			$('[name=HistoryLog]').val( $('[name=HistoryLog]').val() + '^' +_this.log.join('^') );
		}
	};
	
	this.now = function(){
		var date = new Date();
		var options = {
			//weekday: "long",
			year: "numeric",
			month: "short",
			day: "numeric",
			hour:"2-digit",
			minute: "2-digit"
		};  
		
		return date.toLocaleTimeString("en-us", options);
	}
	
}


/* TODO: Custom sessionStorage Caching.
 * to prevent the same url firing on the server
 * the idea is to trigger the url on the servert and keep the data in sessionStorage on first trigger
 * otherwise, retrieve the data from sessionStorage of the same url
 */
var sessionCache = {
	data: {},
	remove: function (url) {
		// delete the item from sessionStorage
		sessionStorage.removeItem( url );
	},
	exist: function (url) {
		// check if an item exist in sessionStorage
		return (sessionStorage.getItem(url) != null)
	},
	get: function (url) {
		console.warn('User Profile retrieved from cache', url);
		return JSON.parse(sessionStorage.getItem(url))
	},
	set: function (url, cachedData, callback) {
		// set a content of an itemKey from sessionStorage
       	sessionStorage.removeItem( url );
		sessionStorage.setItem(url, JSON.stringify(cachedData))
		if ($.isFunction(callback)) callback(cachedData)
    }
};


/**
 * TODO: Work-around for input checkbox not updating when submitted
 * The objective is to create a input type text
 * Pass/retrieve the value of the selected checkbox to the text field 
 * and vice-versa
 */
var checkbox = {

	setOnchange: function(obj){
		$('[name=Choose'+ obj.attr('name') +']').on('change', function(){
			checkbox.get(obj)
		})
	},
	
	get: function(obj){
		var checked = [];
			
		$(":checkbox[name=Choose"+obj.attr('name')+"]:checked").each(function(i,v){
			checked.push($(this).val())
		});
			
		obj.val(checked.join(', '))
	},
	
	set: function(obj){
		debugger;
		var origValue = obj.val().split(', ');
		
		$( $('[name=Choose'+ obj.attr('name') +']') ).each(function(i,v){
			if( origValue.includes( $(this).val() )  ){
				$(this).prop('checked',true)
			}else{
				$(this).prop('checked',false)
			}
		})
		
		checkbox.setOnchange(obj)
	}
}

/*
 * TODO: Show user's basic info in modal window
 * will show a message box if the user does not exist
 */
function showBasicInfo(){
	
	var root = getRootPath();
	
	BootstrapModalWrapperFactory.createAjaxModal({
	    message: '<link rel="stylesheet" href="'+root+'icpweb.nsf/plugins/loader/waitMe.css">',
	    closable: true,
	    closeByBackdrop: true,
	    title:'My Profile',
	    localData: {},
	    ajax: {
			url: $CommonAPI,
			data: {
				action : '@GetUserBasicInfo',
				key : $user
			},
			beforeSend: function(){
				jQuery.ajax({
		            type: "GET",
		            url: root + 'icpweb.nsf/plugins/loader/waitMe.min.js',
		            dataType: 'script',
		            cache: true,
		            success: function(){
						$(".modal-dialog").waitMe({
							effect : 'rotateplane',
							text : 'Please wait..',
							color : 'silver', //'#31708f',
							maxSize : 20,
							textPos : 'horizontal'
						})
					}
				})   
			}
		},
	    ajaxContainerReadyEventName: "event-name-triggered-once-ajax-content-updated"
	});
	
	jQuery(function($) {
		// here we can reference the container bootstrap modal by its id
        // passed as parameter to request by name "ajaxModalId"
        // we can get a reference top modal in current open managed
        // instances in BootstrapModalWrapperFactory
		var m = BootstrapModalWrapperFactory.globalModals[BootstrapModalWrapperFactory.globalModals.length - 1];
		$("#" + m.options.id).on(m.options.ajaxContainerReadyEventName, function (event, modal) {
			modal.updateSize(null);
			$(".modal-dialog").waitMe("hide"); // hide the loading modal
		})
	})
}

/*
 * TODO: Get Url Parameter
 */
var getUrlParameter = function getUrlParameter(sParam, sPageURL) {
    //var sPageURL = window.location.search.substring(1),
        var sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};