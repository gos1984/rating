<div class="row">
	<div class="col-12">
		<div class="content">
			<div class="table">
				<div class="tr center">
					<div class="th">№</div>
					<div class="th">Наименование</div>
					<div class="th"></div>
					<div class="th"></div>
				</div>
				<form class="tr" action="/administrator/edit/modal?action=add" method="POST">
					<div class="td"></div>
					<div class="td"><textarea name="name" class="form-control align-middle"></textarea></div>
					<div class="td"><button class="btn btn-success">Добавить</button></div>
					<div class="td"></div>
				</form>
				<?php foreach ($data as $key => $value): ?>
					<form class="tr" action="/administrator/edit/modal?action=edit" method="POST">
						<div class="td"><input type="text" name="id" value="<?php echo $key ?>" readonly class="form-control align-middle"></div>
						<div class="td"><textarea name="name" class="form-control align-middle"><?php echo $value ?></textarea></div>
						<div class="td"><button class="btn btn-success">Сохранить</button></div>
						<div class="td"><a href="<?php echo "/administrator/edit/modal?action=remove&id=$key" ?>" class="btn btn-danger">Удалить</a></div>
					</form>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>