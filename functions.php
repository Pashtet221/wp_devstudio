<?php
/**
 * Подключение только CSS для главной страницы.
 * JS из исходного сайта убран, чтобы не вызывал client-side error.
 */

function itb_company_asset_version($relative_path) {
    $file_path = get_stylesheet_directory() . '/' . ltrim($relative_path, '/');

    return file_exists($file_path) ? (string) filemtime($file_path) : null;
}

function itb_company_clean_enqueue_assets() {
    $theme_uri = get_template_directory_uri();

    $style_files = [
        '94e1dadf2106e4cc.css',
        '6c03dfe331e53e31.css',
        'a7f7c406d0b944bc.css',
        'e91c5d28e481d74a.css',
        'd39dc04b3f877cc1.css',
        '128003f9ca2ca265.css',
        'a75b29b020565b28.css',
        '1fa3ea36f4a6032d.css',
        'd3b2c8798c3c896b.css',
        '5dd23e6840adf311.css',
        '57c639a8883faf4a.css',
        '79d7aa296eba0789.css',
        '8ebba0db187e5949.css',
        '86af2410ea4762c9.css',
    ];

    foreach ($style_files as $file_name) {
        $relative_path = 'assets/css/' . $file_name;

        wp_enqueue_style(
            'itb-' . sanitize_title($file_name),
            $theme_uri . '/' . $relative_path,
            [],
            itb_company_asset_version($relative_path)
        );
    }

    wp_enqueue_style(
        'itb-company-style',
        get_stylesheet_directory_uri() . '/style.css',
        [],
        itb_company_asset_version('style.css')
    );
}

add_action( 'wp_enqueue_scripts', 'itb_company_clean_enqueue_assets' );



function itb_company_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('post-thumbnails', ['post']);

    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
}
add_action('after_setup_theme', 'itb_company_theme_setup');



add_action('init', function () {
  if (post_type_exists('case')) {
    add_post_type_support('case', 'excerpt');
  }
});




add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css',
        [],
        '6.5.2'
    );
});



add_filter('big_image_size_threshold', '__return_false');




function itb_company_assets() {
    wp_enqueue_style(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css',
        [],
        '9'
    );

    wp_enqueue_script(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js',
        [],
        '9',
        true
    );

    if (file_exists(get_stylesheet_directory() . '/assets/js/main-services-slider.js')) {
        wp_enqueue_script(
            'itb-main-services-slider',
            get_stylesheet_directory_uri() . '/assets/js/main-services-slider.js',
            ['swiper'],
            itb_company_asset_version('assets/js/main-services-slider.js'),
            true
        );
    }
}
add_action( 'wp_enqueue_scripts', 'itb_company_assets' );









function wpds_theme_seo_plugin_active() {
    return defined('WPSEO_VERSION')
        || defined('RANK_MATH_VERSION')
        || defined('SEOPRESS_VERSION')
        || defined('AIOSEO_VERSION');
}

function wpds_theme_get_meta_description() {
    if (is_singular()) {
        $post_id = get_queried_object_id();
        $description = get_post_meta($post_id, '_yoast_wpseo_metadesc', true);

        if (!$description) {
            $description = get_post_meta($post_id, 'seo_description', true);
        }

        if (!$description && has_excerpt($post_id)) {
            $description = get_the_excerpt($post_id);
        }

        if (!$description) {
            $description = wp_strip_all_tags(get_post_field('post_content', $post_id));
        }
    } elseif (is_category() || is_tag() || is_tax()) {
        $description = term_description();
    } else {
        $description = get_bloginfo('description');
    }

    if (!$description) {
        $description = 'Разработка, поддержка и доработка сайтов на WordPress и WooCommerce: лендинги, интернет-магазины, плагины, интеграции и SEO-структура.';
    }

    return wp_trim_words(wp_strip_all_tags($description), 28, '');
}

function wpds_theme_get_share_image() {
    if (is_singular() && has_post_thumbnail()) {
        return get_the_post_thumbnail_url(get_queried_object_id(), 'large');
    }

    $custom_logo_id = get_theme_mod('custom_logo');
    if ($custom_logo_id) {
        return wp_get_attachment_image_url($custom_logo_id, 'full');
    }

    return get_template_directory_uri() . '/images/favicon.ico';
}

function wpds_theme_current_url() {
    if (is_singular()) {
        return get_permalink();
    }

    if (is_front_page() || is_home()) {
        return home_url('/');
    }

    if (is_category() || is_tag() || is_tax()) {
        $term = get_queried_object();
        return ($term && !is_wp_error($term)) ? get_term_link($term) : home_url('/');
    }

    if (is_post_type_archive()) {
        return get_post_type_archive_link(get_query_var('post_type'));
    }

    return home_url(add_query_arg([], $GLOBALS['wp']->request ?? ''));
}

function wpds_theme_output_seo_meta() {
    if (wpds_theme_seo_plugin_active()) {
        return;
    }

    $description = wpds_theme_get_meta_description();
    $title = wp_get_document_title();
    $url = wpds_theme_current_url();
    $image = wpds_theme_get_share_image();
    $type = is_singular('post') ? 'article' : 'website';

    echo '<meta name="description" content="' . esc_attr($description) . '" />' . "\n";
    echo '<meta property="og:locale" content="ru_RU" />' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '" />' . "\n";
    echo '<meta property="og:type" content="' . esc_attr($type) . '" />' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '" />' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '" />' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '" />' . "\n";

    if ($image) {
        echo '<meta property="og:image" content="' . esc_url($image) . '" />' . "\n";
        echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
    } else {
        echo '<meta name="twitter:card" content="summary" />' . "\n";
    }

    echo '<meta name="twitter:title" content="' . esc_attr($title) . '" />' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($description) . '" />' . "\n";

    if (!is_singular()) {
        echo '<link rel="canonical" href="' . esc_url($url) . '" />' . "\n";
    }

    if (is_front_page()) {
        $organization_schema = [
            '@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            'name' => get_bloginfo('name'),
            'url' => home_url('/'),
            'email' => 'info@wpdevstudio.ru',
            'telephone' => '+7 925 040-41-89',
            'areaServed' => 'RU',
            'sameAs' => [
                'https://t.me/+79250404189',
                'https://wa.me/79250404189',
            ],
        ];

        echo '<script type="application/ld+json">' . wp_json_encode($organization_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }
}
add_action('wp_head', 'wpds_theme_output_seo_meta', 2);

add_filter('wp_robots', function ($robots) {
    $robots['max-image-preview'] = 'large';

    if (is_search() || is_404()) {
        unset($robots['index']);
        $robots['noindex'] = true;
        $robots['follow'] = true;
    }

    return $robots;
});

add_action('wp_head', function () {
  ?>
  <!-- Yandex.Metrika counter -->
  <script type="text/javascript">
    (function(m,e,t,r,i,k,a){
      m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
      m[i].l=1*new Date();
      for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
      k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
    })(window, document,'script','https://mc.yandex.ru/metrika/tag.js?id=105971907', 'ym');

    ym(105971907, 'init', {
      webvisor:true,
      clickmap:true,
      accurateTrackBounce:true,
      trackLinks:true,
      accurateTrackBounce:true
    });
  </script>
  <noscript><div><img src="https://mc.yandex.ru/watch/105971907" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
  <!-- /Yandex.Metrika counter -->
  <?php
}, 20);









/**
 * Smart Contact Form (FULL: shortcode + styles + JS + AJAX + fallback)
 * Shortcode: [smart_contact_form]
 */

/* ===========================
 * 0) ОБЩАЯ ЛОГИКА: валидация + отправка письма
 * =========================== */
function scf_process_submission($post) {

    // nonce
    if (empty($post['_scf_nonce']) || !wp_verify_nonce($post['_scf_nonce'], 'smart_contact_form_submit')) {
        return ['ok' => false, 'message' => 'Ошибка безопасности. Обновите страницу и попробуйте снова.'];
    }

    // honeypot
    if (!empty($post['website'])) {
        return ['ok' => false, 'message' => 'Spam detected.'];
    }

    // agree
    if (empty($post['agree'])) {
        return ['ok' => false, 'message' => 'Нужно дать согласие на обработку данных.'];
    }

    // data
    $name         = isset($post['name']) ? sanitize_text_field(wp_unslash($post['name'])) : '';
    $contact      = isset($post['contact']) ? sanitize_text_field(wp_unslash($post['contact'])) : '';
    $contact_type = isset($post['contact_type']) ? sanitize_key(wp_unslash($post['contact_type'])) : 'email';

    $allowed_types = ['phone', 'email', 'telegram', 'whatsapp'];
    if (!in_array($contact_type, $allowed_types, true)) {
        $contact_type = 'email';
    }

    // validate contact
    if ($contact_type === 'email') {
        $email = sanitize_email($contact);
        if (!is_email($email)) {
            return ['ok' => false, 'message' => 'Некорректный e-mail.'];
        }
        $contact = $email;
    } else {
        if (mb_strlen($contact) < 3) {
            return ['ok' => false, 'message' => 'Контакт слишком короткий.'];
        }
    }

    // recipients
    $to = get_option('admin_email');

    $type_labels = [
        'phone'    => 'Телефон',
        'email'    => 'E-mail',
        'telegram' => 'Telegram',
        'whatsapp' => 'WhatsApp',
    ];

    $subject = 'Новая заявка с сайта';

    $referer = wp_get_referer();
    $ip      = isset($_SERVER['REMOTE_ADDR']) ? sanitize_text_field($_SERVER['REMOTE_ADDR']) : '—';
    $ua      = isset($_SERVER['HTTP_USER_AGENT']) ? sanitize_text_field($_SERVER['HTTP_USER_AGENT']) : '—';

    $message  = "Поступила новая заявка:\n\n";
    $message .= "Имя: " . ($name ?: '—') . "\n";
    $message .= "Тип контакта: " . ($type_labels[$contact_type] ?? $contact_type) . "\n";
    $message .= "Контакт: " . ($contact ?: '—') . "\n\n";
    $message .= "Страница: " . ($referer ?: '—') . "\n";
    $message .= "IP: " . $ip . "\n";
    $message .= "User-Agent: " . $ua . "\n";
    $message .= "Дата: " . current_time('Y-m-d H:i:s') . "\n";

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
    ];

    if ($contact_type === 'email' && is_email($contact)) {
        $headers[] = 'Reply-To: ' . $contact;
    }

    $sent = wp_mail($to, $subject, $message, $headers);

    if ($sent) {
        return ['ok' => true, 'message' => 'Заявка отправлена! Я скоро свяжусь с вами.'];
    }

    return ['ok' => false, 'message' => 'Не удалось отправить заявку. Попробуйте позже или напишите в мессенджер.'];
}


/* ===========================
 * 1) FALLBACK handler: admin-post.php
 * =========================== */
add_action('admin_post_nopriv_smart_contact_form_submit', 'smart_contact_form_handle');
add_action('admin_post_smart_contact_form_submit', 'smart_contact_form_handle');

function smart_contact_form_handle() {
    $result = scf_process_submission($_POST);

    if (!$result['ok']) {
        wp_die(esc_html($result['message']));
    }

    $referer  = wp_get_referer();
    $redirect = $referer ?: home_url('/');
    $redirect = add_query_arg('scf', 'success', $redirect);

    wp_safe_redirect($redirect);
    exit;
}


/* ===========================
 * 2) AJAX handler: admin-ajax.php (без перезагрузки)
 * =========================== */
add_action('wp_ajax_nopriv_smart_contact_form_submit', 'smart_contact_form_ajax_handle');
add_action('wp_ajax_smart_contact_form_submit', 'smart_contact_form_ajax_handle');

function smart_contact_form_ajax_handle() {

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        wp_send_json_error(['message' => 'Invalid request method.'], 405);
    }

    $result = scf_process_submission($_POST);

    if ($result['ok']) {
        wp_send_json_success(['message' => $result['message']]);
    } else {
        wp_send_json_error(['message' => $result['message']], 400);
    }
}


/* ===========================
 * 3) Shortcode: [smart_contact_form]
 * =========================== */
