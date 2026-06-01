(function () {
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('kworkCartForm');
    if (!form) return;

    // Popup (создадим один раз)
    function ensurePopup() {
      let el = document.querySelector('.kworkToast');
      if (el) return el;

      el = document.createElement('div');
      el.className = 'kworkToast';
      el.setAttribute('role', 'status');
      el.setAttribute('aria-live', 'polite');
      el.innerHTML = `
        <div class="kworkToast__inner">
          <div class="kworkToast__title">Добавлено в корзину</div>
          <a class="kworkToast__btn" href="${(window.wc_cart_params && wc_cart_params.cart_url) ? wc_cart_params.cart_url : '/cart/'}">Перейти в корзину →</a>
        </div>
      `;
      document.body.appendChild(el);
      return el;
    }

    let toastTimer = null;
    function showToast() {
      const toast = ensurePopup();
      toast.classList.add('is-show');
      clearTimeout(toastTimer);
      toastTimer = setTimeout(() => toast.classList.remove('is-show'), 2600);
    }

    // Обновление fragments (как Woo)
    function replaceFragments(fragments) {
      if (!fragments) return;
      Object.keys(fragments).forEach((selector) => {
        const html = fragments[selector];
        const node = document.querySelector(selector);
        if (node) {
          // заменяем целиком узел
          const tmp = document.createElement('div');
          tmp.innerHTML = html;
          const fresh = tmp.firstElementChild;
          if (fresh) node.replaceWith(fresh);
        }
      });
    }

    // Собираем variation attributes (если понадобятся)
    function getVariationPayload() {
      // У тебя выбор вариации идет через radio, и variation_id уже в hidden.
      // Если тебе нужно передавать attributes (attribute_pa_paket и т.д.) — добавим позже.
      return {};
    }

    form.addEventListener('submit', async function (e) {
      e.preventDefault();

      const productId = form.querySelector('input[name="add-to-cart"]')?.value;
      const variationId = form.querySelector('#kwork_variation_id')?.value || '';
      const buyBtn = document.getElementById('kworkBuyBtn');

      if (!productId) return;

      // если вариативный и не выбрана вариация — не отправляем
      if (buyBtn && buyBtn.disabled) return;

      if (buyBtn) {
        buyBtn.disabled = true;
        buyBtn.classList.add('is-loading');
      }

      const fd = new FormData();
      fd.append('action', 'kwork_add_to_cart');
      fd.append('nonce', (window.KWORK_CART && KWORK_CART.nonce) ? KWORK_CART.nonce : '');
      fd.append('product_id', productId);
      fd.append('quantity', '1');

      if (variationId) {
        fd.append('variation_id', variationId);

        const variationObj = getVariationPayload();
        Object.keys(variationObj).forEach((k) => {
          fd.append(`variation[${k}]`, variationObj[k]);
        });
      }

      try {
        const res = await fetch((window.KWORK_CART && KWORK_CART.ajaxurl) ? KWORK_CART.ajaxurl : '/wp-admin/admin-ajax.php', {
          method: 'POST',
          credentials: 'same-origin',
          body: fd
        });

        const data = await res.json();

        if (data && data.success) {
          replaceFragments(data.data.fragments);
          showToast();
        } else {
          // если вернул notices — можно показать их
          console.warn('AJAX add to cart error:', data);
          alert((data && data.data && data.data.message) ? data.data.message : 'Ошибка добавления в корзину');
        }
      } catch (err) {
        console.error(err);
        alert('Ошибка сети. Попробуйте ещё раз.');
      } finally {
        if (buyBtn) {
          buyBtn.disabled = false;
          buyBtn.classList.remove('is-loading');
        }
      }
    });
  });
})();
