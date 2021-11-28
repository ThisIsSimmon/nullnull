import Validate from './class-validate.js';
import URLAnimation from './class-url-animation.js';
import { l as i } from './budoux.js';

new Validate();
if (!document.body.classList.contains('logged-in')) {
	new URLAnimation();
}

MicroModal.init({
	onShow: (modal) => {
		document.getElementById('js-menu-open').classList.add('active');
	},
	onClose: (modal) => {
		document.getElementById('js-menu-open').classList.remove('active');
	},
	disableScroll: true,
	disableFocus: true,
	awaitCloseAnimation: true,
});

const scrollIndicator = document.querySelector('.scroll-indicator');
if (scrollIndicator) {
	gsap.registerPlugin(ScrollTrigger);
	gsap.to('.scroll-indicator', {
		value: 100,
		ease: 'none',
		scrollTrigger: { scrub: 0.3 },
	});
}

if ('serviceWorker' in navigator && 'localhost' !== window.location.hostname) {
	window.addEventListener('load', function () {
		navigator.serviceWorker.register('/sw.js').then(
			function (registration) {
				console.log('ServiceWorker registration successful with scope: ', registration.scope);
			},
			function (err) {
				console.log('ServiceWorker registration failed: ', err);
			}
		);
	});
}

mediumZoom('.wp-block-image > img', {
	margin: 24,
	background: '#292d3d',
	scrollOffset: 0,
});

const parser = i();
const formatTitle = (titles) => {
	if (!!titles) {
		for (const title of titles) {
			const text = title.textContent;
			const array = parser.parse(text);
			const newTitle = array.join('<wbr />');
			title.innerHTML = newTitle;
		}
	}
};
formatTitle(document.querySelectorAll('.entry-header__title--blog, .blog-card__title > a'));
