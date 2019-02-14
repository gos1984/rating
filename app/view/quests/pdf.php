<div class="image">
	<img src="/app/template/img/logo.png">
</div>
<section id="main">
	<div class="about">
		<h1>Анкета</h1>
		<table>
			<tr>
				<td><strong>Организация: </strong></td>
				<td><?php echo $data['company']?></td>
			</tr>
			<tr>
				<td><strong>Фамилия: </strong></td>
				<td><?php echo $data['lastname']?></td>
			</tr>
			<tr>
				<td><strong>Имя: </strong></td>
				<td><?php echo $data['name']?></td>
			</tr>
			<tr>
				<td><strong>Отчество: </strong>
				</td>
				<td><?php echo $data['patron']?></td>
			</tr>
			<tr>
				<td><strong>Должность: </strong></td>
				<td><?php echo $data['position']?></td>
			</tr>
			<tr>
				<td><strong>E-mail: </strong></td>
				<td><?php echo $data['email']?></td>
			</tr>
			<tr>
				<td><strong>Город: </strong></td>
				<td><?php echo $data['city']?></td>
			</tr>
			<tr>
				<td><strong>Адрес: </strong></td>
				<td><?php echo $data['address']?></td>
			</tr>
			<tr>
				<td><strong>Тип организации: </strong></td>
				<td><?php echo $data['company']?></td>
			</tr>
			<tr>
				<td><strong>Вид лечения: </strong></td>
				<td><?php echo $data['treatment']?></td>
			</tr>
			<tr>
				<td><strong>Результат: </strong></td>
				<td><?php echo $data['result']?></td>
			</tr>
		</table>
	</div>
	<div class="steps">
		<div class="step">
			<br/>
			<div class="description">
				<div class="block quest"><span class="h3">Модальности, которые имеются в отделении:</span>
					<?php foreach ($data['description']['modal'] as $m => $modal): ?>
						<div class="block-child">
							<label>
								<input type="checkbox" checked="" />
								<span><?php echo $modal; ?></span>
							</label>
						</div>
					<?php endforeach ?>
				</div>
				<?php foreach ($data['questions'] as $q => $quest): ?>
					<div class="block quest">
						<span class="h3"><?php echo $quest['name'] ?></span>
						<?php foreach ($quest['answers'] as $a => $answer): ?>
							<div class="block-child">
								<label>
									<?php if (isset($answer['type'])): ?>
										<input type="<?php echo $answer['type'] ?>" checked="" />
									<?php endif ?>
									<span><?php echo $answer['name']; ?></span>
								</label>
							</div>
						<?php endforeach ?>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</section>
<style>
section{
	max-width: 991px;
	margin: 0 auto;
}
.image{
	margin: 0 auto;
	text-align: center;
}
.about{
	text-align: center;
}
.about table{
	margin: 0 auto;
}
.h3{
	font-weight: bold;
}
</style>