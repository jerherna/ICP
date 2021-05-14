



/* 
 * TODO: Create new document in a modal window
 * Accepted Parameter: formName as string or object like:
 * { formName:'form name', modalSize:'modal-sm/mo', postLoad:functin(){}, postSubmit: function(){} }
 * */

var modalNewDocument = function() {
	"use strict"
	var args = arguments[0] || {};
	var modalSize = null;
	var closeOnSubmit = true;
	var formName = '';
	var urlParameters='';
	
	if (typeof args == "object") {
		
		// find if there's a given parameter for formName
		if(args.formName!= undefined )
			formName = args.formName;
		
		// find if there's a given parameter for modal size
		if( args.modalSize != undefined )
			modalSize = (args.modalSize==='modal-md') ?null: args.modalSize;
		
		// find if there's a function to run on modal submit
		if( args.closeOnSubmit !== undefined)
			closeOnSubmit = args.closeOnSubmit;
		
		// find if there's a given url parameter
		if(args.urlData != undefined ){
			for(var obj in args.urlData){
				urlParameters += '&' + obj +'=' + encodeURIComponent(args.urlData[obj]);
			 }
		}
		
	} else if (typeof args == "string"){
		formName = args;
	}
	
	var url = $dbPath + '/' + formName + '?OpenForm' + urlParameters;
	
	BootstrapModalWrapperFactory.createAjaxModal({
		message: '<link rel="stylesheet" href="'+getRootPath()+'icpweb.nsf/plugins/loader/waitMe.css">',
		closable: false,
		closeByBackdrop: true,
		localData: {},
		ajax: {
			url: url,
			cache: false,
			data: {},
			beforeSend: function(){
				jQuery.ajax({
		            type: "GET",
		            url: getRootPath() + 'icpweb.nsf/plugins/loader/waitMe.min.js',
		            dataType: 'script',
		            cache: true,
		            success: function(){
						$(".modal-dialog").waitMe({
							effect : 'rotateplane',
							text : 'Please wait..',
							color : 'silver',//'#31708f',
							maxSize : 20,
							textPos : 'horizontal'
						});
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
        	
			modal.updateTitle(modal.originalModal.find(".modal-body title").text());
			modal.updateSize(modalSize);
			modal.updateClosableByBackdrop(false);
			modal.updateClosable(true);
			$(".modal-dialog").waitMe("hide"); // hide the loading modal
        	
        	// return the previous design;s element object so that the existing codes in xpages will still work
        	modal.element = modal.originalModal.find('form');
        	
        	modal.addButton({
        		label: "Submit",
        		cssClass: "btn btn-success",
        		action: function (button, buttonData, originalEvent) {
        			button.prop('disabled',true);
        			modal.originalModal.find("form").submit();
        		}
        	});
        	modal.addButton({
        		label: "Close",
        		cssClass: "btn btn-primary",
        		action: function (button, buttonData, originalEvent) {
        			return this.hide();
        		}
        	});
        	
        	// remove the element put by domino
        	//modal.originalModal.find('.modal-body form')
        	//	.find('[name=__Click]').remove();
        	
         	// set form attributes
        	modal.originalModal.find(".form")
				.addClass('needs-validation')
					.attr('novalidate', 'novalidate')
						.attr('id', formName)
							.attr('enctype','multipart/form-data')
								.attr('action', $dbPath + '/' + formName+ '?CreateDocument');

        	// set focus on the first input
        	modal.originalModal.find('form input:enabled:visible:first').focus();

			// fire the post modal load callback function if provided in the arguments
			if (typeof args == "object") {
				if (args.postLoad && typeof args.postLoad == 'function'){
					args.postLoad(modal)
				}
			};
			
			modal.originalModal.on('submit', 'form', function(event) {
				event.preventDefault();
				event.stopPropagation();

				if (modal.originalModal.find("form")[0].checkValidity() === false) {
					modal.originalModal.find('button:contains("Submit")').prop('disabled',false) // enable the submit button
				} else {

					var form = $(this)[0];
					var form_data = new FormData(form); // Creates new FormData object
					
					$.ajax({
						url : $(form).attr('action'),
						type : 'POST',
						cache : false,
						data : form_data,
						contentType : false,
						processData : false
					}).done( function(xhr) {
						// fire the post submit callback function if provided in the arguments
						if (typeof args == "object") {
							if (args.postSubmit && typeof args.postSubmit == 'function')
								args.postSubmit(modal,xhr)
							else {
								if( closeOnSubmit ){
									refreshDataview(); // refresh the xpage view
									modal.hide();	// close the modal window
								}
							}
						} else {
							if( closeOnSubmit ){
								refreshDataview(); // refresh the xpage view
								modal.hide();	// close the modal window
							}
						}
					}).fail(function(xhr, status,	error) {
						console.log(xhr.status+ ': '+ xhr.statusText)
					}) // end ajax
				} // end else

				modal.originalModal.find("form").addClass('was-validated');
			}) // end onsubmit
		})
	})
}

/*
 * Update a document in a modal window Accepted Parameter: universal id of the
 * document to update
 * 
 */

var modalUpdateDocument = function() {
	
	var args = arguments[0] || {};
	var closeOnSubmit = true;
	var modalSize = '';
	var unid = '';
	
	if (typeof args == "object") {
		
		if( args.unid != undefined )
			unid = args.unid;
		
		if( args.modalSize != undefined )
			modalSize = (args.modalSize==='modal-md') ?null: args.modalSize;
		
		if( args.closeOnSubmit != undefined )
			closeOnSubmit = args.closeOnSubmit;
		
	} else if (typeof args == "string"){
		unid = args;
	}
		
	var url = $dbPath + '/0/' + unid + '?EditDocument';

	// Test the url if the user has sufficient access rights to edit the document
	$.get(url).done(function(data){
		data = $('<div>' + data + '</div>');
		
		if(data.find('#failedLoginErrMsg').text().includes('you are not authorized to access')){
			/*
			var modal2 = top.BootstrapModalWrapperFactory.createModal({
				message: '<strong class="text-info"><i class="fa fa-info-circle"></i> No Access!</strong><p class="text-normal">You are not authorized to edit this document.</p>',
				closable: false,
				closeByBackdrop: true
			}).show();
		
			setTimeout(function () {
				modal2.updateSize("modal-sm");
			}, 200);
			*/
			modalOpenForm({unid: unid,modalSize: modalSize})
		}else{
			return launchModalUpdateWindow();
		}
		
	})
	
				
	function launchModalUpdateWindow(){
		
		BootstrapModalWrapperFactory.createAjaxModal({
			message: '<link rel="stylesheet" href="'+getRootPath()+'icpweb.nsf/plugins/loader/waitMe.css">',
			closable: false,
			closeByBackdrop: true,
			size: modalSize,
			localData: {},
			ajax: {
				url: url,
				cache: false,
				data: {},
				beforeSend: function(){
					jQuery.ajax({
			            type: "GET",
			            url: getRootPath() + 'icpweb.nsf/plugins/loader/waitMe.min.js',
			            dataType: 'script',
			            cache: true,
			            success: function(){
							$(".modal-dialog").waitMe({
								effect : 'rotateplane',
								text : 'Please wait..',
								color : 'silver',//'#31708f',
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
	        	
				modal.updateTitle(modal.originalModal.find(".modal-body title").text());
				modal.updateSize(modalSize);
				modal.updateClosableByBackdrop(false);
				modal.updateClosable(true);
				$(".modal-dialog").waitMe("hide"); // hide the loading modal
	        	
	        	// return the previous design;s element object so that the existing codes in xpages will still work
	        	modal.element = modal.originalModal.find('form');
	        	
	        	modal.addButton({
	        		label: "Submit",
	        		cssClass: "btn btn-success",
	        		action: function (button, buttonData, originalEvent) {
	        			button.prop('disabled',true);
	        			modal.originalModal.find("form").submit();
	        		}
	        	});
	        	modal.addButton({
	        		label: "Close",
	        		cssClass: "btn btn-primary",
	        		action: function (button, buttonData, originalEvent) {
	        			return this.hide();
	        		}
	        	});
	        	
				var formName = modal.originalModal.find("form")
					.attr('name').replace('_', ''); // get the form name
	
				// remove the element put by domino
				modal.originalModal.find('form')
	    			.find('[name=__Click]').remove();
	
				modal.originalModal.find("form")
					.addClass('needs-validation')
						.attr('novalidate', 'novalidate')
							.attr('id', formName)
								.attr('enctype','multipart/form-data')
									.attr('action',	$dbPath + '/0/' + unid + '?SaveDocument');
						
				// set focus on the first input
	        	modal.originalModal.find('form input:enabled:visible:first').focus();
	
	
	        	modal.originalModal.on('submit', 'form', function(event) {
					event.preventDefault();
					event.stopPropagation();
	
					if (modal.originalModal.find("form")[0].checkValidity() === false) {
						modal.originalModal.find('button:contains("Submit")').prop('disabled',false) // enable the submit button
					} else {
	
						var form = $(this)[0];
						var form_data = new FormData( form ); // Creates new FormData object
						
						$.each($('[type=checkbox]'),function(i,checkbox){
							form_data.append($(checkbox).attr('name'), $(checkbox).val())
						})
						
						$.ajax( {
							url : $(form).attr('action'),
							type : 'POST',
							cache : false,
							data : form_data,
							contentType : false,
							processData : false
						}).done( function(xhr) {
							// fire the post submit callback function if provided in the arguments
							if (typeof args == "object") {
								if (args.postSubmit && typeof args.postSubmit == 'function')
										args.postSubmit(modal,xhr)
							else {
								if( closeOnSubmit ){
									refreshDataview(); // refresh the xpage view
									modal.hide();	// close the modal window
								}
							}
						} else {
							if( closeOnSubmit ){
								refreshDataview(); // refresh the xpage view
								modal.hide();	// close the modal window
							}
						}}).fail( function(xhr, status, error) {
							console.log(xhr.status + ': ' + xhr.statusText)
						}) // end ajax
					} // end if
	
					modal.originalModal.find("form").addClass('was-validated');
				}) // end onsubmit
			}) // end ajax load
		})	// end JQuery
	}	
}

var modalOpenForm = function() {

	var args = arguments[0] || {};
	var modalSize = '';
	var formName = '';
	var url='';
	
	if (typeof args == "object") {
		
		if( args.formName != undefined )
			formName = args.formName;
		
		if( args.modalSize != undefined )
			modalSize = (args.modalSize==='modal-md') ?null: args.modalSize;

		if( args.url != undefined )
			url = $dbPath + '/' + formName + '?OpenForm';
		
		if( args.unid != undefined )
			url = $dbPath + '/0/' + args.unid + '?OpenDocument';
		
	} else if (typeof args == "string")
		formName = args;


		
	
	BootstrapModalWrapperFactory.createAjaxModal({
		message: '<link rel="stylesheet" href="'+getRootPath()+'icpweb.nsf/plugins/loader/waitMe.css">',
		closable: false,
		closeByBackdrop: true,
		localData: {},
		ajax: {
			url: url,
			cache: false,
			data: {},
			beforeSend: function(){
				jQuery.ajax({
		            type: "GET",
		            url: getRootPath() + 'icpweb.nsf/plugins/loader/waitMe.min.js',
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
        	
			modal.updateTitle(modal.originalModal.find(".modal-body title").text());
			modal.updateSize(modalSize);
			modal.updateClosableByBackdrop(false);
			modal.updateClosable(true);
			$(".modal-dialog").waitMe("hide"); // hide the loading modal
        	
        	// return the previous design;s element object so that the existing codes in xpages will still work
        	modal.element = modal.originalModal.find('.modal');
        	
        	modal.addButton({
        		label: "Close",
        		cssClass: "btn btn-primary",
        		action: function (button, buttonData, originalEvent) {
        			return this.hide();
        		}
        	});
        	
        	// fire the post modal load callback function if provided in the arguments
			if (typeof args == "object") {
				if (args.postLoad
						&& typeof args.postLoad == 'function')
					args.postLoad(modal)
			};

		})
	})
}


/* Dynamically partial refresh data view */
function refreshDataview() {
	var ifrmeDoc = document.getElementById("preview").contentWindow.document;
	if ($('.data-view-partial-refresh', ifrmeDoc).length != -1)
		$('.data-view-partial-refresh', ifrmeDoc).click();
}

var modalDeleteDocument = function(unid) {

	BootstrapModalWrapperFactory.confirm({
        title: "Confirm Deletion",
        message: "Are you sure you want to delete this document?",
        onConfirmAccept: function () {
			$.ajax( {
				url : $apiPath,
				cache : false,
				data : {
					action : '@DeleteDocument',
					unid : unid
				}
			}).done( function(xhr) {
				refreshDataview();
			}).fail( function(xhr, status, error) {
				console.log(xhr.status + ': ' + xhr.statusText)
			})
        },
        onConfirmCancel: function () {
            
        }
    })
};

var ajaxFileDownload = function(view) {

	var url = $dbPath + '/(ExportExcel)?OpenAgent';
	var fileName = '';

	$.getJSON(url, {
		view : view
	}).done( function(data) {

		var fileUrl = $dbPath + '/0/' + data.unid + '/$File/' + data.name;
		fileName = data.name;

		$.ajax( {
			url : fileUrl,
			method : 'GET',
			xhrFields : {
				responseType : 'blob'
			}
		}).done( function(data) {
			var a = document.createElement('a');
			var url = window.URL.createObjectURL(data);
			a.href = url;
			a.download = fileName;
			document.body.append(a);
			a.click();
			a.remove();
			window.URL.revokeObjectURL(url);
		}).fail( function(xhr, status, error) {
			console.log(xhr.status + ': ' + xhr.statusText)
		})

	}).fail( function(xhr, status, error) {
		console.log(xhr.status + ': ' + xhr.statusText);
		top.$.showAlert( {
			title : "Error Encountered",
			modalDialogClass : 'modal-sm',
			body : xhr.status + ': ' + xhr.statusText
		})
	})

}