add_shortcode('smart_contact_form', function () {

    static $assets_printed = false;
    ob_start();

    // notice after redirect (fallback mode)
    if (isset($_GET['scf']) && $_GET['scf'] === 'success') : ?>
        <div class="scfNotice scfNotice--success">Заявка отправлена! Я скоро свяжусь с вами.</div>
    <?php elseif (isset($_GET['scf']) && $_GET['scf'] === 'fail') : ?>
        <div class="scfNotice scfNotice--fail">Не удалось отправить заявку. Попробуйте позже или напишите в мессенджер.</div>
    <?php endif;

    if (!$assets_printed) {
        $assets_printed = true;

        $ajax_url = admin_url('admin-ajax.php');
        ?>
        <style>
        .contactField {
            z-index: 10 !important;
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
            height: 56px;
            padding: 0 20px;
            border: 2px solid #3d485c;
            border-radius: 8px;
            backdrop-filter: blur(8px);
        }

        .contactField__type {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            background: transparent;
            padding: 0;
            margin: 0;
            cursor: pointer;
            font: inherit;
            color: rgba(255, 255, 255, 0.9);
            outline: none;
        }

        .contactField__icon {
            width: 24px;
            height: 24px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .contactField__current { display: none; }

        .contactField__arrow {
            margin-left: 4px;
            width: 8px;
            height: 8px;
            border-left: 2px solid rgba(255, 255, 255, 0.7);
            border-bottom: 2px solid rgba(255, 255, 255, 0.7);
            transform: rotate(-45deg) translateY(-1px);
            transition: transform 0.2s ease;
        }

        .contactField__divider {
            display: inline-block;
            height: 28px;
            width: 1px;
            margin: 0 16px;
            background: rgba(255, 255, 255, 0.15);
        }

        .contactField__input {
            flex: 1 1 auto;
            border: none;
            background: transparent;
            color: #fff;
            font: inherit;
            outline: none;
        }

        .contactField__input::placeholder { color: rgba(255,255,255,.5); }

        .contactField__dropdown {
            position: absolute;
            left: 0;
            top: 100%;
            margin-top: 8px;
            padding: 12px 0;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 18px 40px rgba(0,0,0,0.25);
            min-width: 220px;
            opacity: 0;
            pointer-events: none;
            transform: translateY(6px);
            transition: opacity .18s ease, transform .18s ease;
            z-index: 9999;
        }

        .contactField--open .contactField__dropdown {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(0);
        }

        .contactField--open .contactField__arrow {
            transform: rotate(135deg) translateY(1px);
        }

        .contactField__dropdown button {
            width: 100%;
            padding: 8px 20px;
            border: none;
            background: transparent;
            text-align: left;
            font: inherit;
            color: #7A7C87;
            cursor: pointer;
        }

        .contactField__dropdown button:hover {
            background: rgba(99,102,241,0.06);
            color: #3F3F46;
        }

        .scfNotice {
            margin: 12px 0;
            padding: 12px 14px;
            border-radius: 12px;
            border: 1px solid transparent;
            font-size: 14px;
            line-height: 1.35;
        }
        .scfNotice--success { border-color: rgba(34,197,94,.35); color: #22c55e; }
        .scfNotice--fail    { border-color: rgba(239,68,68,.35); color: #ef4444; }
        </style>

        <script src="https://www.google.com/recaptcha/api.js?render=6LdWgEcsAAAAAGSKvVf_ZHIWBHHf5Q5C8mA2ILiP"></script>
<script>
(function () {
  "use strict";

  // === WP ajax url (ты уже выводишь его через PHP, оставь как есть) ===
  var AJAX_URL = <?php echo wp_json_encode($ajax_url); ?>;

  // === reCAPTCHA config ===
  var RECAPTCHA_SITE_KEY = '6LdWgEcsAAAAAGSKvVf_ZHIWBHHf5Q5C8mA2ILiP';
  var RECAPTCHA_ACTION   = 'smart_contact_form';

  function qs(root, sel) { return (root || document).querySelector(sel); }
  function qsa(root, sel) { return Array.prototype.slice.call((root || document).querySelectorAll(sel)); }

  // icons/config
  var config = {
    phone: {
      label: 'Телефон',
      placeholder: '+7 (___) ___-__-__',
      type: 'tel',
      inputmode: 'tel',
      icon: '<svg width="1em" height="1em" viewBox="0 0 24 24" fill="none"><path d="M8.38 8.853a14.603 14.603 0 0 0 2.847 4.01 14.603 14.603 0 0 0 4.01 2.847c.124.06.187.09.265.112.28.082.625.023.862-.147.067-.048.124-.105.239-.219.35-.35.524-.524.7-.639a2 2 0 0 1 2.18 0c.176.115.35.29.7.64l.195.194c.532.531.797.797.942 1.082a2 2 0 0 1 0 1.806c-.145.285-.41.551-.942 1.082l-.157.158c-.53.53-.795.794-1.155.997-.4.224-1.02.386-1.478.384-.413-.001-.695-.081-1.26-.241a19.038 19.038 0 0 1-8.283-4.874A19.039 19.039 0 0 1 3.17 7.761c-.16-.564-.24-.846-.241-1.26a3.377 3.377 0 0 1 .384-1.477c.202-.36.467-.625.997-1.155l.157-.158c.532-.53.798-.797 1.083-.941a2 2 0 0 1 1.805 0c.286.144.551.41 1.083.942l.195.194c.35.35.524.525.638.7a2 2 0 0 1 0 2.18c-.114.177-.289.352-.638.701-.115.114-.172.172-.22.238-.17.238-.228.582-.147.862.023.08.053.142.113.266Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>'
    },
    email: {
      label: 'E-mail',
      placeholder: 'main@domain.ru',
      type: 'email',
      inputmode: 'email',
      icon: '<svg width="1em" height="1em" viewBox="0 0 24 24" fill="none"><path d="m2 7 8.165 5.715c.661.463.992.695 1.351.784a2 2 0 0 0 .968 0c.36-.09.69-.32 1.351-.784L22 7M6.8 20h10.4c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.311-1.311C22 17.72 22 16.88 22 15.2V8.8c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311C19.72 4 18.88 4 17.2 4H6.8c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.311 1.311C2 6.28 2 7.12 2 8.8v6.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311C4.28 20 5.12 20 6.8 20Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>'
    },
    telegram: {
      label: 'Telegram',
      placeholder: '@username',
      type: 'text',
      inputmode: 'text',
      icon: '<svg width="1em" height="1em" viewBox="0 0 24 24" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M24 12c0 6.627-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0s12 5.373 12 12ZM12.429 8.854c-1.168.488-3.5 1.494-6.998 3.019-.569.226-.865.444-.89.653-.047.366.41.509 1.035.705l.261.083c.613.2 1.437.432 1.866.44.388.01.822-.15 1.3-.48 3.27-2.205 4.956-3.32 5.062-3.344a.276.276 0 0 1 .249.024.245.245 0 0 1 .056.213c-.046.192-1.825 1.847-2.758 2.714-.296.276-.507.472-.55.516a10.44 10.44 0 0 1-.284.282c-.568.549-.992.958.027 1.629.486.32.875.586 1.263.85.43.293.859.585 1.414.95.139.09.272.186.4.278.5.357.947.677 1.5.627.32-.023.653-.325.82-1.23.397-2.126 1.178-6.73 1.359-8.628a2.11 2.11 0 0 0-.02-.473.506.506 0 0 0-.17-.324.79.79 0 0 0-.465-.14c-.452.008-1.144.25-4.477 1.636Z" fill="#28A8E9"></path></svg>'
    },
    whatsapp: {
      label: 'WhatsApp',
      placeholder: 'Номер WhatsApp',
      type: 'tel',
      inputmode: 'tel',
      icon: '<svg width="1em" height="1em" viewBox="0 0 24 24" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="m2.219 17.097-1.62 5.91 6.055-1.586a11.405 11.405 0 0 0 5.45 1.39 11.405 11.405 0 1 0-9.885-5.714Zm15.24-3.239c.2.096.335.16.392.258.071.118.086.682-.158 1.347-.245.665-1.384 1.274-1.93 1.355-.6.102-1.214.063-1.796-.114a16.204 16.204 0 0 1-1.625-.6c-2.667-1.15-4.47-3.731-4.816-4.228a3.221 3.221 0 0 0-.053-.074c-.144-.192-1.164-1.547-1.164-2.95a3.197 3.197 0 0 1 .997-2.358 1.049 1.049 0 0 1 .772-.358c.064 0 .126-.002.188-.003.121-.002.239-.004.357.003h.073c.165-.002.365-.005.57.49l.223.542c.265.644.603 1.467.657 1.573a.53.53 0 0 1 .023.5 1.895 1.895 0 0 1-.285.476c-.054.062-.108.127-.162.192-.089.106-.177.213-.267.308l-.012.012c-.14.148-.275.292-.112.57a8.579 8.579 0 0 0 1.585 1.974 7.788 7.788 0 0 0 2.28 1.414c.282.143.452.12.617-.071.165-.191.708-.832.9-1.117.194-.286.382-.24.644-.144s1.662.787 1.947.928c.056.028.107.053.155.075Z" fill="#25D366"></path></svg>'
    }
  };

  function createNotice(form) {
    var n = qs(form, '.scfNoticeLive');
    if (n) return n;
    n = document.createElement('div');
    n.className = 'scfNotice scfNoticeLive';

    var btn = qs(form, 'button[type="submit"]');
    if (btn && btn.parentNode) btn.parentNode.insertBefore(n, btn);
    else form.insertBefore(n, form.firstChild);

    return n;
  }

  function setNotice(notice, ok, text) {
    notice.classList.remove('scfNotice--success', 'scfNotice--fail');
    notice.classList.add(ok ? 'scfNotice--success' : 'scfNotice--fail');
    notice.textContent = text;
  }

  function clearForm(form) {
    qsa(form, 'input:not([type="hidden"]):not([type="submit"]), textarea').forEach(function (el) {
      if (el.type === 'checkbox' || el.type === 'radio') el.checked = false;
      else el.value = '';
    });

    // вернуть дефолт тип контакта (email)
    var hiddenType = qs(form, '.contactField__hiddenType');
    var input = qs(form, '.contactField__input');
    var iconSpan = qs(form, '.contactField__icon');
    var current = qs(form, '.contactField__current');

    if (hiddenType && input && iconSpan && current) {
      var cfg = config.email;
      hiddenType.value = 'email';
      input.type = cfg.type;
      input.setAttribute('inputmode', cfg.inputmode);
      input.placeholder = cfg.placeholder;
      iconSpan.innerHTML = cfg.icon;
      current.textContent = cfg.label;
    }
  }

  function initContactField(field) {
    var typeBtn = qs(field, '.contactField__type');
    var current = qs(field, '.contactField__current');
    var iconSpan = qs(field, '.contactField__icon');
    var dropdown = qs(field, '.contactField__dropdown');
    var input = qs(field, '.contactField__input');
    var hiddenType = qs(field, '.contactField__hiddenType');

    if (!typeBtn || !dropdown || !input || !hiddenType || !iconSpan || !current) return;

    function setType(type) {
      var cfg = config[type];
      if (!cfg) return;

      input.type = cfg.type;
      input.setAttribute('inputmode', cfg.inputmode);
      input.placeholder = cfg.placeholder;

      hiddenType.value = type;
      iconSpan.innerHTML = cfg.icon;
      current.textContent = cfg.label;
      typeBtn.setAttribute('aria-label', cfg.label);
    }

    typeBtn.addEventListener('click', function () {
      var isOpen = field.classList.toggle('contactField--open');
      typeBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });

    dropdown.addEventListener('click', function (e) {
      var btn = e.target.closest('button[data-type]');
      if (!btn) return;
      setType(btn.getAttribute('data-type'));
      field.classList.remove('contactField--open');
      typeBtn.setAttribute('aria-expanded', 'false');
    });

    document.addEventListener('click', function (e) {
      if (!field.contains(e.target)) {
        field.classList.remove('contactField--open');
        typeBtn.setAttribute('aria-expanded', 'false');
      }
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' || e.key === 'Esc') {
        field.classList.remove('contactField--open');
        typeBtn.setAttribute('aria-expanded', 'false');
      }
    });

    setType('email');
  }

  async function getRecaptchaToken() {
    if (!window.grecaptcha || !grecaptcha.ready) {
      throw new Error('reCAPTCHA не загрузилась. Проверь подключение скрипта Google.');
    }

    return await new Promise(function (resolve, reject) {
      grecaptcha.ready(function () {
        grecaptcha.execute(RECAPTCHA_SITE_KEY, { action: RECAPTCHA_ACTION })
          .then(resolve)
          .catch(function () {
            reject(new Error('Не удалось получить токен reCAPTCHA.'));
          });
      });
    });
  }

  function initForm(form) {
    qsa(form, '.contactField').forEach(initContactField);

    form.addEventListener('submit', async function (e) {
      // если нет fetch/FormData — не мешаем обычному submit (fallback admin-post.php)
      if (!window.fetch || !window.FormData) return;

      e.preventDefault();

      var notice = createNotice(form);
      var submitBtn = qs(form, 'button[type="submit"]');
      var oldText = submitBtn ? submitBtn.textContent : '';

      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.textContent = 'Отправка...';
      }

      try {
        // 1) токен рекапчи
        var token = await getRecaptchaToken();

        // 2) формируем данные
        var fd = new FormData(form);
        fd.set('action', 'smart_contact_form_submit');
        fd.set('g-recaptcha-response', token);

        // 3) отправляем
        var resp = await fetch(AJAX_URL, {
          method: 'POST',
          body: fd,
          credentials: 'same-origin',
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });

        var data = null;
        try { data = await resp.json(); } catch (_) {}

        if (!data) {
          throw new Error('Ошибка отправки: сервер вернул некорректный ответ.');
        }

        if (data.success) {
          setNotice(notice, true, (data.data && data.data.message) ? data.data.message : 'Заявка отправлена!');
          clearForm(form);
        } else {
          var msg = (data.data && data.data.message) ? data.data.message : 'Не удалось отправить заявку.';
          setNotice(notice, false, msg);
        }

      } catch (err) {
        setNotice(notice, false, (err && err.message) ? err.message : 'Не удалось отправить заявку.');
      } finally {
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.textContent = oldText || 'Оставить заявку';
        }
      }
    });
  }

  document.addEventListener('DOMContentLoaded', function () {
    qsa(document, 'form.TariffsWithForm_form__vFheN').forEach(initForm);
  });

})();
</script>

        <?php
    }
    ?>

    <form class="TariffsWithForm_form__vFheN"
          method="post"
          action="<?php echo esc_url(admin_url('admin-post.php')); ?>">

        <input type="hidden" name="action" value="smart_contact_form_submit">
        <input type="hidden" name="_scf_nonce" value="<?php echo esc_attr(wp_create_nonce('smart_contact_form_submit')); ?>">

        <!-- honeypot -->
        <input type="text" name="website" value="" tabindex="-1" autocomplete="off"
               style="position:absolute;left:-9999px;opacity:0;height:0;width:0;">

        <div class="field TariffsWithForm_formField__w5Pz5">
            <div class="fieldInput fieldInput--v2 fieldInput--dark">
                <input autocomplete="name" inputmode="text" name="name" placeholder="Ваше имя" type="text" required>
                <label class="fieldPlaceholder">Ваше имя</label>
                <fieldset aria-hidden="true" class="fieldOutline">
                    <legend><span>Ваше имя</span></legend>
                </fieldset>
            </div>
        </div>

        <div class="field TariffsWithForm_formField__w5Pz5">
            <div class="contactField">
                <button type="button" class="contactField__type" aria-haspopup="true" aria-expanded="false">
                    <span class="contactField__icon" aria-hidden="true">✉</span>
                    <span class="contactField__current"></span>
                    <span class="contactField__arrow"></span>
                </button>

                <span class="contactField__divider"></span>

                <input
                    class="contactField__input"
                    name="contact"
                    type="email"
                    inputmode="email"
                    placeholder="main@domain.ru"
                    required
                >

                <input type="hidden" name="contact_type" class="contactField__hiddenType" value="email">

                <div class="contactField__dropdown">
                    <button type="button" data-type="phone">Телефон</button>
                    <button type="button" data-type="email">E-mail</button>
                    <button type="button" data-type="telegram">Telegram</button>
                    <button type="button" data-type="whatsapp">WhatsApp</button>
                </div>
            </div>
        </div>

        <button class="btnGrey TariffsWithForm_formBtn__rxSJF" type="submit">
            Оставить заявку
        </button>

        <div class="TariffsWithForm_formPrivacy__DGmeL">
            <label class="Agree_label__Ra_Cy Agree_labelDark__FAnOd">
                <input name="agree" required type="checkbox" value="1" />
                <div class="Agree_checkbox__a6Zei"></div>
                <label class="form-consent">
  <input type="checkbox" name="consent" required>
  <span>
    Я даю согласие на обработку моих персональных данных и подтверждаю, что ознакомлен(а) с
    <a href="/privacy" target="_blank" rel="noopener">Политикой конфиденциальности</a>
    и
    <a href="/user-agreement" target="_blank" rel="noopener">Пользовательским соглашением</a>.
  </span>
</label>

            </label>
        </div>
    </form>

    <?php
    return ob_get_clean();
});












