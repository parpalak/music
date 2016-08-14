<?php

$titles = [
	'ru' => [
		'Фейнман',
		'Я помню',
		'Колыбельная',
		'Дождливый вечер',
		'Малая Медведица',
		'Большая Медведица',
		'В другой Вселенной',
		'Океан на Энцеладе',
		'Маятник',
		'Мечты о завтрашнем дне',
		'Ель',
		'Новый день',
	],
	'en' => [
		'Feynman',
		'I Remember',
		'Lullaby',
		'Rainy Night',
		'Ursa Minor',
		'Ursa Major',
		'In Another Universe',
		'Ocean on Enceladus',
		'Balance Wheel',
		'Dreaming of Tomorrow',
		'Spruce',
		'New Day',
	]
];

$i18n = [
	'ru' => [
		'title'           => 'Большая медведица - Роман Парпалак',
		'copyright'       => '© <a href="http://written.ru/">Роман Парпалак</a>, 2014&ndash;2016.',
		'author'          => 'Роман Парпалак',
		'album'           => 'Композиции альбома «Большая медведица»',
		'title-twitter'   => 'Твитнуть',
		'title-facebook'  => 'Лайкнуть',
		'title-vkontakte' => 'Поделиться',
	],
	'en' => [
		'title'           => 'Ursa Major - Roman Parpalak',
		'copyright'       => '© 2014&ndash;2016 <a href="http://written.ru/">Roman Parpalak</a>',
		'author'          => 'Roman Parpalak',
		'album'           => 'Album “Ursa Minor”',
		'title-twitter'   => 'Tweet',
		'title-facebook'  => 'Share',
		'title-vkontakte' => 'Share in VK',
	]
];

$locale = function_exists('locale_accept_from_http') ? locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']) : '';
if ($locale) {
	$locale = substr($locale, 0, 2);
}
if (!in_array($locale, ['ru', 'en'])) {
	$locale = 'en';
}

