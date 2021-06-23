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
