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