function __ ($key) {
	global $locale, $i18n;

	return $i18n[$locale][$key];
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Ursa Major - Roman Parpalak</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo __('album'), ': ', implode(', ', $titles[$locale]); ?>.">

<link rel="stylesheet" href="../jouele/jouele.css">
<!--<link rel="stylesheet" href="/_styles/written_ru/social-likes/social-likes_flat.css">-->
<link rel="stylesheet" href="um.css">

<script src="/jouele/jquery.js"></script>
<script src="../jouele/jquery.jplayer.min.js"></script>
<script src="../jouele/jouele2.js"></script>

<script>
$(function () {
	var titles = <?php echo json_encode($titles, JSON_UNESCAPED_UNICODE); ?>,
		i18n   = <?php echo json_encode($i18n, JSON_UNESCAPED_UNICODE); ?>,
		locale = <?php echo json_encode($locale, JSON_UNESCAPED_UNICODE); ?>;

	var $langSwitch = $('.lang-switch .link').click(function () {
		var lang = $(this).attr('data-lang');
		setLang(lang);
		if (isLocalStorage()){
			localStorage.setItem('jplocale', lang);
		}

		return false;
	});

	function setLang (lang) {
		if (Array.prototype.indexOf && ['ru', 'en'].indexOf(lang) == -1) {
			lang = 'en';
		}

		$langSwitch.removeClass('current').filter('[data-lang="' + lang + '"]').addClass('current');

		$('.title,.jouele-control-text').each(function (i, item) {
			$(item).text(titles[lang][i]);
		});

		document.title = i18n[lang]['title'];
		$('.copyright-text').html(i18n[lang]['copyright']);
		$.each(['vkontakte', 'twitter', 'facebook'], function (i, c) {
			$('.social-likes__widget_' + c).attr('title', i18n[lang]['title-' + c]);
		});
	}

	function isLocalStorage() {
		try {
			return 'localStorage' in window && window['localStorage'] !== null;
		} catch (e) {
			return false;
		}
	}

	if (isLocalStorage()) {
		var savedLocale = localStorage.getItem('jplocale');
		if (savedLocale) {
			locale = savedLocale;
		}
	}
	setLang(locale);
});
</script>
</head>

<body>
	<div class="wrap">
		<div class="cover">
			<img src="/pictures/music/ursa_major_800.jpg" alt="" /></a>
		</div>

		<div class="lang-switch">
			<a href="#en" data-lang="en" class="link">EN</a>
			<a href="#ru" data-lang="ru" class="link">RU</a>
		</div>

		<div class="text">
			<ul class="list jouele-playlist" data-space-control="true">
				<li>
					<a
						href="/download/mp3/Roman%20Parpalak%20-%20Feynman.mp3"
						data-ogg="/download/ogg/Roman%20Parpalak%20-%20Feynman.ogg"
						class="jouele title"
						data-hide-timeline-on-pause="true"
						data-length="3:50"
					></a>
				</li>
				<li>
					<a
						href="/download/mp3/Roman%20Parpalak%20-%20I%20Remember.mp3"
						data-ogg="/download/ogg/Roman%20Parpalak%20-%20I%20Remember.ogg"
						class="jouele title"
						data-hide-timeline-on-pause="true"
						data-length="4:05"
					></a>
				</li>
				<li>
					<span class="title"></span>
				</li>
				<li>
					<a
						href="/download/mp3/Roman%20Parpalak%20-%20Rainy%20Night.mp3"
						data-ogg="/download/ogg/Roman%20Parpalak%20-%20Rainy%20Night.ogg"
						class="jouele title"
						data-hide-timeline-on-pause="true"
						data-length="3:27"
					></a>
				</li>
				<li>
					<a
						href="/download/mp3/Roman%20Parpalak%20-%20Ursa%20Minor.mp3"
						data-ogg="/download/ogg/Roman%20Parpalak%20-%20Ursa%20Minor.ogg"
						class="jouele title"
						data-hide-timeline-on-pause="true"
						data-length="3:36"
					></a>
				</li>
				<li>
					<span class="title"></span>
				</li>
				<li>
					<a
						href="/download/mp3/Roman%20Parpalak%20-%20In%20Another%20Universe.mp3"
						data-ogg="/download/ogg/Roman%20Parpalak%20-%20In%20Another%20Universe.ogg"
						class="jouele title"
						data-hide-timeline-on-pause="true"
						data-length="2:36"
					></a>
				</li>
				<li>
					<a
						href="/download/mp3/Roman%20Parpalak%20-%20Ocean%20on%20Enceladus.mp3"
						data-ogg="/download/ogg/Roman%20Parpalak%20-%20Ocean%20on%20Enceladus.ogg"
						class="jouele title"
						data-hide-timeline-on-pause="true"
						data-length="2:52"
					></a>
				</li>
				<li>
					<a
						href="/download/mp3/Roman%20Parpalak%20-%20Balance%20Wheel.mp3"
						data-ogg="/download/ogg/Roman%20Parpalak%20-%20Balance%20Wheel.ogg"
						class="jouele title"
						data-hide-timeline-on-pause="true"
						data-length="3:48"
					></a>
				</li>
				<li>
					<a
						href="/download/mp3/Roman%20Parpalak%20-%20Dreaming%20of%20Tomorrow.mp3"
						data-ogg="/download/ogg/Roman%20Parpalak%20-%20Dreaming%20of%20Tomorrow.ogg"
						class="jouele title"
						data-hide-timeline-on-pause="true"
						data-length="4:11"
					></a>
				</li>
				<li>
					<a
						href="/download/mp3/Roman%20Parpalak%20-%20Spruce.mp3"
						data-ogg="/download/ogg/Roman%20Parpalak%20-%20Spruce.ogg"
						class="jouele title"
						data-hide-timeline-on-pause="true"
						data-length="1:00"
					></a>
				</li>
				<li>
					<a
						href="/download/mp3/Roman%20Parpalak%20-%20New%20Day.mp3"
						data-ogg="/download/ogg/Roman%20Parpalak%20-%20New%20Day.ogg"
						class="jouele title"
						data-hide-timeline-on-pause="true"
						data-length="2:31"
					></a>
				</li>
			</ul>
		</div>

		<div class="copyright">
			<span class="copyright-text"></span>

			<!--<div class="social-likes social-likes_flat" data-zeroes="yes">-->
			<!--	<div class="facebook">&nbsp;</div>-->
			<!--	<div class="twitter" data-via="r_parpalak">&nbsp;</div>-->
			<!--	<div class="vkontakte">&nbsp;</div>-->
			<!--</div>-->
		</div>
	</div>
	<!--<script src="/_styles/written_ru/social-likes/social-likes.min.js"></script>-->
	<script>
		new Image().src = "//counter.yadro.ru/hit?r"+escape(document.referrer)+((typeof(screen)=="undefined")?"":";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+";h"+escape(document.title.substring(0,80))+";"+Math.random();
	</script>
</body>
</html>
