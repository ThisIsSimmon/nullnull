WebFontConfig = {
	google: {
		families: ['M+PLUS+Rounded+1c:400,500,700', 'Quicksand:500,700'],
	},
	active: function () {
		sessionStorage.fonts = true;
	},
};

(function (d) {
	const wf = d.createElement('script'),
		s = d.scripts[0];
	wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
	wf.async = true;
	s.parentNode.insertBefore(wf, s);
})(document);