// Разрешаем загрузку SVG
function allow_svg_uploads($mimes) {
    $mimes['svg']  = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');


// Фикс безопасности: очищаем SVG перед использованием
function sanitize_svg_on_upload($file) {
    if ($file['type'] === 'image/svg+xml') {
        // Проверка размера (SVG не должен быть огромным)
        $svg = file_get_contents($file['tmp_name']);

        // Блокируем опасные теги (script, iframe и т.д.)
        $dangerous = ['script', 'iframe', 'embed', 'object', 'audio', 'video'];
        foreach ($dangerous as $tag) {
            if (stripos($svg, '<' . $tag) !== false) {
                $file['error'] = 'Этот SVG содержит потенциально опасные теги и был отклонён.';
                return $file;
            }
        }
    }
    return $file;
}
add_filter('wp_handle_upload_prefilter', 'sanitize_svg_on_upload');


// Отображение SVG миниатюры в медиа-библиотеке
function show_svg_thumb_in_media_library($response, $attachment, $meta) {
    if ($response['type'] === 'image' && $response['subtype'] === 'svg+xml') {
        $svg_path = $response['url'];
        $response['image'] = $svg_path;
        $response['thumb'] = $svg_path;
    }
    return $response;
}
add_filter('wp_prepare_attachment_for_js', 'show_svg_thumb_in_media_library', 10, 3);

















// Регистрируем меню шапки
add_action( 'after_setup_theme', function () {
    register_nav_menus( [
        'header_top_menu'    => 'Верхнее меню в шапке',
        'header_bottom_menu' => 'Основное меню (мегаменю)',
    ] );
} );




class DevStudio_Header_Bottom_Walker extends Walker_Nav_Menu {

    // Открытие уровня (подменю)
    public function start_lvl( &$output, $depth = 0, $args = [] ) {
        $indent = str_repeat( "\t", $depth );

        // Для первого уровня подменю — наша обёртка мегаменю
        if ( $depth === 0 ) {
            $output .= "\n$indent<div class=\"HeaderBottomMenu__submenu BottomMenu_submenu__NlRB1\">\n";
            $output .= "$indent\t<ul class=\"\">\n";
        } else {
            // Вложенные уровни, если вдруг будут
            $output .= "\n$indent<ul class=\"\">\n";
        }
    }

    public function end_lvl( &$output, $depth = 0, $args = [] ) {
        $indent = str_repeat( "\t", $depth );

        if ( $depth === 0 ) {
            $output .= "$indent\t</ul>\n";
            $output .= "$indent</div><!-- .HeaderBottomMenu__submenu -->\n";
        } else {
            $output .= "$indent</ul>\n";
        }
    }

    // Один пункт меню
    public function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $classes   = empty( $item->classes ) ? [] : (array) $item->classes;
        $has_child = in_array( 'menu-item-has-children', $classes, true );

        $li_classes = [];

        if ( $depth === 0 ) {
            $li_classes[] = $has_child ? 'BottomMenu_parent__PYaG2' : '';
        }

        $li_classes = array_filter( $li_classes );
        $class_attr = $li_classes ? ' class="' . esc_attr( implode( ' ', $li_classes ) ) . '"' : '';

        $output .= $indent . '<li' . $class_attr . '>';

        $atts            = [];
        $atts['href']    = ! empty( $item->url ) ? $item->url : '';
        $atts['title']   = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target']  = ! empty( $item->target ) ? $item->target : '';
        $atts['rel']     = ! empty( $item->xfn ) ? $item->xfn : '';

        $atts['class']   = $depth === 0 ? '' : ''; // можно добавить свои классы

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( empty( $value ) ) {
                continue;
            }
            $value      = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
            $attributes .= ' ' . $attr . '="' . $value . '"';
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $item_output  = $args->before ?? '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before ?? '';
        $item_output .= $title;
        $item_output .= $args->link_after ?? '';
        $item_output .= '</a>';

        // Иконка-стрелка только у верхнего уровня с детьми
        if ( $depth === 0 && $has_child ) {
            $item_output .= '<i class="icon-chevron-down"></i>';
        }

        $item_output .= $args->after ?? '';

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    public function end_el( &$output, $item, $depth = 0, $args = [] ) {
        $output .= "</li>\n";
    }
}















/**
 * Shortcode: [cases_grid title="Наши кейсы" per_page="12" more_url="/cases" more_label="Смотреть все кейсы"]
 * Использует стандартные рубрики WP: taxonomy = category
 */
add_shortcode('cases_grid', function ($atts) {

    $atts = shortcode_atts([
        'title'      => 'Кейсы по разработке сайтов WordPress и WooCommerce',
        'per_page'   => 12,
        'more_url'   => '/cases',
        'more_label' => 'Смотреть все кейсы',
    ], $atts, 'cases_grid');

    $taxonomy = 'category';

    /**
     * 0) Гарантируем, что CPT "case" поддерживает обычные рубрики.
     * (иначе get_the_terms($post_id,'category') будет пустым)
     */
    if (post_type_exists('case')) {
        register_taxonomy_for_object_type('category', 'case');
    }

    // 1) Термины (рубрики) для табов — обычные рубрики WP
    $terms = get_terms([
        'taxonomy'   => $taxonomy,
        'hide_empty' => false,
        'orderby'    => 'name',
        'order'      => 'ASC',
    ]);
	
	
	// 1) Термины (рубрики) для табов — обычные рубрики WP, исключая "Без рубрики"
    $terms = get_terms([
        'taxonomy'   => $taxonomy,
        'hide_empty' => false,
        'orderby'    => 'name',
        'order'      => 'ASC',
        'exclude'    => [ get_option('default_category') ], // исключаем стандартную "Без рубрики"
    ]);

    // Дополнительная защита, если вдруг slug у рубрики uncategorized
    if (!is_wp_error($terms) && !empty($terms)) {
        $terms = array_filter($terms, function ($term) {
            return isset($term->slug) && $term->slug !== 'uncategorized';
        });
    }

    // 2) Кейсы
    $q = new WP_Query([
        'post_type'      => 'case',
        'post_status'    => 'publish',
        'posts_per_page' => (int)$atts['per_page'],
        'orderby'        => 'menu_order date',
        'order'          => 'DESC',
        'no_found_rows'  => true,
    ]);

    ob_start();
    ?>
    <section class="WhatWillYouGet componentWrapper Cases" id="what-will-you-get">
        <div class="container">
            <div class="WhatWillYouGet_inner__78_MZ">
                <h2 class="pageTitle Offers__title WhatWillYouGet_title__1Mouu"><?php echo esc_html($atts['title']); ?></h2>

                <!-- ФИЛЬТРЫ / ТАБЫ (обычные рубрики) -->
                <div class="Cases__filters" aria-label="Фильтр кейсов">
                    <button class="Cases__filterBtn is-active" type="button" data-filter="all">Все</button>

                    <?php if (!is_wp_error($terms) && !empty($terms)) : ?>
                        <?php foreach ($terms as $term) : ?>
                            <button class="Cases__filterBtn" type="button" data-filter="<?php echo esc_attr($term->slug); ?>">
                                <?php echo esc_html($term->name); ?>
                            </button>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- СЕТКА КЕЙСОВ -->
                <div class="Cases__grid">
                    <?php if ($q->have_posts()) : ?>
                        <?php while ($q->have_posts()) : $q->the_post(); ?>
                            <?php
                            $post_id = get_the_ID();

                            /**
                             * ✅ ВАЖНО: кейс может быть в нескольких рубриках,
                             * поэтому data-type делаем "slug1 slug2 slug3"
                             */
                            $post_terms = get_the_terms($post_id, $taxonomy);
                            $slugs = [];
                            if (!is_wp_error($post_terms) && !empty($post_terms)) {
                                foreach ($post_terms as $t) {
                                    if (!empty($t->slug)) $slugs[] = $t->slug;
                                }
                            }
                            $data_type = implode(' ', array_unique($slugs));

                            // ACF поля
                            $badge_text    = function_exists('get_field') ? (get_field('case_badge_text', $post_id) ?: '') : '';
                            $badge_variant = function_exists('get_field') ? (get_field('case_badge_variant', $post_id) ?: 'default') : 'default';

                            $acf_img_id  = function_exists('get_field') ? (int)get_field('case_card_image', $post_id) : 0;
                            $acf_img_alt = function_exists('get_field') ? (get_field('case_card_alt', $post_id) ?: '') : '';

                            $img_id  = $acf_img_id ?: get_post_thumbnail_id($post_id);
                            $img_url = $img_id ? wp_get_attachment_image_url($img_id, 'large') : '';
                            $img_alt = $acf_img_alt ?: ($img_id ? get_post_meta($img_id, '_wp_attachment_image_alt', true) : '');

                            // results (repeater)
                            $results = [];
                            if (function_exists('get_field')) {
                                $rows = get_field('case_results', $post_id);
                                if (is_array($rows)) $results = $rows;
                            }

                            $badge_class = 'CaseCard__badge';
                            if ($badge_variant === 'blue')  $badge_class .= ' CaseCard__badge--blue';
                            if ($badge_variant === 'green') $badge_class .= ' CaseCard__badge--green';

                            // Обычное описание кейса (контент), без шорткодов/HTML, с аккуратной обрезкой
$content_raw  = get_post_field('post_content', $post_id);
$content_text = wp_strip_all_tags( strip_shortcodes( $content_raw ) );
$type_text    = wp_trim_words( $content_text, 26, '…' ); // 26 слов — можешь менять

                            ?>
                            <article class="CaseCard" data-type="<?php echo esc_attr($data_type); ?>">
                                <div class="CaseCard__imageWrapper">
                                    <?php if ($img_url) : ?>
                                        <?php if ($img_id) : ?>
  <?php echo wp_get_attachment_image(
    $img_id,
    'large',
    false,
    [
      'class'   => 'CaseCard__image',
      'loading' => 'lazy',
      'alt'     => $img_alt ? $img_alt : '',
    ]
  ); ?>
<?php else : ?>
  <div class="CaseCard__image CaseCard__image--placeholder" aria-hidden="true"></div>
<?php endif; ?>

                                    <?php else : ?>
                                        <div class="CaseCard__image CaseCard__image--placeholder" aria-hidden="true"></div>
                                    <?php endif; ?>

                                    <?php if ($badge_text) : ?>
                                        <span class="<?php echo esc_attr($badge_class); ?>"><?php echo esc_html($badge_text); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="CaseCard__content">
                                    <h3 class="CaseCard__title"><?php the_title(); ?></h3>

                                    <?php if ($type_text) : ?>
                                        <p class="CaseCard__type"><?php echo esc_html($type_text); ?></p>
                                    <?php endif; ?>

                                    <?php if (!empty($results)) : ?>
                                        <ul class="CaseCard__results">
                                            <?php foreach ($results as $r) : ?>
                                                <?php
                                                $lbl = is_array($r) ? ($r['label'] ?? '') : '';
                                                $val = is_array($r) ? ($r['value'] ?? '') : '';
                                                if (!$lbl && !$val) continue;
                                                ?>
                                                <li><span><?php echo esc_html($lbl); ?>:</span> <?php echo esc_html($val); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>

                                    <a href="<?php echo esc_url(get_permalink($post_id)); ?>" class="CaseCard__button">Смотреть проект</a>
                                </div>
                            </article>
                        <?php endwhile; wp_reset_postdata(); ?>
                    <?php else : ?>
                        <p>Кейсы пока не добавлены.</p>
                    <?php endif; ?>
                </div>

                <!-- КНОПКА "СМОТРЕТЬ ВСЁ" -->
                <div class="Cases__more">
                    <a href="<?php echo esc_url($atts['more_url']); ?>" class="Cases__moreButton">
                        <?php echo esc_html($atts['more_label']); ?>
                    </a>
                </div>

                <style>
  /* ========== CASES BLOCK ========== */
  .Cases{
    --cases-bg: #fff;
    --cases-text: #111;
    --cases-muted: rgba(17,17,17,.62);
    --cases-border: rgba(17,17,17,.10);
    --cases-shadow: 0 18px 45px rgba(0,0,0,.07);
    --cases-shadow-hover: 0 26px 70px rgba(0,0,0,.10);

    padding: 80px 0;
    background: var(--cases-bg);
    color: var(--cases-text);
  }

  /* ========== FILTERS / TABS (modern pills) ========== */
  .Cases__filters{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    margin-bottom: 28px;

    width: fit-content;
    max-width: 100%;
    margin-left: auto;
    margin-right: auto;

    padding: 6px;
    border-radius: 999px;
    border: 1px solid var(--cases-border);
    background: rgba(255,255,255,.75);
    box-shadow: 0 10px 28px rgba(0,0,0,.06);
  }

  @supports (backdrop-filter: blur(10px)){
    .Cases__filters{
      background: rgba(255,255,255,.55);
      backdrop-filter: blur(12px);
    }
  }

  .Cases__filterBtn{
    appearance:none;
    border: 0;
    background: transparent;
    cursor: pointer;

    padding: 9px 18px;
    border-radius: 999px;

    font-size: 13px;
    font-weight: 600;
    letter-spacing: .01em;
    color: rgba(17,17,17,.75);
    white-space: nowrap;

    transition: background .22s ease, color .22s ease, transform .15s ease, box-shadow .22s ease;
    outline: none;
  }

  .Cases__filterBtn:hover{
    background: rgba(17,17,17,.06);
    color: var(--cases-text);
    transform: translateY(-1px);
  }

  .Cases__filterBtn:focus-visible{
    box-shadow: 0 0 0 3px rgba(17,17,17,.18);
  }

  .Cases__filterBtn.is-active{
    background: #111;
    color: #fff;
    box-shadow: 0 10px 22px rgba(0,0,0,.14);
  }

  /* ========== GRID ========== */
  .Cases__grid{
    display:grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 24px;
  }

  .CaseCard.is-hidden{ display:none; }

  /* ========== CARD ========== */
  .CaseCard{
    background:#fff;
    border-radius: 20px;
    border: 1px solid rgba(17,17,17,.06);
    box-shadow: var(--cases-shadow);
    overflow:hidden;
    display:flex;
    flex-direction:column;
    transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
  }

  .CaseCard:hover{
    transform: translateY(-6px);
    box-shadow: var(--cases-shadow-hover);
    border-color: rgba(17,17,17,.10);
  }

  /* ========== IMAGE (no harsh crop) ========== */
  .CaseCard__imageWrapper{
    position:relative;
    overflow:hidden;

    /* фиксируем гармоничную высоту вместо aspect-ratio,
       чтобы картинка не резалась как раньше */
    height: 233px;
    background:#0f0f10;
  }

  .CaseCard__image{
    width:100%;
    height:100%;
    display:block;

    /* главное: НЕ режем */
    object-fit: contain;
    background:#0f0f10;

    transform: scale(1);
    transition: transform .35s ease;
  }

  .CaseCard:hover .CaseCard__image{
    transform: scale(1.03);
  }

  .CaseCard__image--placeholder{
    background: linear-gradient(135deg, rgba(255,255,255,.10), rgba(255,255,255,.02));
  }

  .CaseCard__imageWrapper::after{
    content:"";
    position:absolute;
    inset:0;
    background: linear-gradient(to top, rgba(0,0,0,.40) 0%, rgba(0,0,0,.10) 60%, transparent 100%);
    pointer-events:none;
  }

  /* ========== BADGE ========== */
  .CaseCard__badge{
    position:absolute;
    left: 14px;
    bottom: 14px;
    z-index:2;

    padding: 6px 12px;
    border-radius: 999px;

    font-size: 11px;
    font-weight: 700;
    letter-spacing: .06em;
    text-transform: uppercase;

    color:#fff;
    background: rgba(17,17,17,.92);
    box-shadow: 0 10px 26px rgba(0,0,0,.22);
  }
  .CaseCard__badge--blue{ background: rgba(33,107,255,.94); }
  .CaseCard__badge--green{ background: rgba(28,150,84,.94); }

  /* ========== CONTENT ========== */
  .CaseCard__content{
    padding: 18px 18px 20px;
    display:flex;
    flex-direction:column;
    gap: 10px;
  }

  .CaseCard__title{
    margin:0;
    font-size: 18px;
    line-height: 1.35;
    letter-spacing: -0.01em;
  }

  .CaseCard__type{
    margin:0;
    font-size: 13px;
    color: var(--cases-muted);
    line-height: 1.55;
  }

  .CaseCard__results{
    list-style:none;
    margin: 8px 0 0;
    padding:0;
    font-size: 14px;
    color: rgba(17,17,17,.78);
  }
  .CaseCard__results li{ margin-bottom: 4px; }
  .CaseCard__results li span{ font-weight: 700; color: rgba(17,17,17,.88); }

  /* ========== BUTTON ========== */
  .CaseCard__button{
    margin-top: 12px;
    align-self:flex-start;

    display:inline-flex;
    align-items:center;
    gap: 8px;

    padding: 9px 16px;
    border-radius: 999px;

    background:#111;
    color:#fff;
    font-size: 13px;
    font-weight: 600;
    text-decoration:none;

    transition: transform .18s ease, box-shadow .22s ease, background .22s ease;
  }
  .CaseCard__button::after{
    content:"↗";
    font-size: 12px;
    opacity:.75;
  }
  .CaseCard__button:hover{
    background:#000;
    transform: translateY(-1px);
    box-shadow: 0 10px 24px rgba(0,0,0,.18);
  }
  .CaseCard__button:focus-visible{
    outline:none;
    box-shadow: 0 0 0 3px rgba(17,17,17,.18), 0 10px 24px rgba(0,0,0,.18);
  }

  /* ========== MORE BUTTON ========== */
  .Cases__more{
    margin-top: 34px;
    text-align:center;
  }

  .Cases__moreButton{
    display:inline-flex;
    align-items:center;
    justify-content:center;

    padding: 11px 26px;
    border-radius: 999px;

    border: 1px solid rgba(17,17,17,.28);
    background: transparent;
    color:#111;

    font-size: 14px;
    font-weight: 600;
    text-decoration:none;

    transition: background .22s ease, color .22s ease, transform .15s ease, box-shadow .22s ease, border-color .22s ease;
  }

  .Cases__moreButton:hover{
    background:#111;
    color:#fff;
    transform: translateY(-1px);
    border-color:#111;
    box-shadow: 0 12px 26px rgba(0,0,0,.14);
  }

  /* ========== RESPONSIVE ========== */
  @media (max-width: 1024px){
    .Cases__grid{ grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .CaseCard__imageWrapper{ height: 200px; }
  }

  @media (max-width: 640px){
    .Cases{ padding: 56px 0; }

    /* Табы НЕ в 2 ряда — только горизонтальный скролл */
    .Cases__filters{
      justify-content:flex-start;
      margin-left: 0;
      margin-right: 0;

      width: 100%;
      max-width: 100%;

      overflow-x: auto;
      overflow-y: hidden;
      -webkit-overflow-scrolling: touch;
      scrollbar-width: none;
      gap: 8px;

      padding: 6px 8px;
      border-radius: 16px; /* чуть компактнее на мобилке */
    }
    .Cases__filters::-webkit-scrollbar{ display:none; }
    .Cases__filterBtn{ flex: 0 0 auto; }

    .Cases__grid{ grid-template-columns: 1fr; }
    .CaseCard{ border-radius: 16px; }
    .CaseCard__content{ padding: 16px 14px 18px; }

    .CaseCard__imageWrapper{ height: 180px; }
  }
</style>


                <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const block = document.querySelector('#what-will-you-get');
                    if (!block) return;

                    const filterButtons = block.querySelectorAll('.Cases__filterBtn');
                    const cards = block.querySelectorAll('.CaseCard');
                    if (!filterButtons.length || !cards.length) return;

                    filterButtons.forEach(btn => {
                        btn.addEventListener('click', function () {
                            const filter = this.getAttribute('data-filter');

                            filterButtons.forEach(b => b.classList.remove('is-active'));
                            this.classList.add('is-active');

                            cards.forEach(card => {
                                const types = (card.getAttribute('data-type') || '').split(' ').filter(Boolean);
                                const show = (filter === 'all') || types.includes(filter);
                                card.classList.toggle('is-hidden', !show);
                            });
                        });
                    });
                });
                </script>

            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
});










