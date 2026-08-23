# WPDevStudio — единый репозиторий

В этом репозитории находятся одновременно:

1. WordPress-тема WPDevStudio — файлы темы лежат в корне репозитория.
2. Инструменты доступа к WordPress-админке через Codex Bridge — каталог `codex/`.

## Работа с кодом сайта

Если задача относится к верстке, PHP, JS, CSS, шаблонам WordPress, `functions.php`, CPT-шаблонам или другим файлам темы — редактируй соответствующие файлы непосредственно в этом репозитории.

## Работа с админкой / базой WordPress

Если задача относится к страницам, записям, услугам, ACF, SEO, медиатеке или другим данным WordPress — используй:

```bash
codex/scripts/wp
```

Основные команды:

```bash
codex/scripts/wp health
codex/scripts/wp pages
codex/scripts/wp posts
codex/scripts/wp services
codex/scripts/wp find "строка"
codex/scripts/wp get ID
codex/scripts/wp acf ID
codex/scripts/wp seo ID
codex/scripts/wp update ID payload.json
codex/scripts/wp update-acf ID payload.json
codex/scripts/wp update-seo ID payload.json
codex/scripts/wp audit
```

## Правила безопасности

- Не меняй WordPress Core, WooCommerce Core и сторонние плагины без прямой необходимости.
- Перед изменением объекта через API сначала прочитай его текущее состояние.
- После записи обязательно повторно прочитай объект и проверь результат.
- Не коммить пароли, Application Password, API-токены и `.env`.
- `WORDPRESS_URL`, `WORDPRESS_USERNAME`, `WORDPRESS_APP_PASSWORD` должны поступать из Environment Variables.
- Для более подробных правил административного агента см. `codex/AGENTS.md`.

Таким образом, для задач по WPDevStudio не требуется подключать отдельный репозиторий `codex-wpdevstudio`: работай только с этим репозиторием и выбирай файловый или API-режим в зависимости от задачи.
