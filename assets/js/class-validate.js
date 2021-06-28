export default class Validate {
	constructor() {
		Object.defineProperties(this, {
			errorMessages: {
				value: {
					name: {
						empty: 'お名前を入力してください',
					},
					email: {
						empty: 'メールアドレスを入力してください',
						invalid: 'メールアドレスの形式が正しくありません',
					},
					message: {
						empty: 'メッセージを入力してください',
					},
				},
			},
			fields: {
				value: {
					name: document.getElementById('name'),
					email: document.getElementById('email'),
					message: document.getElementById('message'),
				},
			},
		});

		const submitButton = document.getElementById('js-submit');
		if (submitButton) {
			submitButton.addEventListener('click', (e) => {
				const isValid = this.validate();

				isValid && this.send();
			});
		}
	}

	validate = () => {
		let isValid = true;
		for (const [property, elements] of Object.entries(this.fields)) {
			const errorElement = document.querySelector(`label[for="${property}"] > .contact-form__error`);
			if ('' === elements.value) {
				isValid = false;
				errorElement.textContent = this.errorMessages[property].empty;
				errorElement.setAttribute('aria-hidden', false);
				continue;
			}

			if ('email' === property && !this.emailIsValid(elements.value)) {
				isValid = false;
				errorElement.textContent = this.errorMessages[property].invalid;
				errorElement.setAttribute('aria-hidden', false);
				continue;
			}

			errorElement.setAttribute('aria-hidden', true);
		}

		return isValid;
	};

	emailIsValid = (email) => {
		return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
	};

	send = () => {
		console.log('send!!!');
	};
}
