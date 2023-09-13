<?php
if (str_ends_with($_SERVER['REQUEST_URI'], '.jpg')) return false;
$images = glob('./img/*.jpg');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My photos</title>
	<style type="text/css">
		:root { --gap: 3vw; }
		body {
			border:           0;
			margin:           0;
			padding:          0;
		}
		body.noscroll { overflow: hidden; }
		div {
			column-count:     1;
			column-gap:       var(--gap);
			margin:           auto;
			padding:          calc(2 * var(--gap));
  		}
		img {
			cursor:           zoom-in;
			margin-bottom:    var(--gap);
			user-select:      none;
			width:            100%;
		}
		img.zoom {
			backdrop-filter:  blur(1rem);
			background-color: #fffc;
			cursor:           zoom-out;
			height:           calc(100% - 2 * var(--gap));
			left:             0;
			object-fit:       contain;
			padding:          var(--gap);
			position:         fixed;
			top:              0;
			width:            calc(100% - 2 * var(--gap));
			z-index:          1;
		}
		@media (prefers-color-scheme: dark) {
			body     { background-color: #111; }
			img.zoom { background-color: #000c; }
		}
		@media only screen and (min-width: 600px) { div { column-count: 2; } }
		@media only screen and (min-width: 992px) { div { column-count: 3; } }
	</style>
</head>
<body>
<div>
<?php foreach ($images as $image): ?>
	<img src="<?= ltrim($image, './') ?>" loading="lazy"/>
<?php endforeach; ?>
</div>
<script type="text/javascript">
let focused, touchX;
const container = document.querySelector('div');
const handleClick = (e) => {
	if      (focused && e.clientX <= window.innerWidth * 0.25) previous();
	else if (focused && e.clientX >= window.innerWidth * 0.75) next();
	else if (!zoom(e.target)) focused = null;
	document.body.classList.toggle('noscroll', focused);
}
const next = () => {
	zoom(focused);
	zoom(focused.nextElementSibling ?? container.firstElementChild);
}
const previous = () => {
	zoom(focused);
	zoom(focused.previousElementSibling ?? container.lastElementChild);
}
const zoom = (e) => {
	focused = e;
	return e.classList.toggle('zoom');
}
Array.from(container.children).map(e => e.onclick = handleClick);
document.onkeydown = (e) => {
	if      (e.keyCode == 37) previous();
	else if (e.keyCode == 39) next();
}
document.ontouchend = (e) => {
	if      (!focused) return;
    else if (e.changedTouches[0].clientX > touchX) previous();
    else if (e.changedTouches[0].clientX < touchX) next();
}
document.ontouchstart = (e) => touchX = e.changedTouches[0].clientX;
</script>
</body>
</html>