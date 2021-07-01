export default class Validate {
	constructor() {
		Object.defineProperties(this, {
			feedbacks: {
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
					submit: {
						failure: '送信に失敗しました。時間を置いて再度お試しいただくか、Twitterからご連絡ください。',
						success: '送信が完了しました。返信まで今しばらくお待ちくださいませ。',
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
		this.contactForm = document.getElementById('js-contact-form');
		this.submitButton = document.getElementById('js-submit');
		if (this.submitButton) {
			this.submitButton.addEventListener('click', (e) => {
				const isValid = this.validate();

				if (isValid) {
					this.changeSubmitButtonStatus('sending');
					this.send();
				}
			});
		}
	}

	validate = () => {
		let isValid = true;
		for (const [property, elements] of Object.entries(this.fields)) {
			const errorElement = document.querySelector(`.contact-form__error--${property}`);
			if ('' === elements.value) {
				this.showFeedbacks({ [property]: 'empty' });
				isValid = false;
				continue;
			}

			if ('email' === property && !this.emailIsValid(elements.value)) {
				isValid = false;
				this.showFeedbacks({ [property]: 'invalid' });
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
		const url = this.contactForm.getAttribute('action');
		const formData = new FormData(this.contactForm);
		formData.append('action', 'send_email');

		fetch(url, {
			method: 'POST',
			credentials: 'same-origin',
			body: formData,
		})
			.then((response) => {
				if (!response.ok) {
					console.log(response);
					throw new Error(response.statusText);
				}
				return response.json();
			})
			.then((status) => {
				this.showFeedbacks(status);
				if ('success' === status.submit) {
					this.resetForm();
					this.changeSubmitButtonStatus('success');
				} else {
					this.changeSubmitButtonStatus('default');
				}
			})
			.catch((error) => {
				this.showFeedbacks({ submit: 'failure' });
				this.changeSubmitButtonStatus('default');
			});
	};

	showFeedbacks = (errorObject) => {
		for (const [property, status] of Object.entries(errorObject)) {
			const errorElement = document.querySelector(`.contact-form__error--${property}`);
			errorElement.textContent = this.feedbacks[property][status];
			errorElement.setAttribute('aria-hidden', false);
		}
	};

	changeSubmitButtonStatus = (status) => {
		switch (status) {
			case 'default':
				this.submitButton.disabled = false;
				break;
			case 'sending':
				this.submitButton.disabled = true;
				break;
			case 'success':
				break;
		}
		this.submitButton.dataset.status = status;
	};

	resetForm = () => {
		this.contactForm.reset();
	};
}