add_filter('template_include', function ($template) {

  if (is_singular('post')) {
    $custom = get_stylesheet_directory() . '/templates/single-post.php';
    if (file_exists($custom)) {
      return $custom;
    }
  }

  return $template;
}, 99);













add_action('wp_ajax_nopriv_wpds_contact_submit', 'wpds_contact_submit');
add_action('wp_ajax_wpds_contact_submit', 'wpds_contact_submit');

function wpds_contact_submit() {
    if (!defined('DOING_AJAX') || !DOING_AJAX) {
        wp_send_json_error(['message' => 'Invalid request.'], 400);
    }

    // Nonce
    $nonce = isset($_POST['_wpds_nonce']) ? sanitize_text_field(wp_unslash($_POST['_wpds_nonce'])) : '';
    if (!$nonce || !wp_verify_nonce($nonce, 'wpds_contact_submit')) {
        wp_send_json_error(['message' => 'Ошибка безопасности. Обновите страницу и попробуйте снова.'], 403);
    }

    // Honeypot
    $company = isset($_POST['company']) ? trim((string) wp_unslash($_POST['company'])) : '';
    if ($company !== '') {
        wp_send_json_success(['message' => 'OK']);
    }

    // Согласие
    $agree = isset($_POST['agree']) ? (string) wp_unslash($_POST['agree']) : '';
    if ($agree !== '1') {
        wp_send_json_error(['message' => 'Подтвердите согласие на обработку персональных данных.'], 422);
    }

    // Поля
    $phone   = isset($_POST['phone']) ? sanitize_text_field(wp_unslash($_POST['phone'])) : '';
    $website = isset($_POST['website']) ? sanitize_text_field(wp_unslash($_POST['website'])) : '';

    if ($phone === '') {
        wp_send_json_error(['message' => 'Введите номер телефона.'], 422);
    }

    // Приведём website к URL (если заполнено)
    if ($website !== '' && !preg_match('~^https?://~i', $website)) {
        $website = 'https://' . $website;
    }
    if ($website !== '' && !filter_var($website, FILTER_VALIDATE_URL)) {
        wp_send_json_error(['message' => 'Укажите корректный адрес сайта.'], 422);
    }

    $to = get_option('admin_email'); // или 'you@domain.com'

    $subject = 'Заявка с формы консультации (wpdevstudio.ru)';

    $referer = isset($_SERVER['HTTP_REFERER']) ? esc_url_raw(wp_unslash($_SERVER['HTTP_REFERER'])) : '—';
    $ip      = isset($_SERVER['REMOTE_ADDR']) ? sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'])) : '—';

    $message  = "Новая заявка с сайта:\n\n";
    $message .= "Телефон: {$phone}\n";
    $message .= "Адрес сайта: " . ($website ?: '—') . "\n";
    $message .= "Страница: {$referer}\n";
    $message .= "IP: {$ip}\n";
    $message .= "Дата: " . current_time('Y-m-d H:i:s') . "\n";

    $headers = ['Content-Type: text/plain; charset=UTF-8'];

    $sent = wp_mail($to, $subject, $message, $headers);

    if (!$sent) {
        wp_send_json_error(['message' => 'Не удалось отправить заявку. Попробуйте позже.'], 500);
    }

    wp_send_json_success(['message' => 'Заявка отправлена! Мы свяжемся с вами в ближайшее время.']);
}
















add_action('after_setup_theme', function () {
  add_theme_support('woocommerce');

  // Чтобы галерея товара работала нормально (по желанию)
  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');
});





function wpdevstudio_fontawesome() {
  wp_enqueue_style(
    'fontawesome',
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
    [],
    '6.5.1'
  );
}
add_action('wp_enqueue_scripts', 'wpdevstudio_fontawesome');





/**
 * 4–5 ⭐ публикуем сразу, 1–3 ⭐ отправляем на модерацию
 * Работает именно для отзывов WooCommerce (product + rating).
 */

/** 1) До вставки комментария */
add_filter('preprocess_comment', function ($commentdata) {

  // Только для отзывов (если есть rating)
  if (!isset($_POST['rating'])) return $commentdata;

  $rating = (int) $_POST['rating'];
  $post_id = isset($commentdata['comment_post_ID']) ? (int) $commentdata['comment_post_ID'] : 0;

  if (!$post_id) return $commentdata;

  // Только для товаров
  if (get_post_type($post_id) !== 'product') return $commentdata;

  // Если рейтинг < 4 — на модерацию
  if ($rating > 0 && $rating < 4) {
    $commentdata['comment_approved'] = 0;
  }

  return $commentdata;
}, 9);


/** 2) После сохранения (подстраховка) */
add_action('comment_post', function ($comment_id, $comment_approved) {

  // rating Woo хранит в meta comment 'rating'
  $rating = (int) get_comment_meta($comment_id, 'rating', true);
  if (!$rating) return;

  $comment = get_comment($comment_id);
  if (!$comment) return;

  // Только товары
  if (get_post_type((int)$comment->comment_post_ID) !== 'product') return;

  // Если рейтинг < 4 — принудительно переводим в moderation
  if ($rating < 4) {
    // даже если уже "approved" — делаем "hold"
    wp_set_comment_status($comment_id, 'hold', true);
  }

}, 10, 2);


















/**
 * Shortcode: [ds_product_cards ids="12,34,56,78" limit="8" columns="4"]
 * Shortcode: [ds_product_cards category="hoodies" limit="8" columns="4"]
 * Shortcode: [ds_product_cards orderby="date" order="DESC" limit="8" columns="3"]
 *
 * + New:
 * Shortcode: [ds_product_cards mode="carousel" limit="10" columns="4"]
 * Shortcode: [ds_product_cards mode="grid" ...]  // обратно сетка
 */

