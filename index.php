<?php $images = glob('./*.{jpg,png,gif,webp}', GLOB_BRACE); ?>
<!DOCTYPE html>
<html>
<head>
	<title>My photos</title>
	<meta charset="utf-8">
	<meta name="generator" content="https://github.com/cisoun/Galerie">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		:root { --gap: 3vw; }
		body {
			background-color: #fff;
			color: #000;
			margin: 0;
			user-select: none;
		}
		body.noscroll { overflow: hidden; }
		#grid {
			column-count: 1;
			column-gap: var(--gap);
			margin: auto;
			padding: calc(2 * var(--gap));
		}
		#grid img {
			cursor: zoom-in;
			height: auto;
			margin-bottom: var(--gap);
			width: 100%;
		}
		#modal {
			backdrop-filter: blur(1rem);
			background-color: #fffe;
			background-position: center;
			background-repeat: no-repeat;
			background-size: contain;
			cursor: zoom-out;
			display: none;
			height: 100%;
			justify-content: space-between;
			position: fixed;
			width: 100%;
		}
		#modal.visible { display: flex; }
		#modal a {
			cursor: pointer;
			font-size: 3rem;
			line-height: 100vh;
			text-align: center;
			width: 20%;
		}
		@media (prefers-color-scheme: dark) {
			body {
				background-color: #000;
				color: #fff;
			}
			#modal { background-color: #000e; }
		}
		@media only screen and (max-width: 600px) { #modal a { display: none; } }
		@media only screen and (min-width: 600px) { #grid { column-count: 2; } }
		@media only screen and (min-width: 992px) { #grid { column-count: 3; } }
	</style>
</head>
<body>
<div id="modal"><a>❮</a><a>❯</a></div>
<div id="grid">
<?php foreach ($images as $i): ?>
<img src="<?= ltrim($i, './') ?>" <?= getimagesize($i)[3] ?> loading="lazy"/>
<?php endforeach; ?>
</div>
<script type="text/javascript">
let current, touchX;
const show     = e => modal.style.backgroundImage = `url('${(current = e).src}')`;
const next     = _ => show(current.nextElementSibling     ?? grid.firstElementChild);
const previous = _ => show(current.previousElementSibling ?? grid.lastElementChild);
const toggle   = e => {
	document.body.classList.toggle('noscroll', modal.classList.toggle('visible'));
	show(e.srcElement);
}
Array.from(grid.children).map(e => e.onclick = toggle);
document.onkeydown = e => {
	if      (e.keyCode == 37) previous();
	else if (e.keyCode == 39) next();
}
modal.childNodes[0].onclick = e => { e.stopPropagation(); previous(); }
modal.childNodes[1].onclick = e => { e.stopPropagation(); next(); }
modal.onclick               = e => toggle(e);
modal.ontouchstart          = e => touchX = e.changedTouches[0].clientX;
modal.ontouchend            = e => {
	if      (e.changedTouches[0].clientX - touchX > +50) previous();
	else if (e.changedTouches[0].clientX - touchX < -50) next();
}
</script>
</body>
</html>