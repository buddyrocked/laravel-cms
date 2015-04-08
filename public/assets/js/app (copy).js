$(document).ready(function(){
	//DELETE CONFIRM
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



});