add_shortcode('ds_product_cards', function($atts){
  if (!class_exists('WooCommerce')) return '';

  $a = shortcode_atts([
    'ids'      => '',
    'category' => '',
    'limit'    => 8,
    'columns'  => 4,          // desktop per view (2..6)
    'orderby'  => 'date',
    'order'    => 'DESC',

    'mode'     => 'carousel', // carousel | grid
    'gap'      => 14,         // px
    'arrows'   => 1,          // 1|0
    'dots'     => 0,          // 1|0 (опционально, ниже включим)
  ], $atts, 'ds_product_cards');

  $limit   = max(1, (int)$a['limit']);
  $columns = min(6, max(2, (int)$a['columns']));
  $gap     = max(0, (int)$a['gap']);
  $mode    = in_array($a['mode'], ['carousel','grid'], true) ? $a['mode'] : 'carousel';
  $arrows  = (int)$a['arrows'] === 1;
  $dots    = (int)$a['dots'] === 1;

  $args = [
    'post_type'           => 'product',
    'post_status'         => 'publish',
    'posts_per_page'      => $limit,
    'ignore_sticky_posts' => true,
    'no_found_rows'       => true,
    'orderby'             => sanitize_key($a['orderby']),
    'order'               => (strtoupper($a['order']) === 'ASC') ? 'ASC' : 'DESC',
  ];

  if (!empty($a['ids'])) {
    $ids = array_values(array_filter(array_map('absint', explode(',', $a['ids']))));
    if ($ids) {
      $args['post__in'] = $ids;
      $args['orderby']  = 'post__in';
    }
  } elseif (!empty($a['category'])) {
    $args['tax_query'] = [[
      'taxonomy' => 'product_cat',
      'field'    => 'slug',
      'terms'    => sanitize_title($a['category']),
    ]];
  }

  $q = new WP_Query($args);
  if (!$q->have_posts()) return '';

  $uid = 'dspc_' . wp_generate_uuid4();

  ob_start(); ?>

  <div class="dsProductBlock <?php echo esc_attr($uid); ?>"
       data-mode="<?php echo esc_attr($mode); ?>"
       style="--dspc-cols: <?php echo (int)$columns; ?>; --dspc-gap: <?php echo (int)$gap; ?>px;">

    <?php if ($mode === 'carousel'): ?>
      <div class="dspcHead">
        <?php if ($arrows): ?>
          <button class="dspcNav dspcPrev" type="button" aria-label="Назад">‹</button>
          <button class="dspcNav dspcNext" type="button" aria-label="Вперёд">›</button>
        <?php endif; ?>
      </div>

      <div class="dspcViewport" tabindex="0" aria-label="Карусель товаров">
        <div class="dspcTrack">
          <?php while ($q->have_posts()): $q->the_post();
            $product = wc_get_product(get_the_ID());
            if (!$product) continue;

            $title = get_the_title();
            $url   = get_permalink();

            $img_id  = $product->get_image_id();
            $img_url = $img_id ? wp_get_attachment_image_url($img_id, 'woocommerce_thumbnail') : wc_placeholder_img_src('woocommerce_thumbnail');
            $img_alt = $img_id ? get_post_meta($img_id, '_wp_attachment_image_alt', true) : $title;

            $price_html = $product->get_price_html();
            $is_sale    = $product->is_on_sale();
            $is_new     = (time() - (int)get_the_time('U')) <= (14 * DAY_IN_SECONDS);
            $rating     = $product->get_average_rating();
            $rating_cnt = (int)$product->get_rating_count();
          ?>
            <article class="dspcCard dspcSlide">
              <a class="dspcMedia" href="<?php echo esc_url($url); ?>" aria-label="<?php echo esc_attr($title); ?>">
                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" loading="lazy">
                <div class="dspcBadges">
                  <?php if ($is_sale): ?><span class="dspcBadge dspcBadge--sale">Распродажа</span><?php endif; ?>
                  <?php if ($is_new): ?><span class="dspcBadge dspcBadge--new">Новый</span><?php endif; ?>
                </div>
              </a>

              <div class="dspcBody">
                <a class="dspcTitle" href="<?php echo esc_url($url); ?>"><?php echo esc_html($title); ?></a>

                <div class="dspcMeta">
                  <div class="dspcPrice"><?php echo wp_kses_post($price_html); ?></div>

                  <?php if ($rating_cnt > 0): ?>
                    <div class="dspcRating" aria-label="Рейтинг <?php echo esc_attr($rating); ?>">
                      <span class="dspcStar">★</span>
                      <span class="dspcRateVal"><?php echo esc_html(number_format_i18n((float)$rating, 1)); ?></span>
                      <span class="dspcRateCnt">(<?php echo (int)$rating_cnt; ?>)</span>
                    </div>
                  <?php endif; ?>
                </div>

                <a class="dspcBtn" href="<?php echo esc_url($url); ?>">Подробнее</a>
              </div>
            </article>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      </div>

      <?php if ($dots): ?>
        <div class="dspcDots" aria-label="Пагинация"></div>
      <?php endif; ?>

    <?php else: /* GRID MODE */ ?>

      <div class="dsProductCardsGrid" style="--dspc-cols: <?php echo (int)$columns; ?>;">
        <?php while ($q->have_posts()): $q->the_post();
          $product = wc_get_product(get_the_ID());
          if (!$product) continue;

          $title = get_the_title();
          $url   = get_permalink();
          $img_id  = $product->get_image_id();
          $img_url = $img_id ? wp_get_attachment_image_url($img_id, 'woocommerce_thumbnail') : wc_placeholder_img_src('woocommerce_thumbnail');
          $img_alt = $img_id ? get_post_meta($img_id, '_wp_attachment_image_alt', true) : $title;
          $price_html = $product->get_price_html();
          $is_sale    = $product->is_on_sale();
          $is_new     = (time() - (int)get_the_time('U')) <= (14 * DAY_IN_SECONDS);
          $rating     = $product->get_average_rating();
          $rating_cnt = (int)$product->get_rating_count();
        ?>
          <article class="dspcCard">
            <a class="dspcMedia" href="<?php echo esc_url($url); ?>" aria-label="<?php echo esc_attr($title); ?>">
              <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" loading="lazy">
              <div class="dspcBadges">
                <?php if ($is_sale): ?><span class="dspcBadge dspcBadge--sale">Распродажа</span><?php endif; ?>
                <?php if ($is_new): ?><span class="dspcBadge dspcBadge--new">Новый</span><?php endif; ?>
              </div>
            </a>

            <div class="dspcBody">
              <a class="dspcTitle" href="<?php echo esc_url($url); ?>"><?php echo esc_html($title); ?></a>

              <div class="dspcMeta">
                <div class="dspcPrice"><?php echo wp_kses_post($price_html); ?></div>

                <?php if ($rating_cnt > 0): ?>
                  <div class="dspcRating" aria-label="Рейтинг <?php echo esc_attr($rating); ?>">
                    <span class="dspcStar">★</span>
                    <span class="dspcRateVal"><?php echo esc_html(number_format_i18n((float)$rating, 1)); ?></span>
                    <span class="dspcRateCnt">(<?php echo (int)$rating_cnt; ?>)</span>
                  </div>
                <?php endif; ?>
              </div>

              <a class="dspcBtn" href="<?php echo esc_url($url); ?>">Подробнее</a>
            </div>
          </article>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>

    <?php endif; ?>

  </div>

  <style>
    /* ===== Base card styles (твои, чуть унифицировал) ===== */
    .dsProductBlock{ width:100%; }

    .dspcCard{
      border: 1px solid rgba(0,0,0,.08);
      border-radius: 16px;
      overflow: hidden;
      background: #fff;
      display:flex;
      flex-direction:column;
      min-height: 100%;
      transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
      box-shadow: 0 6px 18px rgba(0,0,0,.04);
    }
    .dspcCard:hover{
      transform: translateY(-2px);
      border-color: rgba(0,0,0,.14);
      box-shadow: 0 10px 26px rgba(0,0,0,.08);
    }

    .dspcMedia{
      position: relative;
      display:block;
      width:100%;
      aspect-ratio: 4 / 3;
      background: #f3f4f6;
      overflow:hidden;
    }
    .dspcMedia img{
      width:100%;
      height:100%;
      object-fit:cover;
      display:block;
      transition: transform .25s ease;
    }
    .dspcCard:hover .dspcMedia img{ transform: scale(1.03); }

    .dspcBadges{
      position:absolute;
      left:10px;
      top:10px;
      display:flex;
      gap:8px;
      flex-wrap:wrap;
      z-index:2;
    }
    .dspcBadge{
      font-size:12px;
      line-height: 1;
      padding:7px 10px;
      border-radius: 999px;
      background:#111;
      color:#fff;
      box-shadow: 0 6px 16px rgba(0,0,0,.18);
      opacity:.92;
    }
    .dspcBadge--sale{ background:#d32f2f; }
    .dspcBadge--new{ background:#2e7d32; }

    .dspcBody{
      padding: 12px 12px 14px;
      display:flex;
      flex-direction:column;
      gap: 10px;
      flex:1;
    }

    .dspcTitle{
      font-size: 14px;
      line-height: 1.25;
      font-weight: 600;
      text-decoration:none;
      color: inherit;
      display:-webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow:hidden;
      min-height: 2.5em;
    }

    .dspcMeta{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:10px;
      margin-top:auto;
    }

    .dspcPrice{ font-weight: 800; font-size: 14px; letter-spacing: .1px; }
    .dspcPrice del{ opacity: .55; font-weight: 600; }
    .dspcPrice ins{ text-decoration:none; }

    .dspcRating{
      display:inline-flex;
      align-items:center;
      gap:6px;
      font-size: 13px;
      opacity:.9;
      white-space: nowrap;
    }
    .dspcStar{ font-size: 14px; transform: translateY(-.5px); }
    .dspcRateCnt{ opacity:.7; }

    .dspcBtn{
      margin-top: 2px;
      display:inline-flex;
      align-items:center;
      justify-content:center;
      height: 42px;
      border-radius: 12px;
      border: 1px solid rgba(0,0,0,.14);
      background:#fff;
      text-decoration:none;
      font-weight: 700;
      font-size: 14px;
      color: inherit;
      transition: background .15s ease, transform .15s ease;
    }
    .dspcBtn:hover{ background:#f6f6f6; transform: translateY(-1px); }

    /* ===== GRID mode ===== */
    .dsProductCardsGrid{
      display:grid;
      grid-template-columns: repeat(var(--dspc-cols, 4), minmax(0, 1fr));
      gap: var(--dspc-gap, 14px);
      width: 100%;
    }
    @media (max-width: 1100px){ .dsProductCardsGrid{ grid-template-columns: repeat(3, minmax(0, 1fr)); } }
    @media (max-width: 820px){  .dsProductCardsGrid{ grid-template-columns: repeat(2, minmax(0, 1fr)); } }
    @media (max-width: 520px){  .dsProductCardsGrid{ grid-template-columns: 1fr; } }

    /* ===== CAROUSEL mode ===== */
    .dspcHead{
      display:flex;
      justify-content:flex-end;
      gap: 10px;
      margin-bottom: 10px;
    }
    .dspcNav{
      width: 42px;
      height: 42px;
      border-radius: 12px;
      border: 1px solid rgba(0,0,0,.12);
      background:#fff;
      font-weight: 900;
      font-size: 22px;
      line-height: 1;
      cursor:pointer;
      transition: transform .15s ease, background .15s ease;
    }
    .dspcNav:hover{ background:#f6f6f6; transform: translateY(-1px); }

    .dspcViewport{
      overflow: hidden;
      width: 100%;
      outline: none;
    }

    .dspcTrack{
      display:flex;
      gap: var(--dspc-gap, 14px);
      overflow-x: auto;
      scroll-snap-type: x mandatory;
      scroll-behavior: smooth;
      padding-bottom: 6px; /* чуть воздуха под скроллбар */
      -webkit-overflow-scrolling: touch;
    }

    /* Скрыть scrollbar аккуратно (не везде) */
    .dspcTrack::-webkit-scrollbar{ height: 8px; }
    .dspcTrack::-webkit-scrollbar-thumb{ background: rgba(0,0,0,.18); border-radius: 999px; }
    .dspcTrack::-webkit-scrollbar-track{ background: rgba(0,0,0,.06); border-radius: 999px; }

    .dspcSlide{
      scroll-snap-align: start;
      flex: 0 0 calc((100% - (var(--dspc-gap, 14px) * (var(--dspc-cols, 4) - 1))) / var(--dspc-cols, 4));
      min-width: 220px; /* защита от слишком узких карточек */
    }

    /* адаптив per-view */
    @media (max-width: 1100px){
      .dsProductBlock{ --dspc-cols: 3; }
    }
    @media (max-width: 820px){
      .dsProductBlock{ --dspc-cols: 2; }
    }
    @media (max-width: 520px){
      .dsProductBlock{ --dspc-cols: 1; }
      .dspcHead{ justify-content:space-between; }
    }

    /* dots (если включишь) */
    .dspcDots{
      margin-top: 12px;
      display:flex;
      gap: 8px;
      justify-content:center;
    }
    .dspcDot{
      width: 8px; height: 8px;
      border-radius: 999px;
      background: rgba(0,0,0,.18);
      border: 0;
      cursor:pointer;
    }
    .dspcDot.is-active{ background: rgba(0,0,0,.55); }
  </style>

  <script>
    (function(){
      const root = document.querySelector('.<?php echo esc_js($uid); ?>');
      if(!root) return;

      const mode = root.getAttribute('data-mode');
      if(mode !== 'carousel') return;

      const track = root.querySelector('.dspcTrack');
      const prev  = root.querySelector('.dspcPrev');
      const next  = root.querySelector('.dspcNext');
      const dotsWrap = root.querySelector('.dspcDots');

      function getCols(){
        const val = getComputedStyle(root).getPropertyValue('--dspc-cols').trim();
        const cols = parseInt(val || '4', 10);
        return isNaN(cols) ? 4 : cols;
      }
      function getGap(){
        const val = getComputedStyle(root).getPropertyValue('--dspc-gap').trim().replace('px','');
        const gap = parseFloat(val || '14');
        return isNaN(gap) ? 14 : gap;
      }
      function slideStep(){
        // шаг = ширина одного слайда + gap
        const cols = getCols();
        const gap = getGap();
        const step = (track.clientWidth - gap * (cols - 1)) / cols + gap;
        return Math.max(200, step);
      }

      function scrollByDir(dir){
        track.scrollBy({ left: dir * slideStep(), behavior: 'smooth' });
      }

      if(prev && next){
        prev.addEventListener('click', () => scrollByDir(-1));
        next.addEventListener('click', () => scrollByDir(1));
      }

      // keyboard support
      const viewport = root.querySelector('.dspcViewport');
      if(viewport){
        viewport.addEventListener('keydown', (e) => {
          if(e.key === 'ArrowLeft'){ e.preventDefault(); scrollByDir(-1); }
          if(e.key === 'ArrowRight'){ e.preventDefault(); scrollByDir(1); }
        });
      }

      // optional dots
      if(dotsWrap){
        const slides = Array.from(root.querySelectorAll('.dspcSlide'));
        const dots = slides.map((_, i) => {
          const b = document.createElement('button');
          b.className = 'dspcDot' + (i===0 ? ' is-active' : '');
          b.type = 'button';
          b.setAttribute('aria-label', 'Слайд ' + (i+1));
          b.addEventListener('click', () => {
            slides[i].scrollIntoView({ behavior: 'smooth', inline: 'start', block: 'nearest' });
          });
          dotsWrap.appendChild(b);
          return b;
        });

        // обновлять active dot по ближайшему слайду
        const obs = new IntersectionObserver((entries)=>{
          let best = null;
          entries.forEach(en => {
            if(en.isIntersecting){
              if(!best || en.intersectionRatio > best.intersectionRatio) best = en;
            }
          });
          if(best){
            const idx = slides.indexOf(best.target);
            dots.forEach((d,j)=> d.classList.toggle('is-active', j===idx));
          }
        }, { root: track, threshold: [0.55, 0.7, 0.85] });

        slides.forEach(s => obs.observe(s));
      }
    })();
  </script>

  <?php
  return ob_get_clean();
});












/**
 * Shortcode: [ds_bottom_form]
 * AJAX send -> admin_email via wp_mail()
 * Верстка формы: строго как в примере пользователя
 */

add_shortcode('ds_bottom_form', function($atts){
  // nonce для ajax
  $nonce = wp_create_nonce('ds_bottom_form_nonce');

  ob_start(); ?>
<section class="BottomForm__wrapper componentWrapper BottomForm_wrapper___L0wt" id="bottom-form">
    <div class="container">
        <div class="BottomForm__inner BottomForm_inner__yOz_E">
            <div class="ContactForm ContactForm_wrapper__hzvrb BottomForm__form BottomForm_form__wQSfo ContactForm_dark__qvyR0">
                <div class="ContactForm__title ContactForm_title__PcRmf">
                    Нужен сайт или доработка на WordPress?
                </div>
                <div class="ContactForm__subtitle ContactForm_subtitle__ci0oX">
                    Оставьте заявку — обсудим задачу, предложим решение и ориентировочную стоимость разработки.
                </div>

                <form class="ContactForm__form ContactForm_form__ZgtPw" method="post" action="#">
                    <!-- технические поля для ajax (не ломают верстку) -->
                    <input type="hidden" name="action" value="ds_bottom_form_send">
                    <input type="hidden" name="nonce" value="<?php echo esc_attr($nonce); ?>">

                    <fieldset class="ContactForm__fields row ContactForm_fields__BgVRS">
                        <div class="col-12 col-sm-6">
                            <div class="field field--masked ContactForm__field ContactForm_field__f3xBQ">
                                <div class="fieldInput fieldInput--v2 fieldInput--dark">
                                    <input
                                        autocomplete="tel-country-code"
                                        inputmode="tel"
                                        name="phone"
                                        placeholder="Номер телефона*"
                                        type="text"
                                        value=""
                                        required
                                    />
                                    <label class="fieldPlaceholder">Номер телефона*</label>
                                    <fieldset aria-hidden="true" class="fieldOutline">
                                        <legend><span>Номер телефона*</span></legend>
                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="field ContactForm__field ContactForm_field__f3xBQ">
                                <div class="fieldInput fieldInput--v2 fieldInput--dark">
                                    <input
                                        autocomplete="url"
                                        inputmode="url"
                                        name="website"
                                        placeholder="Сайт (если уже есть)"
                                        type="text"
                                        value=""
                                    />
                                    <label class="fieldPlaceholder">Сайт (если уже есть)</label>
                                    <fieldset aria-hidden="true" class="fieldOutline">
                                        <legend><span>Сайт (если уже есть)</span></legend>
                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <!-- Кратко о задаче -->
                        <div class="col-12">
                            <div class="field ContactForm__field ContactForm_field__f3xBQ">
                                <div class="fieldInput fieldInput--v2 fieldInput--dark">
                                    <input autocomplete="url" inputmode="url" name="website" placeholder="Кратко о задаче" type="text" value="">
                                    <label class="fieldPlaceholder">Кратко о задаче</label>
                                    <fieldset aria-hidden="true" class="fieldOutline">
                                        <legend><span>Кратко о задаче</span></legend>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="ContactForm__footer ContactForm_footer__LZ47q">
                        <button class="ContactForm__btn btnRed ContactForm_btn__dh5HG" type="submit">
                            Обсудить проект
                        </button>
                    </div>

                    <div class="ContactForm__privacy ContactForm_privacy__LyZ4y">
                        <span>
                            <!--noindex-->
                            <!--googleoff: all-->
                        </span>

                        <label class="Agree_label__Ra_Cy Agree_labelDark__FAnOd">
                            <input name="agree" required type="checkbox" value="1" />
                            <div class="Agree_checkbox__a6Zei"></div>
                            <div>
                                Я даю согласие на обработку моих персональных данных и подтверждаю,
                                что ознакомлен(а) с
                                <a href="/privacy" rel="nofollow" target="_blank" title="Политика конфиденциальности">
                                    Политикой конфиденциальности
                                </a>
                                и
                                <a href="/user-agreement" rel="nofollow" target="_blank" title="Пользовательское соглашение">
                                    Пользовательским соглашением
                                </a>.
                            </div>
                        </label>

                        <span>
                            <!--googleon: all-->
                            <!--/noindex-->
                        </span>
                    </div>

                    <!-- место под сообщение (без стилей, чтобы не трогать дизайн) -->
                    <div class="ds-bottom-form-msg" aria-live="polite"></div>
                </form>
            </div>

            <img
                alt="Разработка и поддержка на WordPress"
                class="BottomForm__img BottomForm_img__H_ghr"
                data-nimg="1"
                decoding="async"
                height="591"
                loading="lazy"
                src="https://itb-company.com/_next/static/media/bottom-form-img.8bacb852.svg"
                style="color:transparent"
                width="592"
            />
        </div>
    </div>
</section>
  <?php
  return ob_get_clean();
});


/**
 * BottomForm: JS (AJAX + reCAPTCHA v3) + PHP handler
 * reCAPTCHA v3 keys:
 * SITE_KEY  = 6LdWgEcsAAAAAGSKvVf_ZHIWBHHf5Q5C8mA2ILiP
 * SECRET    = 6LdWgEcsAAAAAN3WpoewpSsFdQtY7BBTySXs737d
 */

add_action('wp_enqueue_scripts', function () {

  // 1) Google reCAPTCHA v3 script (обязательно, иначе grecaptcha undefined)
  wp_enqueue_script(
    'google-recaptcha-v3',
    'https://www.google.com/recaptcha/api.js?render=6LdWgEcsAAAAAGSKvVf_ZHIWBHHf5Q5C8mA2ILiP',
    [],
    null,
    true
  );

  // 2) Пустой хэндл под инлайн JS
  wp_register_script('ds-bottom-form-js', '', [], '1.1.0', true);
  wp_enqueue_script('ds-bottom-form-js');

  // 3) Глобальные настройки
  wp_add_inline_script('ds-bottom-form-js', 'window.DS_BF = ' . wp_json_encode([
    'ajaxurl'   => admin_url('admin-ajax.php'),
    'site_key'  => '6LdWgEcsAAAAAGSKvVf_ZHIWBHHf5Q5C8mA2ILiP',
    'action'    => 'ds_bottom_form',
  ]) . ';', 'before');

  // 4) Основной JS
  wp_add_inline_script('ds-bottom-form-js', <<<JS
(function(){
  "use strict";

  function q(root, sel){ return root ? root.querySelector(sel) : null; }
  function qa(root, sel){ return root ? Array.prototype.slice.call(root.querySelectorAll(sel)) : []; }

  function setMsg(form, text){
    var box = q(form, '.ds-bottom-form-msg');
    if(!box) return;
    box.textContent = text || '';
    box.style.marginTop = text ? '12px' : '';
    box.style.opacity = text ? '1' : '';
  }

  function getByPlaceholder(form, ph){
    var els = qa(form, 'input, textarea');
    for(var i=0;i<els.length;i++){
      var p = (els[i].getAttribute('placeholder') || '').trim();
      if(p === ph) return els[i];
    }
    return null;
  }

  function getRecaptchaToken(){
    return new Promise(function(resolve, reject){
      var cfg = window.DS_BF || {};
      if(!window.grecaptcha || !grecaptcha.ready){
        reject(new Error('reCAPTCHA не загрузилась (возможен блокировщик/кэш/дефер).'));
        return;
      }
      grecaptcha.ready(function(){
        grecaptcha.execute(cfg.site_key, { action: cfg.action })
          .then(resolve)
          .catch(function(){ reject(new Error('Не удалось получить токен reCAPTCHA.')); });
      });
    });
  }

  function isThisBottomForm(form){
    // Фильтр: у формы должны быть hidden action=ds_bottom_form_send и nonce
    var actionEl = q(form, 'input[name="action"]');
    var nonceEl  = q(form, 'input[name="nonce"]');
    if(!actionEl || !nonceEl) return false;
    return (actionEl.value === 'ds_bottom_form_send');
  }

  document.addEventListener('submit', function(e){
    var form = e.target;
    if(!form || !form.classList || !form.classList.contains('ContactForm__form')) return;
    if(!isThisBottomForm(form)) return;

    // fallback: если нет fetch/FormData — не мешаем обычному submit
    if(!window.fetch || !window.FormData) return;

    e.preventDefault();
    setMsg(form, '');

    var phoneEl = q(form, 'input[name="phone"]');
    var agreeEl = q(form, 'input[name="agree"]');
    var nonceEl = q(form, 'input[name="nonce"]');

    var websiteEl = getByPlaceholder(form, 'Сайт (если уже есть)');
    var taskEl    = getByPlaceholder(form, 'Кратко о задаче');

    var phone   = phoneEl ? (phoneEl.value || '').trim() : '';
    var website = websiteEl ? (websiteEl.value || '').trim() : '';
    var task    = taskEl ? (taskEl.value || '').trim() : '';

    if(!agreeEl || !agreeEl.checked){
      setMsg(form, 'Нужно подтвердить согласие.');
      return;
    }
    if(phone.length < 6){
      setMsg(form, 'Укажите корректный номер телефона.');
      return;
    }

    var btn = q(form, 'button[type="submit"]');
    var old = btn ? btn.textContent : '';
    if(btn){ btn.disabled = true; btn.textContent = 'Отправляю...'; }

    getRecaptchaToken()
      .then(function(token){
        var fd = new FormData();
        fd.append('action', 'ds_bottom_form_send');
        fd.append('nonce', nonceEl ? nonceEl.value : '');
        fd.append('phone', phone);
        fd.append('website', website);
        fd.append('task', task);

        // reCAPTCHA token
        fd.append('g-recaptcha-response', token);

        var ajaxurl = (window.DS_BF && DS_BF.ajaxurl) ? DS_BF.ajaxurl : '/wp-admin/admin-ajax.php';

        return fetch(ajaxurl, {
          method: 'POST',
          body: fd,
          credentials: 'same-origin',
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });
      })
      .then(function(r){ return r.json().catch(function(){ return null; }); })
      .then(function(data){
        if(data && data.success){
          setMsg(form, (data.data && data.data.message) ? data.data.message : 'Отправлено!');
          form.reset();
        } else {
          var m = (data && data.data && data.data.message) ? data.data.message : 'Ошибка отправки. Попробуйте позже.';
          setMsg(form, m);
        }
      })
      .catch(function(err){
        setMsg(form, (err && err.message) ? err.message : 'Ошибка сети. Попробуйте позже.');
      })
      .finally(function(){
        if(btn){ btn.disabled = false; btn.textContent = old || 'Обсудить проект'; }
      });

  }, true);
})();
JS
  );
});


/**
 * PHP обработчик AJAX + reCAPTCHA v3 verify
 */
add_action('wp_ajax_ds_bottom_form_send', 'ds_bottom_form_send');
add_action('wp_ajax_nopriv_ds_bottom_form_send', 'ds_bottom_form_send');

function ds_bottom_form_send(){

  // 1) nonce
  $nonce = isset($_POST['nonce']) ? sanitize_text_field(wp_unslash($_POST['nonce'])) : '';
  if (!wp_verify_nonce($nonce, 'ds_bottom_form_nonce')) {
    wp_send_json_error(['message' => 'Ошибка безопасности (nonce). Обновите страницу.'], 403);
  }

  // 2) reCAPTCHA v3
  $token = isset($_POST['g-recaptcha-response']) ? sanitize_text_field(wp_unslash($_POST['g-recaptcha-response'])) : '';
  if ($token === '') {
    wp_send_json_error(['message' => 'Подтвердите, что вы не робот (reCAPTCHA).'], 400);
  }

  $secret = '6LdWgEcsAAAAAN3WpoewpSsFdQtY7BBTySXs737d';
  $verify = wp_remote_post('https://www.google.com/recaptcha/api/siteverify', [
    'timeout' => 8,
    'body' => [
      'secret'   => $secret,
      'response' => $token,
      'remoteip' => $_SERVER['REMOTE_ADDR'] ?? '',
    ],
  ]);

  if (is_wp_error($verify)) {
    wp_send_json_error(['message' => 'Ошибка проверки reCAPTCHA.'], 500);
  }

  $body = json_decode(wp_remote_retrieve_body($verify), true);
  $score  = isset($body['score']) ? (float)$body['score'] : 0.0;
  $action = $body['action'] ?? '';

  // action должен совпадать с JS: ds_bottom_form
  if (empty($body['success']) || $action !== 'ds_bottom_form' || $score < 0.5) {
    // если будут ложные срабатывания — опусти порог до 0.3
    wp_send_json_error(['message' => 'reCAPTCHA не пройдена. Попробуйте ещё раз.'], 400);
  }

  // 3) data
  $phone   = isset($_POST['phone']) ? sanitize_text_field(wp_unslash($_POST['phone'])) : '';
  $website = isset($_POST['website']) ? sanitize_text_field(wp_unslash($_POST['website'])) : '';
  $task    = isset($_POST['task']) ? sanitize_text_field(wp_unslash($_POST['task'])) : '';

  if (mb_strlen($phone) < 6) {
    wp_send_json_error(['message' => 'Укажите корректный номер телефона.'], 422);
  }

  // 4) mail
  $to = get_option('admin_email');
  $site_name = wp_specialchars_decode(get_bloginfo('name'), ENT_QUOTES);

  $subject = 'Новая заявка с формы (BottomForm)';
  $page = isset($_SERVER['HTTP_REFERER']) ? esc_url_raw(wp_unslash($_SERVER['HTTP_REFERER'])) : '';
  $ip   = $_SERVER['REMOTE_ADDR'] ?? '';
  $ua   = $_SERVER['HTTP_USER_AGENT'] ?? '';

  $message  = "Сайт: {$site_name}\n";
  $message .= "Телефон: {$phone}\n";
  $message .= "Сайт (если уже есть): " . ($website !== '' ? $website : '-') . "\n";
  $message .= "Кратко о задаче: " . ($task !== '' ? $task : '-') . "\n";
  $message .= "Страница: " . ($page !== '' ? $page : '-') . "\n";
  $message .= "IP: {$ip}\n";
  $message .= "UA: {$ua}\n";

  $headers = ['Content-Type: text/plain; charset=UTF-8'];

  $sent = wp_mail($to, $subject, $message, $headers);
  if (!$sent) {
    wp_send_json_error(['message' => 'wp_mail не отправил письмо. Проверь SMTP/хостинг.'], 500);
  }

  wp_send_json_success(['message' => 'Заявка отправлена! Скоро свяжусь с вами.']);
}










/**
 * Подмена ссылки в хлебных крошках WooCommerce:
 * product-category/plugins/  ->  /plugins/
 */
add_filter('woocommerce_get_breadcrumb', function ($crumbs) {

  $target_from = home_url('/product-category/plugins/');
  $target_to   = home_url('/plugins/');

  foreach ($crumbs as $i => $crumb) {
    // $crumb = [ 'Название', 'URL' ]
    if (!empty($crumb[1])) {
      $url = rtrim($crumb[1], '/') . '/';

      // 1) точное совпадение
      if ($url === $target_from) {
        $crumbs[$i][1] = $target_to;
        continue;
      }

      // 2) на всякий случай: если где-то будет без / в конце
      if (strpos($url, '/product-category/plugins/') !== false) {
        $crumbs[$i][1] = $target_to;
      }
    }
  }

  return $crumbs;
}, 20);














// Отключаем emoji в WordPress
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');











/**
 * 1) AJAX add to cart (simple/variation) + возвращаем fragments
 */
add_action('wp_ajax_kwork_add_to_cart', 'kwork_ajax_add_to_cart');
add_action('wp_ajax_nopriv_kwork_add_to_cart', 'kwork_ajax_add_to_cart');

function kwork_ajax_add_to_cart() {
  if ( ! function_exists('WC') ) {
    wp_send_json_error(['message' => 'WooCommerce не активен.']);
  }

  // Нонс
  $nonce = isset($_POST['nonce']) ? sanitize_text_field($_POST['nonce']) : '';
  if ( ! wp_verify_nonce($nonce, 'kwork_add_to_cart') ) {
    wp_send_json_error(['message' => 'Security check failed.']);
  }

  $product_id   = isset($_POST['product_id']) ? absint($_POST['product_id']) : 0;
  $variation_id = isset($_POST['variation_id']) ? absint($_POST['variation_id']) : 0;
  $quantity     = isset($_POST['quantity']) ? max(1, absint($_POST['quantity'])) : 1;

  // Атрибуты вариации (если надо)
  $variation = [];
  if ( ! empty($_POST['variation']) && is_array($_POST['variation']) ) {
    foreach ($_POST['variation'] as $k => $v) {
      $variation[sanitize_text_field($k)] = sanitize_text_field($v);
    }
  }

  if ( ! $product_id ) {
    wp_send_json_error(['message' => 'Не передан product_id.']);
  }

  $product = wc_get_product($product_id);
  if ( ! $product ) {
    wp_send_json_error(['message' => 'Товар не найден.']);
  }

  // Добавляем
  if ( $variation_id ) {
    $added_key = WC()->cart->add_to_cart($product_id, $quantity, $variation_id, $variation);
  } else {
    $added_key = WC()->cart->add_to_cart($product_id, $quantity);
  }

  if ( ! $added_key ) {
    wp_send_json_error(['message' => 'Не удалось добавить в корзину. Проверь вариацию/наличие.']);
  }

  // Сообщения Woo (чтобы можно было показывать “Добавлено”)
  wc_add_to_cart_message([$product_id => $quantity], true);

  // Получаем fragments (как Woo: мини-корзина/счетчик)
  $fragments = apply_filters('woocommerce_add_to_cart_fragments', []);

  wp_send_json_success([
    'message'   => wc_print_notices(true),
    'fragments' => $fragments,
    'cart_hash' => WC()->cart->get_cart_hash(),
    'count'     => WC()->cart->get_cart_contents_count(),
  ]);
}

/**
 * 2) Регистрируем и подключаем скрипт ТОЛЬКО на страницах WooCommerce
 */
add_action('wp_enqueue_scripts', function () {
  if ( ! function_exists('is_woocommerce') ) return;

  // показывать только на woocommerce страницах: shop/product/cart/checkout/account и т.п.
  if ( ! (is_woocommerce() || is_cart() || is_checkout() || is_account_page()) ) return;

  wp_register_script(
    'kwork-ajax-cart',
    get_stylesheet_directory_uri() . '/assets/js/kwork-ajax-cart.js',
    [],
    '1.0.0',
    true
  );

  wp_localize_script('kwork-ajax-cart', 'KWORK_CART', [
    'ajaxurl' => admin_url('admin-ajax.php'),
    'nonce'   => wp_create_nonce('kwork_add_to_cart'),
  ]);

  wp_enqueue_script('kwork-ajax-cart');
}, 20);

/**
 * 3) Fragments: счетчик/иконка корзины в шапке должен обновляться
 *    Важно: fragment key — CSS селектор элемента, который заменяем.
 */
add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
  // этот html должен существовать в шапке
  ob_start(); ?>
    <a class="kworkCartIcon" href="<?php echo esc_url(wc_get_cart_url()); ?>" aria-label="Корзина">
      <span class="kworkCartIcon__svg" aria-hidden="true"><svg
  class="kworkCartIcon__svg"
  width="22"
  height="22"
  viewBox="0 0 24 24"
  fill="none"
  xmlns="http://www.w3.org/2000/svg"
  aria-hidden="true"
>
  <path
    d="M3 4H5.4L7.1 14.2C7.2 14.7 7.6 15 8.1 15H18.4C18.9 15 19.3 14.7 19.4 14.2L20.8 7H6.2"
    stroke="white"
    stroke-width="1.8"
    stroke-linecap="round"
    stroke-linejoin="round"
  />
  <circle cx="9" cy="19" r="1.6" fill="white"/>
  <circle cx="17" cy="19" r="1.6" fill="white"/>
</svg>
</span>
      <span class="kworkCartIcon__count"><?php echo (int) WC()->cart->get_cart_contents_count(); ?></span>
    </a>
  <?php
  $fragments['a.kworkCartIcon'] = ob_get_clean();
  return $fragments;
});

/**
 * 4) Шорткод для вывода иконки корзины (вставишь в header.php или в блок Elementor)
 */
add_shortcode('kwork_cart_icon', function () {
  if ( ! function_exists('WC') ) return '';

  // Только на WooCommerce страницах
  if ( ! (function_exists('is_woocommerce') && (is_woocommerce() || is_cart() || is_checkout() || is_account_page())) ) {
    return '';
  }

  return sprintf(
    '<a class="kworkCartIcon" href="%s" aria-label="Корзина"><span class="kworkCartIcon__svg" aria-hidden="true"><svg
  class="kworkCartIcon__svg"
  width="22"
  height="22"
  viewBox="0 0 24 24"
  fill="none"
  xmlns="http://www.w3.org/2000/svg"
  aria-hidden="true"
>
  <path
    d="M3 4H5.4L7.1 14.2C7.2 14.7 7.6 15 8.1 15H18.4C18.9 15 19.3 14.7 19.4 14.2L20.8 7H6.2"
    stroke="white"
    stroke-width="1.8"
    stroke-linecap="round"
    stroke-linejoin="round"
  />
  <circle cx="9" cy="19" r="1.6" fill="white"/>
  <circle cx="17" cy="19" r="1.6" fill="white"/>
</svg>
</span><span class="kworkCartIcon__count">%d</span></a>',
    esc_url(wc_get_cart_url()),
    (int) WC()->cart->get_cart_contents_count()
  );
});












add_action('wp_head', 'wpds_schema_plugins_product_and_faq', 20);

function wpds_schema_plugins_product_and_faq() {

    // 1) Конфигурация схем для страниц-плагинов (дальше сюда добавишь другие)
    $schemas = [
        'hivepress-map-listings' => [
            'name'        => 'HivePress Map Listings',
            'description' => 'Плагин для HivePress, который добавляет интерактивную карту с объявлениями на сайт WordPress.',
            'image'       => 'https://wpdevstudio.ru/wp-content/uploads/2025/12/44390067-68a873ca50558.jpg', // заменишь на реальную

            // Варианты (пакеты/тарифы)
            'currency' => 'RUB',
            'offers' => [
                [
                    'name'  => 'Базовый',
                    'price' => 3500,
                    'availability' => 'https://schema.org/InStock',
                ],
                [
                    'name'  => 'Стандарт',
                    'price' => 8000,
                    'availability' => 'https://schema.org/InStock',
                ],
                [
                    'name'  => 'Премиум',
                    'price' => 18000,
                    'availability' => 'https://schema.org/InStock',
                ],
            ],

            // FAQ (вопросы должны реально быть на странице)
            'faq' => [
                [
                    'q' => 'Нужно ли покупать лицензию Яндекс Карт?',
                    'a' => 'Да, для работы карты требуется API-ключ Яндекс Карт.
Если у вас его нет — я помогу получить и правильно подключить.'
                ],
                [
                    'q' => 'Поддерживается ли HivePress?',
                    'a' => 'Да, плагин полностью совместим с HivePress и корректно работает с объявлениями,
категориями и пользовательскими типами данных.'
                ],
                [
                    'q' => 'Можно ли изменить внешний вид карты?',
                    'a' => 'Да, можно настроить внешний вид карты, маркеров и карточек объявлений.
Это входит в расширенные пакеты или может быть добавлено отдельно.'
                ],
            ],
			
        ],
    ];

    // 2) Проверка: это нужная страница?
    if (!is_singular('page')) {
        return;
    }

    $slug = get_post_field('post_name', get_queried_object_id());
    if (empty($slug) || !isset($schemas[$slug])) {
        return;
    }

    $cfg = $schemas[$slug];

    // 3) Готовим offers для AggregateOffer
    $offers = [];
    $prices = [];

    foreach ((array) $cfg['offers'] as $o) {
        if (!isset($o['price']) || !is_numeric($o['price'])) {
            continue;
        }

        $price = (float) $o['price'];
        $prices[] = $price;

        $offers[] = [
            '@type' => 'Offer',
            'url'   => get_permalink(),
            'priceCurrency' => $cfg['currency'],
            'price' => (string) $price,
            'availability' => !empty($o['availability']) ? $o['availability'] : 'https://schema.org/InStock',
            // Важно: variant можно передать так (Google иногда учитывает)
            'name'  => !empty($o['name']) ? $o['name'] : $cfg['name'],
            'itemCondition' => 'https://schema.org/NewCondition',
        ];
    }

    // Если цен нет — не выводим offers (чтобы не было мусора)
    $aggregate_offer = null;
    if (!empty($prices)) {
        $aggregate_offer = [
            '@type' => 'AggregateOffer',
            'priceCurrency' => $cfg['currency'],
            'lowPrice'  => (string) min($prices),
            'highPrice' => (string) max($prices),
            'offerCount' => count($prices),
            'offers' => $offers,
            'url' => get_permalink(),
            'availability' => 'https://schema.org/InStock',
        ];
    }

    // 4) Product schema
    $product_schema = [
        '@context' => 'https://schema.org/',
        '@type'    => 'Product',
        'name'        => $cfg['name'],
        'description' => $cfg['description'],
        'image'       => $cfg['image'],
        'brand' => [
            '@type' => 'Brand',
            'name'  => 'WP Dev Studio'
        ],
    ];

    if ($aggregate_offer) {
        $product_schema['offers'] = $aggregate_offer;
    }

    // 5) FAQ schema
    $faq_entities = [];
    foreach ((array) $cfg['faq'] as $f) {
        if (empty($f['q']) || empty($f['a'])) {
            continue;
        }
        $faq_entities[] = [
            '@type' => 'Question',
            'name'  => wp_strip_all_tags($f['q']),
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => wp_strip_all_tags($f['a']),
            ]
        ];
    }

    $faq_schema = null;
    if (!empty($faq_entities)) {
        $faq_schema = [
            '@context' => 'https://schema.org',
            '@type'    => 'FAQPage',
            'mainEntity' => $faq_entities,
        ];
    }

    // 6) Вывод: ВАЖНО — каждый JSON-LD в отдельном <script>
    // (так правильнее, чем “склеивать” два JSON в один script)
    echo "\n<!-- WPDS Schema: Product -->\n";
    echo '<script type="application/ld+json">' . wp_json_encode($product_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "</script>\n";

    if ($faq_schema) {
        echo "\n<!-- WPDS Schema: FAQ -->\n";
        echo '<script type="application/ld+json">' . wp_json_encode($faq_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "</script>\n";
    }
}









add_action('wp_enqueue_scripts', function () {

    $css = '
        .container {
            width: 100% !important;
            max-width: 100% !important;
        }
    ';

    // Подключаем к основному стилю темы
    wp_add_inline_style('theme-style', $css);

}, 999);
















/**
 * AJAX форма без перезагрузки
 * Shortcode: [post_cta_form]
 */

/**
 * 1) Шорткод формы
 */
add_shortcode('post_cta_form', function () {

    $ajax_url = esc_url(admin_url('admin-ajax.php'));

    ob_start(); ?>
    
    <form class="postCta__form js-post-cta-form" method="post" action="<?php echo $ajax_url; ?>">
        <input type="hidden" name="action" value="post_cta_submit">
        <input type="hidden" name="post_cta_nonce" value="<?php echo esc_attr(wp_create_nonce('post_cta_ajax_nonce')); ?>">

        <!-- honeypot -->
        <input type="text" name="pcf_website" value="" style="display:none!important">

        <label class="postField">
            <span class="postField__label">Имя</span>
            <input class="postField__input" type="text" name="name" placeholder="Как к вам обращаться" required>
        </label>

        <label class="postField">
            <span class="postField__label">Телефон или Telegram</span>
            <input class="postField__input" type="text" name="contact" placeholder="+7… / @username" required>
        </label>

        <label class="postField postField--wide">
            <span class="postField__label">Коротко о задаче</span>
            <textarea class="postField__input postField__textarea" name="message" rows="3" placeholder="Что нужно сделать?" required></textarea>
        </label>

        <button class="postBtn postBtn--primary postBtn--block" type="submit">
            Отправить
        </button>

        <div class="postCta__response" style="margin-top:12px;"></div>

        <div class="postCta__note">
            Нажимая “Отправить”, вы соглашаетесь с обработкой персональных данных.
        </div>
    </form>

    <?php
    return ob_get_clean();
});


/**
 * 2) AJAX обработчик
 */
add_action('wp_ajax_post_cta_submit', 'post_cta_ajax_handler');
add_action('wp_ajax_nopriv_post_cta_submit', 'post_cta_ajax_handler');

function post_cta_ajax_handler() {

    // honeypot
    if (!empty($_POST['pcf_website'])) {
        wp_send_json_success(['message' => 'OK']);
    }

    // nonce
    if (
        empty($_POST['post_cta_nonce']) ||
        !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['post_cta_nonce'])), 'post_cta_ajax_nonce')
    ) {
        wp_send_json_error(['message' => 'Ошибка безопасности']);
    }

    $name    = sanitize_text_field(wp_unslash($_POST['name'] ?? ''));
    $contact = sanitize_text_field(wp_unslash($_POST['contact'] ?? ''));
    $message = sanitize_textarea_field(wp_unslash($_POST['message'] ?? ''));

    if (mb_strlen($name) < 2 || mb_strlen($contact) < 3 || mb_strlen($message) < 5) {
        wp_send_json_error(['message' => 'Заполните все поля корректно']);
    }

    // антифлуд по IP (60 сек)
    $ip = '';
    if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $ip = sanitize_text_field(wp_unslash($_SERVER['HTTP_CF_CONNECTING_IP']));
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $tmp = sanitize_text_field(wp_unslash($_SERVER['HTTP_X_FORWARDED_FOR']));
        $ip = trim(explode(',', $tmp)[0]);
    } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
        $ip = sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR']));
    }

    $rate_key = 'pcf_rate_' . md5($ip ?: 'noip');
    if (get_transient($rate_key)) {
        wp_send_json_error(['message' => 'Слишком часто. Попробуйте через минуту']);
    }
    set_transient($rate_key, 1, 60);

    // отправка письма
    $to = get_option('admin_email');
    $subject = 'Заявка с сайта: ' . wp_parse_url(home_url(), PHP_URL_HOST);

    $body  = "Имя: {$name}\n";
    $body .= "Контакт: {$contact}\n\n";
    $body .= "Задача:\n{$message}\n\n";
    $body .= "IP: " . ($ip ?: '-') . "\n";
    $body .= "Страница: " . (wp_get_referer() ?: '-') . "\n";

    $headers = ['Content-Type: text/plain; charset=UTF-8'];

    $sent = wp_mail($to, $subject, $body, $headers);

    if (!$sent) {
        wp_send_json_error(['message' => 'wp_mail не отправил письмо. Проверьте SMTP/почту']);
    }

    wp_send_json_success(['message' => 'Спасибо! Сообщение отправлено']);
}


