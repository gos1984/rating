<div class="row">
	<div class="col-3">
		<nav class="menu">
			<?php if (!empty($data['questions'])): ?>
				<ul>
					<li><a href="/administrator/answers">Все категории</a></li>
					<?php foreach ($data['questions'] as $key => $value): ?>
						<li><a href="<?php echo "/administrator/answers/$key" ?>" title="<?php echo $value['name'] ?>"><?php echo "Вопрос №$key" ?></a></li>
					<?php endforeach ?>
				</ul>
			<?php endif ?>
		</nav>
	</div>
	<div class="col-9">
		<div class="content">
			<div class="table">
				<div class="tr center">
					<div class="th">№</div>
					<div class="th">Наименование</div>
					<div class="th">Вопрос</div>
					<div class="th">Тип</div>
					<div class="th">Баллы<br/>(кол-во)</div>
					<div class="th">Родительский<br/>вопрос (№)</div>
					<div class="th">Дочерний<br/>вопрос (№)</div>
				</div>
				<form class="tr form-group" action="/administrator/edit/answers?action=add" method="POST">
					<div class="td"></div>
					<div class="td"><textarea name="name" class="form-control align-middle"></textarea></div>
					<div class="td">
						<select name="question" class="form-control align-middle">
							<option value=""></option>
							<?php foreach ($data['questions'] as $q => $quest): ?>
								<option value="<?php echo $q ?>"  <?php echo $data['id'] == $q ? "selected" : "" ?>><?php echo "Вопрос №$q" ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="td">
						<select name="type" class="form-control align-middle">
							<option value=""></option>
							<?php foreach ($data['type'] as $type): ?>
								<option value="<?php echo $type ?>"><?php echo $type ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="td"><div class="td"><input name="score" type="number" class="form-control align-middle"></div></div>
					<div class="td"><div class="td"><input name="manager" type="number" class="form-control align-middle"></div></div>
					<div class="td"><div class="td"><input name="cond" type="number" class="form-control align-middle"></div></div>
					<div class="td"><button class="btn btn-success">Добавить</button></div>
					<div class="td"></div>
				</form>
				<?php if (!empty($data['answers'])): ?>
					<?php foreach ($data['answers'] as $a => $answer): ?>
						<form class="tr" action="/administrator/edit/answers?action=edit" method="POST">
							<div class="td"><a href="#"><input type="text" name="id" value="<?php echo $a?>" readonly class="form-control align-middle"></a></div>
							<div class="td"><textarea name="name" class="form-control align-middle"><?php echo $answer['name'] ?></textarea></div>
							<div class="td">
								<select name="question" class="form-control align-middle">
									<option value=""></option>
									<?php foreach ($data['questions'] as $q => $quest): ?>
										<option value="<?php echo $q ?>" <?php echo $q == $answer['question'] ? "selected" : "" ?>><?php echo "Вопрос № $q" ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="td">
								<select name="type" class="form-control align-middle">
									<option value=""></option>
									<?php foreach ($data['type'] as $type): ?>
										<option value="<?php echo $type ?>" <?php echo $type == $answer['type'] ? "selected" : "" ?>><?php echo $type ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="td"><input type="number" class="form-control align-middle" name="score"  value="<?php echo $answer['score'] ?>">
							</div>
							<div class="td"><input type="number" class="form-control align-middle" min="0" name="manager"  value="<?php echo $answer['manager'] ?>">
							</div>
							<div class="td"><input type="number" class="form-control align-middle" min="0" name="cond"  value="<?php echo $answer['cond'] ?>">
							</div>
							<div class="td"><button class="btn btn-success">Сохранить</button>
							</div>
							<div class="td"><a href="<?php echo "/administrator/edit/answers?action=remove&id={$a}"?>" class="btn btn-danger">Удалить</a></div>
						</form>
					<?php endforeach ?>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>




