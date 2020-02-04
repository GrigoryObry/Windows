<div class="modal fade" id="modal_add_task" role="dialog">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title">Добавить задачу</h3>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
			<form id="form-add-task" action="/add_task.php" method="POST">
              <div class="form-group">
                <label for="title">Заголовок</label>
                <input required type="text" name="title" class="form-control" placeholder="Введите заголовок">
              </div>
              <div class="form-group">
                <label for="description">Подробное описание</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
              </div>
			  <div class="form-group">
                <label for="datetime">Время завершения</label>
                <input name="datetime" type="datetime-local">
              </div>
              <!--div class="checkbox">
                <label>
                  <input type="checkbox"> Check me out
                </label>
              </div-->
              <button type="submit" class="btn btn-default">Добавить</button>
			  <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
            </form>

		</div>
	</div>
  </div>
</div>