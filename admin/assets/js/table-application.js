// -------------------------------
// Initialize Data Tables
// -------------------------------

$(document).ready(function() {
  $('input[type="checkbox"].square-blue').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      increaseArea: '20%' // optional
    });

  $('.basic-datatables').dataTable({
    "ordering" : false
  });
  $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search Data');
  $('.dataTables_length select').addClass('form-control');

  var checkedAll = $('#tables_checkbox > thead > tr > th input[type=checkbox]');
  var checkedBox = $('#tables_checkbox > tbody > tr > td input[type=checkbox]');

	//select/deselect all rows according to table header checkbox
	checkedAll.eq(0).on('ifChecked ifUnchecked', function(event){
		$('#tables_checkbox').find('tbody > tr').each(function(){
      var row = this;
      if (event.type == 'ifChecked') {
        $(row).find('td input[type=checkbox]').iCheck('check');
        document.getElementById("delete_data").disabled = false;
      } else {
        $(row).find('td input[type=checkbox]').iCheck('uncheck');
        document.getElementById("delete_data").disabled = true;
      }
		});
	});

	//select/deselect a row when the checkbox is checked/unchecked
	$(document).on('ifChanged', '#tables_checkbox > tbody > tr > td input[type=checkbox]', function(event){
		var n = $('#tables_checkbox > tbody > tr > td input[type=checkbox]').filter(':checked').length;
		var rowCount = $('#tables_checkbox > tbody > tr > td input[type=checkbox]').length;

		if(n > 0)
			document.getElementById("delete_data").disabled = false;
		else
			document.getElementById("delete_data").disabled = true;

		if(rowCount == n)
			checkedAll.prop('checked', 'checked');
		else
			checkedAll.removeProp('checked');

    checkedAll.iCheck('update');
	});

});
