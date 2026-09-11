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

## SEO Agent jobs

SEO-задачи от `wpdevstudio-seo-agent` поступают в `seo-jobs/inbox/`. Перед обработкой прочитай `seo-jobs/README.md`.

Правила маршрутизации:

- `execution_targets=["WORDPRESS_BRIDGE"]` — работай через `codex/scripts/wp`; не меняй файлы темы без отдельного обоснования.
- если присутствует `CODEX_REPOSITORY` — проверь соответствующие PHP/CSS/JS/template-файлы и подготовь reviewable изменение, но не deploy.
- `WP_CONTENT`, `SEO_METADATA`, `PAGE_OPTIMIZATION` — сначала прочитай текущий WordPress-объект и SEO-поля, затем проверь близкие страницы на дублирование/каннибализацию.
- `CONTENT_AND_TEMPLATE_AUDIT` — анализируй одновременно WordPress-контент и шаблон/компоненты темы.
- `TECHNICAL_HTTP_FIX`, `CANONICAL_REVIEW`, `CRAWLABILITY_FIX` — сначала установи фактическую причину, затем предлагай минимальное безопасное исправление.

Не обходи `execution_policy` из job. Если publish/deploy/destructive/slug/redirect запрещены — только подготовь изменение и результат.

Результат по каждому job сохраняй как `seo-jobs/results/<job_id>.json` по контракту из `seo-jobs/README.md`.

## Правила безопасности

- Не меняй WordPress Core, WooCommerce Core и сторонние плагины без прямой необходимости.
- Перед изменением объекта через API сначала прочитай его текущее состояние.
- После записи обязательно повторно прочитай объект и проверь результат.
- Не коммить пароли, Application Password, API-токены и `.env`.
- `WORDPRESS_URL`, `WORDPRESS_USERNAME`, `WORDPRESS_APP_PASSWORD` должны поступать из Environment Variables.
- Для более подробных правил административного агента см. `codex/AGENTS.md`.

Таким образом, для задач по WPDevStudio не требуется подключать отдельный репозиторий `codex-wpdevstudio`: работай только с этим репозиторием и выбирай файловый или API-режим в зависимости от задачи.
