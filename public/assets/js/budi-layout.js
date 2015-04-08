define(["jquery"], function($) {
	$(document).ready(function() {
		$('[data-toggle=offcanvas]').click(function() {
			$('.row-offcanvas').toggleClass('active');
		});

		$('.btn-delete').click(function(e){
			var self = $(this);
			swal({
				title:'Are You Sure',
				text:'You will not be able to recover this data!',
				type:'warning',
				showCancelButton:true,
				confirmButtonCollor:'#DD6B55',
				confirmButtonText:'Yes, delete it!',
				cancelButtonText:'No, cancel please!',
				closeOnConfirm:false,
				closeOnCancel:false
			},
			function(isConfirm){
				if(isConfirm){
					swal('Deleted!', 'Data has been deleted', 'success');
					self.closest('.form-delete').submit();
				}else{
					swal('Canceled', 'Data has safe', 'error');				
				}
			});
			e.preventDefault();
		});

		$('.btn-delete-ajax').click(function(e){
			var self = $(this);
			swal({
				title:'Are You Sure',
				text:'You will not be able to recover this data!',
				type:'warning',
				showCancelButton:true,
				confirmButtonCollor:'#DD6B55',
				confirmButtonText:'Yes, delete it!',
				cancelButtonText:'No, cancel please!',
				closeOnConfirm:false,
				closeOnCancel:false
			},
			function(isConfirm){
				if(isConfirm){
					swal('Deleted!', 'Data has been deleted', 'success');
					self.parentsUntil('.thumb-container').remove();
				}else{
					swal('Canceled', 'Data has safe', 'error');				
				}
			});
			e.preventDefault();
		});

		$('#open-shortcut').click(function(e){
			var elm = $('#shortcut-container');
			if(elm.hasClass('active')){
				$('#open-shortcut i').removeClass('fa fa-chevron-up');
				$('#open-shortcut i').toggleClass('fa fa-chevron-down');
			}else{
				$('#open-shortcut i').removeClass('fa fa-chevron-down');
				$('#open-shortcut i').toggleClass('fa fa-chevron-up');
			}
			elm.toggleClass('active');

			e.preventDefault();
		});

		

		
		$('.list-group-item').click(function(e){

			if($(this).hasClass('external-link')){
				var self = $(this);
				swal({
					title:'Are You Sure want to Logout',
					text:'You will be able to login again next time!',
					type:'warning',
					showCancelButton:true,
					confirmButtonCollor:'#DD6B55',
					confirmButtonText:'Yes, Logout!',
					cancelButtonText:'No, cancel please!',
					closeOnConfirm:false,
					closeOnCancel:false
				},
				function(isConfirm){
					if(isConfirm){
						swal('Deleted!', 'You success logout', 'success');
						window.location = self.attr('href');
					}else{
						swal('Canceled', 'You still here', 'error');				
					}
				});
				e.preventDefault();
			}else{
				if($(this).hasClass('active')){
					if($(this).hasClass('active-menu')){
						$(this).parent().find('.sub-group').css({'display':'none'});
						$(this).removeClass('active-menu');
					}else{
						$(this).parent().find('.sub-group').css({'display':'block'});
						$(this).addClass('active-menu');
					}
				}else{
					$(this).addClass('active');
					$(this).addClass('active-menu');
					$(this).parent().find('.sub-group').css({'display':'block'});
				}

				$('.list-group-item').not(this).each(function(e){
					$(this).parent().find('.sub-group').css({'display':'none'});
					$(this).removeClass('active');
					$(this).removeClass('active-menu');
				});
				e.preventDefault();
			}
			
		});

		$('#tags').tagsInput({
			autocomplete_url:url_tag
		});

		tinymce.init({
			selector:"textarea.tinymce",
			plugins: [
					         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					         "save table contextmenu directionality emoticons template paste textcolor"
					],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
			file_browser_callback : elFinderBrowser
		});

		


		$('#btn-add-image').on('click', function(e){
			var html = $('#input-image').html();
			$('#images').append(html);

			$('.btn-file :file').change(function(e){
				var self = $(this);
				self.parent().parent().next().val(self.val().replace(/\\/g, '/').replace(/.*\//, ''));
			});

			$('.btn-remove-image:not(:first)').on('click', function(e){
				$(this).parent().parent().parent().remove();
			});

			e.preventDefault();
		});

		$('.btn-file :file').change(function(e){
			var self = $(this);
			self.parent().parent().next().val(self.val().replace(/\\/g, '/').replace(/.*\//, ''));
		});

		$('#container-masonry').masonry();

	});



	/*$(document)
		.on('change', '.btn-file :file', function() {
			var input = $(this),
			numFiles = input.get(0).files ? input.get(0).files.length : 1,
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
			input.trigger('fileselect', [numFiles, label]);
	});
			
	$(document).ready( function() {
		$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
			
			var input = $(this).parents('.input-group').find(':text'),
				log = numFiles > 1 ? numFiles + ' files selected' : label;
			
			if( input.length ) {
				input.val(log);
			} else {
				if( log ) alert(log);
			}
			
		});
	});
	*/

});
	function elFinderBrowser (field_name, url, type, win) {
	  	tinymce.activeEditor.windowManager.open(
	  		{
			    file: './../../elfinder/tinymce',// use an absolute path!
			    title: 'elFinder 2.0',
			    width: 900,
			    height: 450,
			    resizable: 'yes'
			}, 
	  		{
		    	setUrl: function (url) {
			      	win.document.getElementById(field_name).value = url;
		    	}
	 		}
	 	);
	  	return false;
	}

