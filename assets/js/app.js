import Validate from './class-validate.js';

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

new Validate();

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
