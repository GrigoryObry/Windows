var TaskController = {};

TaskController.addTask = function(data, callback) {
	var callback = callback || function() {};
	
	$.ajax({
		url: '/add_task.php',
		type: 'POST',
		dataType: 'json',
		data: data,
		success: function(response) {
			callback(response);
		}
	});
	
}

TaskController.addTask();

$('#form-add-task').on('submit', function(event) {
	// Отмена события по умолчанию
	event.preventDefault();

	TaskController.addTask($(this).serialize(), function(response) {
		if (response.status) {
			$('#modal_add_task').modal('hide');
			alert('Ваша задача успешно добавлена!');
		}
	});
});