/**
 * 3) Подключение JS (без jQuery), гарантированно
 */
add_action('wp_enqueue_scripts', function () {

    // регистрируем "пустой" скрипт, чтобы было к чему привязать inline
    wp_register_script('post-cta-ajax', '', [], null, true);
    wp_enqueue_script('post-cta-ajax');

    $ajax_url = esc_url_raw(admin_url('admin-ajax.php'));

    $js = "
    document.addEventListener('DOMContentLoaded', function() {

        document.addEventListener('submit', function(e) {
            const form = e.target.closest('.js-post-cta-form');
            if (!form) return;

            e.preventDefault();

            const responseBox = form.querySelector('.postCta__response');
            const button = form.querySelector('button[type=\"submit\"]');

            if (responseBox) responseBox.innerHTML = '';
            if (button) button.disabled = true;

            const data = new FormData(form);

            fetch('{$ajax_url}', {
                method: 'POST',
                body: data,
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {
                if (!responseBox) return;

                if (res.success) {
                    responseBox.innerHTML = '<div style=\"color:green\">' + res.data.message + '</div>';
                    form.reset();
                } else {
                    const msg = (res.data && res.data.message) ? res.data.message : 'Ошибка отправки';
                    responseBox.innerHTML = '<div style=\"color:red\">' + msg + '</div>';
                }
            })
            .catch(() => {
                if (responseBox) responseBox.innerHTML = '<div style=\"color:red\">Ошибка соединения</div>';
            })
            .finally(() => {
                if (button) button.disabled = false;
            });
        });

    });
    ";

    wp_add_inline_script('post-cta-ajax', $js);
}, 20);

















// Услуги
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Регистрация CPT "Услуги"
 */
add_action('init', 'ps_register_service_post_type');
function ps_register_service_post_type() {
	$labels = array(
		'name'               => 'Услуги',
		'singular_name'      => 'Услуга',
		'menu_name'          => 'Услуги',
		'name_admin_bar'     => 'Услуга',
		'add_new'            => 'Добавить',
		'add_new_item'       => 'Добавить услугу',
		'new_item'           => 'Новая услуга',
		'edit_item'          => 'Редактировать услугу',
		'view_item'          => 'Посмотреть услугу',
		'all_items'          => 'Все услуги',
		'search_items'       => 'Искать услуги',
		'not_found'          => 'Услуги не найдены',
		'not_found_in_trash' => 'В корзине услуг не найдено',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'show_in_rest'       => true,
		'menu_icon'          => 'dashicons-admin-tools',
		'supports'           => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'page-attributes',
		),
		'has_archive'        => 'services',
		'rewrite'            => array(
			'slug'       => 'services',
			'with_front' => false,
		),
		'menu_position'      => 6,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'map_meta_cap'       => true,
	);

	register_post_type('service', $args);
}

