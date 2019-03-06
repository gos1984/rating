<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="logo"><a href="https://mrororr.ru/"><img src="<?php echo PATH_TPL ?>img/logo-white.png" alt=""/></a></div>
				<div class="logo"><a href="http://medradiology.moscow/"><img src="<?php echo PATH_TPL ?>img/logo-radiology-white.png" alt=""/></a></div>
				<div class="copyright"><span>© <?php echo date("Y") ?> Московское Региональное Отделение Российского Общества Рентгенологов и Радиологов</span></div>
			</div>
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="contacts"><span class="h3">НАШИ КОНТАКТЫ:</span><a href="tel:+74952760436">+7 (495) 276-04-36</a><a href="mailto:info@topld.ru">info@topld.ru</a></div>
				<!--           <div class="contacts"><span class="h3">FOLLOW US</span><a href="https://www.facebook.com/mrororr.moscow/">Facebook</a><a href="https://vk.com/mrororr.moscow">Vkontakte</a></div> -->
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 right">
				<!-- Yandex.Metrika informer -->
				<a href="https://metrika.yandex.ru/stat/?id=48921551&amp;from=informer"
				target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/48921551/3_0_FFFFFFFF_EFEFEFFF_0_pageviews"
				style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="48921551" data-lang="ru" /></a>
				<!-- /Yandex.Metrika informer -->

				<!-- Yandex.Metrika counter -->
				<script type="text/javascript" >
					(function (d, w, c) {
						(w[c] = w[c] || []).push(function() {
							try {
								w.yaCounter48921551 = new Ya.Metrika({
									id:48921551,
									clickmap:true,
									trackLinks:true,
									accurateTrackBounce:true
								});
							} catch(e) { }
						});

						var n = d.getElementsByTagName("script")[0],
						s = d.createElement("script"),
						f = function () { n.parentNode.insertBefore(s, n); };
						s.type = "text/javascript";
						s.async = true;
						s.src = "https://mc.yandex.ru/metrika/watch.js";

						if (w.opera == "[object Opera]") {
							d.addEventListener("DOMContentLoaded", f, false);
						} else { f(); }
					})(document, window, "yandex_metrika_callbacks");
				</script>
				<noscript><div><img src="https://mc.yandex.ru/watch/48921551" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
				<!-- /Yandex.Metrika counter -->
			</div>
		</div>
	</div>
</footer>
<div class="popup">
	<form id="account" class="modal_form" action="javascript:void(null);" onsubmit="verification('#account','/auth','/quests')">
		<div class="logo"><img src="<?php echo PATH_TPL ?>/img/logo.png" alt=""/></div>
		<label for="email1">
			<input id="email1" type="email" name="email" required="" placeholder="Адрес электронной почты"/>
		</label>
		<label for="password1">
			<input id="password1" type="password" name="password" required="" placeholder="Пароль"/>
		</label>
		<button>Войти</button>
		<div class="result"></div>
		<a href="#registr" class="block fancybox">Зарегистрироваться</a>
		<a href="#forgot" class="block fancybox">Восстановить пароль</a>
	</form>
	<form id="registr" class="modal_form" action="javascript:void(null);" onsubmit="verification('#registr','/registr')">
		<div class="logo"><img src="<?php echo PATH_TPL ?>/img/logo.png" alt=""/></div>
		<label for="email2">
			<input id="email2" type="email" name="email" required="" placeholder="Адрес электронной почты"/>
		</label>
		<label for="password3">
			<input id="password3" type="password" name="password" required="" placeholder="Пароль" pattern="\w{6,}" title="Не менее 6 символов"/>
		</label>
		<label for="password4">
			<input id="password4" type="password" name="password-repeat" required="" placeholder="Повторите пароль" pattern="\w{6,}" title="Не менее 6 символов"/>
		</label>
		<button>Зарегистрироваться</button>
		<div class="result"></div>
		<a href="#account" class="fancybox block">Авторизация</a>
		<a href="#forgot" class="fancybox block">Восстановить пароль</a>
	</form>
	<form id="forgot" class="modal_form" action="javascript:void(null);" onsubmit="verification('#forgot','/forgot')">
		<div class="logo"><img src="<?php echo PATH_TPL ?>/img/logo.png" alt=""/></div>
		<label for="email3">
			<input id="email3" type="email" name="email" required="" placeholder="Адрес электронной почты"/>
		</label>
		<button>Восстановить</button>
		<a href="#account" class="fancybox block">Войти в аккаунт</a>
		<a href="#registr" class="fancybox block">Зарегистрироваться</a>
	</form>
</div>
<script src="<?php echo PATH_TPL; ?>/js/main.js"></script>
</body>
</html>