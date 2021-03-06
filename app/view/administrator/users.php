<div class="row">
	<div class="col-12">
			<?php if (!empty($data)): ?>
				<div class="table">
					<div class="tr">
						<div class="td"><a href="/administrator/xls" class="btn btn-success">Скачать Результаты с модальностями</a></div>
						<div class="td"></div>
						<div class="td"></div>
						<div class="td"></div>
						<div class="td"></div>
						<div class="td"></div>
						<div class="td"></div>
						<div class="td"></div>
						<div class="td"></div>
						<div class="td"></div>
					</div>
				</div>
				<div class="table">
					<div class="tr center">
						<div class="th">№</div>
						<div class="th">Организация</div>
						<div class="th">ФИО</div>
						<div class="th">Город</div>
						<div class="th">Адрес</div>
						<div class="th">Должность</div>
						<div class="th">E-mail</div>
						<div class="th">Тип организации</div>
						<div class="th">Вид лечения</div>
						<div class="th">Результат</div>
					</div>
					<?php foreach ($data as $u => $user): ?>
						<div class="tr">
							<div class="td"><?php echo $u ?></div>
							<div class="td"><?php echo $user['company'] ?></div>
							<div class="td"><?php echo "{$user['lastname']} {$user['name']} {$user['patron']}" ?></div>
							<div class="td"><?php echo $user['city'] ?></div>
							<div class="td"><?php echo $user['address'] ?></div>
							<div class="td"><?php echo $user['position'] ?></div>
							<div class="td"><?php echo $user['email'] ?></div>
							<div class="td"><?php echo $user['type_company'] ?></div>
							<div class="td"><?php echo $user['treatment'] ?></div>
							<div class="td center"><?php echo $user['result'] ?></div>
							<div class="td center"><a href="<?php echo "/administrator/users/{$u}"?>" class="btn btn-success" target="_blank">Подробнее</a></div>
						</div>
					<?php endforeach ?>
				</div>
				<?php else: ?>
					<h3 class="center">Результатов нет</h3>
				<?php endif ?>
		</div>
	</div>