/**
 * Категории услуг
 */
add_action('init', 'ps_register_service_category_taxonomy');
function ps_register_service_category_taxonomy() {
	$labels = array(
		'name'              => 'Категории услуг',
		'singular_name'     => 'Категория услуги',
		'search_items'      => 'Искать категории',
		'all_items'         => 'Все категории',
		'parent_item'       => 'Родительская категория',
		'parent_item_colon' => 'Родительская категория:',
		'edit_item'         => 'Редактировать категорию',
		'update_item'       => 'Обновить категорию',
		'add_new_item'      => 'Добавить категорию',
		'new_item_name'     => 'Название новой категории',
		'menu_name'         => 'Категории услуг',
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'hierarchical'      => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array(
			'slug'         => 'service-category',
			'with_front'   => false,
			'hierarchical' => true,
		),
	);

	register_taxonomy('service_category', array('service'), $args);
}


/**
 * Шаблон архива услуг
 */
add_filter('template_include', 'ps_service_archive_template_include', 99);
function ps_service_archive_template_include($template) {
	if (is_post_type_archive('service')) {
		$custom_template = get_stylesheet_directory() . '/archive-service.php';

		if (file_exists($custom_template)) {
			return $custom_template;
		}
	}

	return $template;
}













if (!defined('ABSPATH')) {
	exit;
}

/**
 * Шорткод слайдера кейсов/услуг из ACF поля
 *
 * Использование:
 * [gl_related_cases_slider]
 * [gl_related_cases_slider field="service_related_cases" title="Другие услуги для вас" button_text="Смотреть каталог" button_url="/services/"]
 */
add_shortcode('gl_related_cases_slider', 'gl_related_cases_slider_shortcode');

