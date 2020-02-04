<div class="modal fade" id="modal_edit_task" role="dialog">
  <div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title">Редактировать задачу</h3>
		</div>
		<div class="modal-body">
            <!-- content goes here -->
			<form id="form-edit-task" method="POST" action="/ajax/processQuery.php">
				<input type="hidden" name="action" value="update">
				<?php include ( __DIR__ . '/form_fields_task.php') ?>
				<button type="submit" class="btn btn-success">Сохранить изменения</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
            </form>
		</div>
	</div>
  </div>
</div>