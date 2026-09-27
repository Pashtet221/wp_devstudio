# Codex WordPress Bridge client — WPDevStudio

Каталог `codex/` — клиентская часть для работы Codex с установленным на `wpdevstudio.ru` плагином **Codex WordPress Bridge 0.8.x**.

Тема остаётся в корне репозитория. Код темы изменяется через Git, а контент WordPress — через Bridge API.

## Конфигурация

Рекомендуемый вариант для Codex — Environment Variables:

```text
WORDPRESS_URL=https://wpdevstudio.ru
WORDPRESS_USERNAME=codex-agent
WORDPRESS_APP_PASSWORD=<application password>
```

Для локальной работы можно создать `codex/config/.env`. Этот файл не должен попадать в Git.

`codex/config/.env.example` — только шаблон без пароля.

## Первичная проверка

```bash
codex/scripts/wp health
codex/scripts/wp site
codex/scripts/wp schema
```

Эти команды подтверждают версию Bridge, доступные CPT и возможности текущего пользователя.

## Чтение

```bash
codex/scripts/wp pages
codex/scripts/wp posts
codex/scripts/wp services
codex/scripts/wp cases
codex/scripts/wp list POST_TYPE
codex/scripts/wp find "строка"
codex/scripts/wp get ID
codex/scripts/wp acf ID
codex/scripts/wp acf-all ID
codex/scripts/wp seo ID
codex/scripts/wp taxonomies
codex/scripts/wp terms TAXONOMY
codex/scripts/wp menus
codex/scripts/wp seo-settings
codex/scripts/wp audit
```

## Запись

```bash
codex/scripts/wp create payload.json
codex/scripts/wp update ID payload.json
codex/scripts/wp update-acf ID payload.json
codex/scripts/wp update-seo ID payload.json
codex/scripts/wp assign-terms ID payload.json
codex/scripts/wp import-seo payload.json
```

Bridge 0.8.x не предоставляет удаление записей, поэтому delete-команд в клиенте нет.

## Медиа и скриншоты

```bash
codex/scripts/wp capture https://example.com example-home --alt="Главная страница Example"
codex/scripts/wp media-upload ./image.webp --post-id=123 --alt="Описание" --title="Название"
codex/scripts/wp thumbnail 123 456
```

Screenshot capture выполняется серверной частью Bridge. Для него на сервере должны быть доступны `exec()`, Node.js и bootstrap worker плагина.

## Правило разделения ответственности

- разметка, PHP, JS, CSS, templates -> Git;
- WordPress entities, ACF, SEO, media -> Bridge;
- после любой API-записи обязательно перечитать объект;
- не хранить Application Password, API keys или `.env` в репозитории.
