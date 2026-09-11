(function () {
	'use strict';

	function initGallery() {
		var gallery = document.querySelector('[data-plugin-gallery]');
		if (!gallery) return;
		gallery.querySelectorAll('[data-plugin-thumb]').forEach(function (button) {
			button.addEventListener('click', function () {
				var index = button.getAttribute('data-plugin-thumb');
				gallery.querySelectorAll('[data-plugin-slide]').forEach(function (slide) {
					slide.classList.toggle('is-active', slide.getAttribute('data-plugin-slide') === index);
				});
				gallery.querySelectorAll('[data-plugin-thumb]').forEach(function (thumb) {
					thumb.classList.toggle('is-active', thumb === button);
				});
			});
		});
	}

	function initOrderForm() {
		var modal = document.getElementById('pluginOrderModal');
		if (!modal) return;
		var form = modal.querySelector('[data-plugin-order-form]');
		var status = form.querySelector('.pluginOrderForm__status');
		var lastFocus = null;

		function openModal(event) {
			lastFocus = event.currentTarget;
			modal.classList.add('is-open');
			modal.setAttribute('aria-hidden', 'false');
			document.documentElement.style.overflow = 'hidden';
			setTimeout(function () { form.querySelector('input[name="name"]').focus(); }, 50);
		}

		function closeModal() {
			modal.classList.remove('is-open');
			modal.setAttribute('aria-hidden', 'true');
			document.documentElement.style.overflow = '';
			if (lastFocus) lastFocus.focus();
		}

		document.querySelectorAll('.js-plugin-order-open').forEach(function (button) { button.addEventListener('click', openModal); });
		modal.querySelectorAll('[data-plugin-order-close]').forEach(function (button) { button.addEventListener('click', closeModal); });
		document.addEventListener('keydown', function (event) { if (event.key === 'Escape' && modal.classList.contains('is-open')) closeModal(); });

		form.addEventListener('submit', function (event) {
			event.preventDefault();
			var submit = form.querySelector('button[type="submit"]');
			submit.disabled = true;
			status.className = 'pluginOrderForm__status';
			status.textContent = 'Отправляю заявку…';
			fetch(window.wpdsPluginLanding.ajaxUrl, { method: 'POST', body: new FormData(form), credentials: 'same-origin' })
				.then(function (response) { return response.json(); })
				.then(function (result) {
					if (!result.success) throw new Error(result.data && result.data.message ? result.data.message : 'Не удалось отправить заявку.');
					form.classList.add('is-sent');
					status.classList.add('is-success');
					status.textContent = result.data.message;
				})
				.catch(function (error) {
					status.classList.add('is-error');
					status.textContent = error.message;
					submit.disabled = false;
				});
		});
	}

	document.addEventListener('DOMContentLoaded', function () { initGallery(); initOrderForm(); });
}());
