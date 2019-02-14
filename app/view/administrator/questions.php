<div class="row">
	<div class="col-3">
		<nav class="menu">
			<ul>
				<li><a href="/administrator">Все категории</a></li>
				<?php foreach ($data['category'] as $key => $value): ?>
					<li><a href="<?php echo "/administrator/cat/$key" ?>"><?php echo $value ?></a></li>
				<?php endforeach ?>
			</ul>
		</nav>
	</div>
	<div class="col-9">
		<div class="content">
			<div class="table">
				<div class="tr center">
					<div class="th">№</div>
					<div class="th">Наименование</div>
					<div class="th">Модальность</div>
					<div class="th">Категория</div>
					<div class="th"></div>
					<div class="th"></div>
				</div>
				<form class="tr form-group" action="/administrator/edit/questions?action=add" method="POST">
					<div class="td"></div>
					<div class="td"><textarea name="name" class="form-control align-middle"></textarea></div>
					<div class="td">
						<select name="modal" class="form-control align-middle">
							<option value=""></option>
							<?php foreach ($data['modal'] as $m => $mod): ?>
								<option value="<?php echo $m ?>"><?php echo $mod ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="td">
						<select name="category" class="form-control align-middle">
							<option value=""></option>
							<?php foreach ($data['category'] as $c => $cat): ?>
								<option value="<?php echo $c ?>" <?php echo $data['id'] == $c ? "selected" : "" ?>><?php echo $cat ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="td"><button class="btn btn-success">Добавить</button></div>
					<div class="td"></div>
				</form>
				<?php if (!empty($data['questions'])): ?>
					<?php foreach ($data['questions'] as $key => $value): ?>
						<form class="tr" action="/administrator/edit/questions?action=edit" method="POST">
							<div class="td"><a href="<?php echo "/administrator/answers/$key"?>"><input type="text" name="id" value="<?php echo $key ?>" readonly class="form-control align-middle"></a></div>
							<div class="td"><textarea name="name" class="form-control align-middle"><?php echo $value['name'] ?></textarea></div>
							<div class="td">
								<select name="modal" class="form-control align-middle">
									<option value=""></option>
									<?php foreach ($data['modal'] as $m => $mod): ?>
										<option value="<?php echo $m ?>" <?php echo $m == $value['modal'] ? "selected" : "" ?>><?php echo $mod ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="td">
								<select name="category" class="form-control align-middle">
									<option value=""></option>
									<?php foreach ($data['category'] as $c => $cat): ?>
										<option value="<?php echo $c ?>" <?php echo $c == $value['category'] ? "selected" : "" ?>><?php echo $cat ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="td"><button class="btn btn-success">Сохранить</button></div>
							<div class="td"><a href="<?php echo "/administrator/edit/questions?action=remove&id={$key}"?>" class="btn btn-danger">Удалить</a></div>
						</form>
					<?php endforeach ?>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>