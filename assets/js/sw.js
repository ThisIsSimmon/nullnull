const CACHE_NAME = 'nullnull-2021-07-25';
const OFFLINE_URL = 'https://nullnull.dev/';
const urlsToCache = ['https://nullnull.dev/'];
const neverCacheUrls = [/\/wp-admin/, /\/wp-login/, /preview=true/, /\/cart/, /ajax/, /login/];
const checkNeverCacheList = (url) => {
	if (this.match(url)) {
		return false;
	}
	return true;
};

self.addEventListener('install', function (event) {
	event.waitUntil(
		caches.open(CACHE_NAME).then(function (cache) {
			return cache.addAll(urlsToCache);
		})
	);
});

self.addEventListener('activate', (event) => {
	event.waitUntil(
		caches
			.keys()
			.then((keys) =>
				Promise.all(
					keys.map((key) => {
						if (CACHE_NAME !== key) {
							return caches.delete(key);
						}
					})
				)
			)
			.then(() => {
				self.clients.claim();
			})
	);
});

self.addEventListener('fetch', function (e) {
	if (!e.request.url.match(/^(http|https):\/\//i)) {
		return;
	}

	if (new URL(e.request.url).origin !== location.origin) {
		return;
	}

	if (!neverCacheUrls.every(checkNeverCacheList, e.request.url)) {
		return;
	}
	if (!neverCacheUrls.every(checkNeverCacheList, e.request.referrer)) {
		return;
	}

	if (e.request.referrer.match(/^(wp-admin):\/\//i)) {
		return;
	}

	if (e.request.method !== 'GET') {
		e.respondWith(
			fetch(e.request).catch(function () {
				return caches.match(OFFLINE_URL);
			})
		);
		return;
	}

	if (e.request.mode === 'navigate' && navigator.onLine) {
		e.respondWith(
			fetch(e.request).then(function (response) {
				return caches.open(CACHE_NAME).then(function (cache) {
					cache.put(e.request, response.clone());
					return response;
				});
			})
		);
		return;
	}

	e.respondWith(
		caches
			.match(e.request)
			.then(function (response) {
				return (
					response ||
					fetch(e.request).then(function (response) {
						return caches.open(CACHE_NAME).then(function (cache) {
							cache.put(e.request, response.clone());
							return response;
						});
					})
				);
			})
			.catch(function () {
				return caches.match(OFFLINE_URL);
			})
	);
});
