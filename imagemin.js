const imagemin = require('imagemin-keep-folder');
const imageminMozjpeg = require('imagemin-mozjpeg');
const imageminPngquant = require('imagemin-pngquant');
const imageminGifsicle = require('imagemin-gifsicle');
// const imageminSvgo = require('imagemin-svgo')
const imageminWebp = require('imagemin-webp');

imagemin([process.argv[2]], {
	plugins: [
		imageminMozjpeg({ quality: 65 }),
		imageminPngquant(),
		imageminGifsicle(),
		// imageminSvgo(),
	],
	replaceOutputDir: (output) => {
		return output.replace(/\/src\//, '/dist/');
	},
}).then(() => {
	console.log('The image has been compressed.');
});

imagemin([process.argv[2]], {
	plugins: [imageminWebp({ quality: 75 })],
	replaceOutputDir: (output) => {
		return output.replace(/\/src\//, '/dist/');
	},
}).then(() => {
	console.log('The webp has been generated.');
});