function gl_related_cases_slider_shortcode($atts = []) {
	if (!is_singular()) {
		return '';
	}

	$atts = shortcode_atts([
		'field'       => 'service_related_cases',
		'title'       => 'Другие услуги для вас',
		'button_text' => 'Смотреть каталог',
		'button_url'  => '/services/',
		'post_id'     => get_the_ID(),
	], $atts, 'gl_related_cases_slider');

	$post_id = (int) $atts['post_id'];
	if (!$post_id) {
		return '';
	}

	if (!function_exists('get_field')) {
		return '';
	}

	$items = get_field($atts['field'], $post_id);

	if (empty($items) || !is_array($items)) {
		return '';
	}

	$normalized_posts = [];

	foreach ($items as $item) {
		if (is_object($item) && isset($item->ID)) {
			$normalized_posts[] = get_post($item->ID);
		} elseif (is_numeric($item)) {
			$normalized_posts[] = get_post((int) $item);
		}
	}

	$normalized_posts = array_filter($normalized_posts);

	if (empty($normalized_posts)) {
		return '';
	}

	$uid = 'gl-slider-' . wp_generate_password(6, false, false);

	ob_start();
	?>
	<div class="gl-related-slider" id="<?php echo esc_attr($uid); ?>">
		<div class="gl-related-slider__top">
			<h2 class="gl-related-slider__title"><?php echo esc_html($atts['title']); ?></h2>

			<div class="gl-related-slider__nav">
				<button class="gl-related-slider__arrow gl-related-slider__arrow--prev" type="button" aria-label="Назад">
					<span>‹</span>
				</button>
				<button class="gl-related-slider__arrow gl-related-slider__arrow--next" type="button" aria-label="Вперёд">
					<span>›</span>
				</button>
			</div>
		</div>

		<div class="gl-related-slider__viewport">
			<div class="gl-related-slider__track">
				<?php foreach ($normalized_posts as $related_post) : 
					$card_id    = $related_post->ID;
					$card_title = get_the_title($card_id);
					$card_url   = get_permalink($card_id);
					$thumb_url  = get_the_post_thumbnail_url($card_id, 'large');

					if (!$thumb_url) {
						$thumb_url = get_template_directory_uri() . '/assets/img/placeholder-service.jpg';
					}
					?>
					<article class="gl-related-slider__card">
						<a class="gl-related-slider__card-link" href="<?php echo esc_url($card_url); ?>">
							<div class="gl-related-slider__image-wrap">
								<img
									class="gl-related-slider__image"
									src="<?php echo esc_url($thumb_url); ?>"
									alt="<?php echo esc_attr($card_title); ?>"
									loading="lazy"
								>
								<div class="gl-related-slider__overlay"></div>
							</div>

							<div class="gl-related-slider__content">
								<h3 class="gl-related-slider__card-title"><?php echo esc_html($card_title); ?></h3>
							</div>
						</a>
					</article>
				<?php endforeach; ?>
			</div>
		</div>

		<?php if (!empty($atts['button_text']) && !empty($atts['button_url'])) : ?>
			<div class="gl-related-slider__bottom">
				<a class="gl-related-slider__catalog-btn" href="<?php echo esc_url($atts['button_url']); ?>">
					<?php echo esc_html($atts['button_text']); ?>
				</a>
			</div>
		<?php endif; ?>
	</div>

<style>
	.gl-related-slider {
	padding: 28px 0 12px;
}

.gl-related-slider__top {
	display: flex;
	align-items: center;
	justify-content: space-between;
	gap: 20px;
	margin-bottom: 28px;
}

.gl-related-slider__title {
	margin: 0;
	font-size: clamp(32px, 4vw, 58px);
	line-height: 1.02;
	letter-spacing: -0.03em;
	color: var(--gl-color-heading, #1A1A1A);
}

.gl-related-slider__nav {
	display: flex;
	align-items: center;
	gap: 10px;
	flex-shrink: 0;
}

.gl-related-slider__arrow {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 48px;
	height: 48px;
	padding: 0;
	border: 1px solid #e5e7eb;
	border-radius: 999px;
	background: #fff;
	color: #9ca3af;
	cursor: pointer;
	transition: .2s ease;
}

.gl-related-slider__arrow:hover {
	border-color: #d1d5db;
	color: #111827;
	transform: translateY(-1px);
}

.gl-related-slider__arrow span {
	font-size: 28px;
	line-height: 1;
	margin-top: -2px;
}

.gl-related-slider__viewport {
	overflow: hidden;
}

.gl-related-slider__track {
	display: flex;
	gap: 28px;
	overflow-x: auto;
	scroll-snap-type: x mandatory;
	scroll-behavior: smooth;
	padding-bottom: 8px;
	scrollbar-width: none;
}

.gl-related-slider__track::-webkit-scrollbar {
	display: none;
}

.gl-related-slider__card {
	flex: 0 0 calc(25% - 21px);
	min-width: 280px;
	scroll-snap-align: start;
}

.gl-related-slider__card-link {
	display: block;
	position: relative;
	text-decoration: none;
	border-radius: 34px;
	overflow: hidden;
	background: #111827;
	box-shadow: 0 14px 40px rgba(16, 24, 40, 0.08);
}

.gl-related-slider__image-wrap {
	position: relative;
	aspect-ratio: 0.78 / 1;
	background: #111827;
}

.gl-related-slider__image {
	width: 100%;
	height: 100%;
	object-fit: cover;
	display: block;
	transform: scale(1);
	transition: transform .35s ease;
}

.gl-related-slider__overlay {
	position: absolute;
	inset: 0;
	background: linear-gradient(180deg, rgba(10, 10, 10, 0.05) 0%, rgba(10, 10, 10, 0.52) 100%);
}

.gl-related-slider__card-link:hover .gl-related-slider__image {
	transform: scale(1.03);
}

.gl-related-slider__content {
	position: absolute;
	left: 0;
	right: 0;
	bottom: 0;
	padding: 24px 24px 26px;
	z-index: 2;
}

.gl-related-slider__card-title {
	margin: 0;
	font-size: clamp(18px, 2vw, 28px);
	line-height: 1.05;
	letter-spacing: -0.02em;
	color: #fff;
}

.gl-related-slider__bottom {
	display: flex;
	justify-content: center;
	margin-top: 34px;
}

.gl-related-slider__catalog-btn {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	min-width: 320px;
	min-height: 72px;
	padding: 0 28px;
	border-radius: 24px;
	background: #f1f3f5;
	color: #1A1A1A;
	font-size: 20px;
	font-weight: 500;
	line-height: 1;
	text-decoration: none;
	transition: .2s ease;
}

.gl-related-slider__catalog-btn:hover {
	background: #e9edf0;
	transform: translateY(-1px);
	color: #1A1A1A;
}

@media (max-width: 1199px) {
	.gl-related-slider__card {
		flex: 0 0 calc(33.333% - 19px);
	}
}

@media (max-width: 767px) {
	.gl-related-slider {
		padding: 20px 0 8px;
	}

	.gl-related-slider__top {
		align-items: flex-start;
		flex-direction: column;
		margin-bottom: 20px;
	}

	.gl-related-slider__card {
		flex: 0 0 82%;
		min-width: 82%;
	}

	.gl-related-slider__card-link {
		border-radius: 24px;
	}

	.gl-related-slider__content {
		padding: 18px 18px 20px;
	}

	.gl-related-slider__catalog-btn {
		width: 100%;
		min-width: 0;
		min-height: 60px;
		font-size: 18px;
		border-radius: 18px;
	}
}
</style>
	<?php
	return ob_get_clean();
}


add_action('wp_footer', 'gl_related_slider_inline_script', 99);
function gl_related_slider_inline_script() {
	?>
	<script>
	document.addEventListener('DOMContentLoaded', function () {
		const sliders = document.querySelectorAll('.gl-related-slider');

		sliders.forEach(function (slider) {
			const track = slider.querySelector('.gl-related-slider__track');
			const prev  = slider.querySelector('.gl-related-slider__arrow--prev');
			const next  = slider.querySelector('.gl-related-slider__arrow--next');

			if (!track || !prev || !next) return;

			const getScrollAmount = () => {
				const card = track.querySelector('.gl-related-slider__card');
				if (!card) return 320;

				const styles = window.getComputedStyle(track);
				const gap = parseInt(styles.columnGap || styles.gap || 28, 10) || 28;

				return card.getBoundingClientRect().width + gap;
			};

			prev.addEventListener('click', function () {
				track.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
			});

			next.addEventListener('click', function () {
				track.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
			});
		});
	});
	</script>
	<?php
}




















if (!defined('ABSPATH')) {
	exit;
}

/**
 * Шорткод слайдера статей из ACF поля
 *
 * Использование:
 * [gl_related_blog_slider]
 * [gl_related_blog_slider field="service_related_posts" title="Полезные статьи" button_text="Смотреть блог" button_url="/blog/"]
 */
add_shortcode('gl_related_blog_slider', 'gl_related_blog_slider_shortcode');

function gl_related_blog_slider_shortcode($atts = []) {
	if (!is_singular()) {
		return '';
	}

	$atts = shortcode_atts([
		'field'       => 'service_related_posts',
		'title'       => 'Полезные статьи',
		'button_text' => 'Смотреть блог',
		'button_url'  => '/blog/',
		'post_id'     => get_the_ID(),
	], $atts, 'gl_related_blog_slider');

	$post_id = (int) $atts['post_id'];
	if (!$post_id) {
		return '';
	}

	if (!function_exists('get_field')) {
		return '';
	}

	$items = get_field($atts['field'], $post_id);

	if (empty($items) || !is_array($items)) {
		return '';
	}

	$normalized_posts = [];

	foreach ($items as $item) {
		if (is_object($item) && isset($item->ID)) {
			$normalized_posts[] = get_post($item->ID);
		} elseif (is_numeric($item)) {
			$normalized_posts[] = get_post((int) $item);
		}
	}

	$normalized_posts = array_filter($normalized_posts);

	if (empty($normalized_posts)) {
		return '';
	}

	$uid = 'gl-blog-slider-' . wp_generate_password(6, false, false);

	ob_start();
	?>
	<div class="gl-blog-slider" id="<?php echo esc_attr($uid); ?>">
		<div class="gl-blog-slider__top">
			<h2 class="gl-blog-slider__title"><?php echo esc_html($atts['title']); ?></h2>

			<div class="gl-blog-slider__nav">
				<button class="gl-blog-slider__arrow gl-blog-slider__arrow--prev" type="button" aria-label="Назад">
					<span>‹</span>
				</button>
				<button class="gl-blog-slider__arrow gl-blog-slider__arrow--next" type="button" aria-label="Вперёд">
					<span>›</span>
				</button>
			</div>
		</div>

		<div class="gl-blog-slider__viewport">
			<div class="gl-blog-slider__track">
				<?php foreach ($normalized_posts as $related_post) : 
					$card_id      = $related_post->ID;
					$card_title   = get_the_title($card_id);
					$card_url     = get_permalink($card_id);
					$thumb_url    = get_the_post_thumbnail_url($card_id, 'large');
					$excerpt      = get_the_excerpt($card_id);

					if (!$excerpt) {
						$excerpt = wp_trim_words(wp_strip_all_tags(get_post_field('post_content', $card_id)), 18, '...');
					}
					?>
					<article class="gl-blog-slider__card">
						<a class="gl-blog-slider__card-link" href="<?php echo esc_url($card_url); ?>">
							<?php if ($thumb_url) : ?>
								<div class="gl-blog-slider__image-wrap">
									<img
										class="gl-blog-slider__image"
										src="<?php echo esc_url($thumb_url); ?>"
										alt="<?php echo esc_attr($card_title); ?>"
										loading="lazy"
									>
								</div>
							<?php endif; ?>

							<div class="gl-blog-slider__content">
								<div class="gl-blog-slider__meta">
									<span><?php echo esc_html(get_the_date('d.m.Y', $card_id)); ?></span>
								</div>

								<h3 class="gl-blog-slider__card-title"><?php echo esc_html($card_title); ?></h3>

								<div class="gl-blog-slider__excerpt">
									<?php echo esc_html($excerpt); ?>
								</div>

								<span class="gl-blog-slider__more">Читать статью</span>
							</div>
						</a>
					</article>
				<?php endforeach; ?>
			</div>
		</div>

		<?php if (!empty($atts['button_text']) && !empty($atts['button_url'])) : ?>
			<div class="gl-blog-slider__bottom">
				<a class="gl-blog-slider__catalog-btn" href="<?php echo esc_url($atts['button_url']); ?>">
					<?php echo esc_html($atts['button_text']); ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
<style>
	.gl-blog-slider {
	padding: 28px 0 12px;
}

.gl-blog-slider__top {
	display: flex;
	align-items: center;
	justify-content: space-between;
	gap: 20px;
	margin-bottom: 28px;
}

.gl-blog-slider__title {
	margin: 0;
	font-size: clamp(30px, 4vw, 52px);
	line-height: 1.04;
	letter-spacing: -0.03em;
	color: var(--gl-color-heading, #1A1A1A);
}

.gl-blog-slider__nav {
	display: flex;
	align-items: center;
	gap: 10px;
	flex-shrink: 0;
}

.gl-blog-slider__arrow {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 48px;
	height: 48px;
	padding: 0;
	border: 1px solid #e5e7eb;
	border-radius: 999px;
	background: #fff;
	color: #9ca3af;
	cursor: pointer;
	transition: .2s ease;
}

.gl-blog-slider__arrow:hover {
	border-color: #d1d5db;
	color: #111827;
	transform: translateY(-1px);
}

.gl-blog-slider__arrow span {
	font-size: 28px;
	line-height: 1;
	margin-top: -2px;
}

.gl-blog-slider__viewport {
	overflow: hidden;
}

.gl-blog-slider__track {
	display: flex;
	gap: 24px;
	overflow-x: auto;
	scroll-snap-type: x mandatory;
	scroll-behavior: smooth;
	padding-bottom: 8px;
	scrollbar-width: none;
}

.gl-blog-slider__track::-webkit-scrollbar {
	display: none;
}

.gl-blog-slider__card {
	flex: 0 0 calc(33.333% - 16px);
	min-width: 320px;
	scroll-snap-align: start;
}

.gl-blog-slider__card-link {
	display: flex;
	flex-direction: column;
	height: 100%;
	text-decoration: none;
	background: #fff;
	border: 1px solid #e5ebe7;
	border-radius: 28px;
	overflow: hidden;
	box-shadow: 0 14px 40px rgba(16, 24, 40, 0.05);
	transition: .2s ease;
}

.gl-blog-slider__card-link:hover {
	transform: translateY(-4px);
	border-color: #d6e5dc;
	box-shadow: 0 20px 48px rgba(16, 24, 40, 0.08);
}

.gl-blog-slider__image-wrap {
	aspect-ratio: 1.55 / 1;
	background: #f3f4f6;
	overflow: hidden;
}

.gl-blog-slider__image {
	width: 100%;
	height: 100%;
	object-fit: cover;
	display: block;
	transition: transform .35s ease;
}

.gl-blog-slider__card-link:hover .gl-blog-slider__image {
	transform: scale(1.03);
}

.gl-blog-slider__content {
	display: flex;
	flex-direction: column;
	flex: 1 1 auto;
	padding: 22px 22px 24px;
}

.gl-blog-slider__meta {
	margin-bottom: 12px;
	font-size: 13px;
	line-height: 1.4;
	color: var(--gl-color-subtitle, #6b7280);
}

.gl-blog-slider__card-title {
	margin: 0 0 12px;
	font-size: 24px;
	line-height: 1.15;
	letter-spacing: -0.02em;
	color: var(--gl-color-heading, #1A1A1A);
}

.gl-blog-slider__excerpt {
	margin-bottom: 18px;
	font-size: 15px;
	line-height: 1.75;
	color: var(--gl-color-text, #2B2B2B);
}

.gl-blog-slider__more {
	margin-top: auto;
	display: inline-flex;
	align-items: center;
	color: var(--gl-color-accent, #2cbc63);
	font-size: 15px;
	font-weight: 600;
	line-height: 1.2;
}

.gl-blog-slider__bottom {
	display: flex;
	justify-content: center;
	margin-top: 34px;
}

.gl-blog-slider__catalog-btn {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	min-width: 300px;
	min-height: 64px;
	padding: 0 24px;
	border-radius: 22px;
	background: #f1f3f5;
	color: #1A1A1A;
	font-size: 19px;
	font-weight: 500;
	line-height: 1;
	text-decoration: none;
	transition: .2s ease;
}

.gl-blog-slider__catalog-btn:hover {
	background: #e9edf0;
	transform: translateY(-1px);
	color: #1A1A1A;
}

@media (max-width: 991px) {
	.gl-blog-slider__card {
		flex: 0 0 calc(50% - 12px);
	}
}

@media (max-width: 767px) {
	.gl-blog-slider {
		padding: 20px 0 8px;
	}

	.gl-blog-slider__top {
		align-items: flex-start;
		flex-direction: column;
		margin-bottom: 20px;
	}

	.gl-blog-slider__card {
		flex: 0 0 86%;
		min-width: 86%;
	}

	.gl-blog-slider__card-link {
		border-radius: 22px;
	}

	.gl-blog-slider__content {
		padding: 18px 18px 20px;
	}

	.gl-blog-slider__card-title {
		font-size: 21px;
	}

	.gl-blog-slider__catalog-btn {
		width: 100%;
		min-width: 0;
		min-height: 58px;
		font-size: 17px;
		border-radius: 18px;
	}
}
</style>
	<?php
	return ob_get_clean();
}


add_action('wp_footer', 'gl_blog_slider_inline_script', 99);
function gl_blog_slider_inline_script() {
	?>
	<script>
	document.addEventListener('DOMContentLoaded', function () {
		const sliders = document.querySelectorAll('.gl-blog-slider');

		sliders.forEach(function (slider) {
			const track = slider.querySelector('.gl-blog-slider__track');
			const prev  = slider.querySelector('.gl-blog-slider__arrow--prev');
			const next  = slider.querySelector('.gl-blog-slider__arrow--next');

			if (!track || !prev || !next) return;

			const getScrollAmount = () => {
				const card = track.querySelector('.gl-blog-slider__card');
				if (!card) return 360;

				const styles = window.getComputedStyle(track);
				const gap = parseInt(styles.columnGap || styles.gap || 24, 10) || 24;

				return card.getBoundingClientRect().width + gap;
			};

			prev.addEventListener('click', function () {
				track.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
			});

			next.addEventListener('click', function () {
				track.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
			});
		});
	});
	</script>
	<?php
}



add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
});







/**
 * WooCommerce: текст "Договорная" вместо пустой цены.
 */
add_filter('woocommerce_empty_price_html', 'wpds_empty_price_contractual_text', 20, 2);

function wpds_empty_price_contractual_text($price_html, $product) {
	return '<span class="price price--contractual">Договорная</span>';
}




/**
 * WooCommerce: вместо пустой или нулевой цены выводим "Договорная".
 */
add_filter('woocommerce_get_price_html', 'wpds_contractual_price_html', 20, 2);

function wpds_contractual_price_html($price_html, $product) {
	if (!$product instanceof WC_Product) {
		return $price_html;
	}

	$price = $product->get_price();

	if ($price === '' || (float) $price <= 0) {
		return '<span class="price price--contractual">Договорная</span>';
	}

	return $price_html;
}

/**
 * ACF fields and helpers for YouTube videos on the front page and products.
 */
if (!function_exists('wpds_youtube_video_id')) {
	function wpds_youtube_video_id($url) {
		$url = trim((string) $url);

		if ($url === '') {
			return '';
		}

		if (preg_match('~^[A-Za-z0-9_-]{11}$~', $url)) {
			return $url;
		}

		$parts = wp_parse_url($url);
		if (empty($parts['host'])) {
			return '';
		}

		$host = strtolower(preg_replace('~^www\.~', '', $parts['host']));
		$path = isset($parts['path']) ? trim($parts['path'], '/') : '';

		if ($host === 'youtu.be' && $path !== '') {
			$segments = explode('/', $path);
			return preg_match('~^[A-Za-z0-9_-]{11}$~', $segments[0]) ? $segments[0] : '';
		}

		if (in_array($host, ['youtube.com', 'm.youtube.com', 'music.youtube.com', 'youtube-nocookie.com'], true)) {
			if (!empty($parts['query'])) {
				parse_str($parts['query'], $query);
				if (!empty($query['v']) && preg_match('~^[A-Za-z0-9_-]{11}$~', $query['v'])) {
					return $query['v'];
				}
			}

			if (preg_match('~(?:embed|shorts|live)/([A-Za-z0-9_-]{11})~', $path, $matches)) {
				return $matches[1];
			}
		}

		return '';
	}
}

if (!function_exists('wpds_youtube_embed_url')) {
	function wpds_youtube_embed_url($url) {
		$video_id = wpds_youtube_video_id($url);

		return $video_id ? 'https://www.youtube-nocookie.com/embed/' . rawurlencode($video_id) : '';
	}
}

if (!function_exists('wpds_youtube_thumbnail_url')) {
	function wpds_youtube_thumbnail_url($url) {
		$video_id = wpds_youtube_video_id($url);

		return $video_id ? 'https://img.youtube.com/vi/' . rawurlencode($video_id) . '/hqdefault.jpg' : '';
	}
}

add_action('acf/init', function () {
	if (!function_exists('acf_add_local_field_group')) {
		return;
	}

	acf_add_local_field_group([
		'key' => 'group_wpds_youtube_videos',
		'title' => 'YouTube видео',
		'fields' => [
			[
				'key' => 'field_wpds_home_youtube_videos',
				'label' => 'Видео для слайдера на главной',
				'name' => 'home_youtube_videos',
				'type' => 'repeater',
				'instructions' => 'Добавьте ссылки на YouTube-ролики. Слайдер выводится на странице с шаблоном Front Page.',
				'collapsed' => 'field_wpds_home_youtube_title',
				'button_label' => 'Добавить видео',
				'layout' => 'row',
				'sub_fields' => [
					[
						'key' => 'field_wpds_home_youtube_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
						'wrapper' => ['width' => '40'],
					],
					[
						'key' => 'field_wpds_home_youtube_url',
						'label' => 'Ссылка YouTube',
						'name' => 'url',
						'type' => 'url',
						'required' => 1,
						'wrapper' => ['width' => '60'],
					],
				],
			],
		],
		'location' => [
			[
				[
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-front-page.php',
				],
			],
			[
				[
					'param' => 'page_type',
					'operator' => '==',
					'value' => 'front_page',
				],
			],
		],
	]);

	acf_add_local_field_group([
		'key' => 'group_wpds_product_youtube_video',
		'title' => 'Видео товара',
		'fields' => [
			[
				'key' => 'field_wpds_product_youtube_video',
				'label' => 'YouTube видео товара',
				'name' => 'product_youtube_video',
				'type' => 'url',
				'instructions' => 'Укажите ссылку на одно видео YouTube. Оно появится первым слайдом в галерее товара.',
			],
		],
		'location' => [
			[
				[
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'product',
				],
			],
		],
	]);
});
