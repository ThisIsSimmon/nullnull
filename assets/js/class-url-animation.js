export default class URLAnimation {
	constructor() {
		this.isAnimatable = true;
		this.session = window.sessionStorage;
		const isUrlAnimationExecuted = this.session.getItem('isUrlAnimationExecuted');

		const mq = window.matchMedia('(max-width: 768px)');
		if (mq.matches || isUrlAnimationExecuted) {
			return;
		}
		this.distance = '_';
		this.distanceToTheLoveHotel = this.distance.repeat(23);
		this.hotel = '🏩';
		this.man = '👨';
		this.woman = '👩';
		this.animation().then(() => {
			this.stop();
		});
	}

	async stop() {
		this.isAnimatable = false;
		await this.sleep(1000);
		this.clearHash();
		this.session.setItem('isUrlAnimationExecuted', 'true');
	}

	afterDinner() {
		return new Promise((resolve) => {
			if (this.isAnimatable) {
				location.hash = `${this.hotel}${this.distanceToTheLoveHotel}${this.man}${this.woman}`;
			}
			resolve();
		});
	}

	walkingToTheLoveHotel() {
		return new Promise((resolve) => {
			const walkingDistanceCount = this.distanceToTheLoveHotel.length - 2;
			let count = 1;
			const animation = setInterval(() => {
				if (!this.isAnimatable) {
					clearInterval(animation);
				}
				this.distanceToTheLoveHotel = this.distanceToTheLoveHotel.slice(0, -1);
				location.hash = `${this.hotel}${this.distanceToTheLoveHotel}${this.man}${this.woman}`;
				count++;
				if (count > walkingDistanceCount) {
					clearInterval(animation);
					resolve();
				}
			}, 75);
		});
	}

	goInside() {
		return new Promise((resolve) => {
			const animation = setInterval(() => {
				if (!this.isAnimatable) {
					clearInterval(animation);
				}
				if (this.distanceToTheLoveHotel.length === 0) {
					location.hash = `${this.hotel}`;
					clearInterval(animation);
					resolve();
				} else {
					this.distanceToTheLoveHotel = this.distanceToTheLoveHotel.slice(0, -1);
					location.hash = `${this.hotel}${this.distanceToTheLoveHotel}${this.man}${this.woman}`;
				}
			}, 200);
		});
	}

	haveSex() {
		return new Promise((resolve) => {
			const love = [`${this.man}💕____💕${this.woman}`, `${this.man}_💕__💕_${this.woman}`, `${this.man}___💕___${this.woman}`];
			let count = love.length;
			const animation = setInterval(() => {
				if (!this.isAnimatable) {
					clearInterval(animation);
				}

				location.hash = `${this.hotel}${love[count % love.length]}`;
				count++;
				if (count === love.length * 10) {
					location.hash = `${this.hotel}${this.man}_✨💖✨_${this.woman}`;
					clearInterval(animation);
					resolve();
				}
			}, 200);
		});
	}

	sleeping() {
		return new Promise((resolve) => {
			const sleep = ['🌙🛏💑', '🌙🛏💑💤', '🌙🛏💑💤💤', '🌙🛏💑💤💤💤'];
			let count = sleep.length;
			const animation = setInterval(() => {
				if (!this.isAnimatable) {
					clearInterval(animation);
				}

				location.hash = `${this.hotel}${sleep[count % sleep.length]}`;
				count++;
				if (count === sleep.length * 4) {
					location.hash = `${this.hotel}🌙🛏💑💤💤💤`;
					clearInterval(animation);
					resolve();
				}
			}, 500);
		});
	}

	goodMorning() {
		return new Promise((resolve) => {
			const sun = ['☁', '🌥', '⛅', '🌤', '☀'];
			let count = 0;
			const animation = setInterval(() => {
				if (!this.isAnimatable) {
					clearInterval(animation);
				}

				location.hash = `${this.hotel}${sun[count]}`;
				count++;
				if (count === sun.length) {
					clearInterval(animation);
					resolve();
				}
			}, 500);
		});
	}

	goOutside() {
		return new Promise((resolve) => {
			const couple = [`${this.woman}`, `💘${this.woman}`, `${this.man}💘${this.woman}`];
			let count = 0;
			const animation = setInterval(() => {
				if (!this.isAnimatable) {
					clearInterval(animation);
				}

				location.hash = `${this.hotel}${couple[count]}`;
				count++;
				if (count === couple.length) {
					clearInterval(animation);
					resolve();
				}
			}, 250);
		});
	}

	seeYouOff() {
		return new Promise((resolve) => {
			const walkingDistanceCount = 21;
			let count = 1;
			const animation = setInterval(() => {
				if (!this.isAnimatable) {
					clearInterval(animation);
				}

				this.distanceToTheLoveHotel = this.distance.repeat(count);
				location.hash = `${this.hotel}${this.distanceToTheLoveHotel}${this.man}💘${this.woman}`;
				count++;
				if (count > walkingDistanceCount) {
					clearInterval(animation);
					resolve();
				}
			}, 75);
		});
	}

	goodbye() {
		return new Promise((resolve) => {
			if (this.isAnimatable) {
				location.hash = `${this.hotel}${this.distanceToTheLoveHotel}${this.man}👋${this.woman}`;
			}
			resolve();
		});
	}

	goHomeOnATrain() {
		return new Promise((resolve) => {
			const tracks = '__~';
			let count = 1;
			const animation = setInterval(() => {
				if (!this.isAnimatable) {
					clearInterval(animation);
				}

				location.hash = `${this.hotel}${this.distanceToTheLoveHotel}${this.man}${tracks.repeat(count)}${this.woman}🚃`;
				count++;
				if (count > 20) {
					clearInterval(animation);
					resolve();
				}
			}, 200);
		});
	}

	sleep(msec) {
		return new Promise((r) => setTimeout(r, msec));
	}

	clearHash() {
		history.replaceState(null, null, ' ');
	}

	async animation() {
		await this.afterDinner();
		await this.sleep(400);
		await this.walkingToTheLoveHotel();
		await this.sleep(300);
		await this.goInside();
		await this.sleep(700);
		await this.haveSex();
		await this.sleep(1000);
		await this.sleeping();
		await this.sleep(1000);
		await this.goodMorning();
		await this.sleep(700);
		await this.goOutside();
		await this.sleep(400);
		await this.seeYouOff();
		await this.sleep(600);
		await this.goodbye();
		await this.sleep(600);
		await this.goHomeOnATrain();
		await this.sleep(1500);
	}
}
