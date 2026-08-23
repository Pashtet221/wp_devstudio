# Codex WordPress Cloud — WPDevStudio

Этот каталог объединяет инструменты работы с WordPress-админкой с основным репозиторием темы `wp_devstudio`.

## Использование

Основной репозиторий теперь содержит:

- код WordPress-темы — в корне;
- Codex-инструменты для работы с контентом и админкой — в `codex/`.

Команды запускаются из корня репозитория:

```bash
codex/scripts/wp health
codex/scripts/wp pages
codex/scripts/wp posts
codex/scripts/wp services
codex/scripts/wp wp-plugins
```

Примеры записи:

```bash
codex/scripts/wp create codex/examples/create-page.json
codex/scripts/wp update POST_ID codex/examples/update-page.json
codex/scripts/wp update-acf POST_ID codex/examples/update-acf.json
```

SEO:

```bash
codex/scripts/wp seo POST_ID
codex/scripts/wp update-seo POST_ID payload.json
```

Медиа и скриншоты:

```bash
codex/scripts/wp capture https://example.com example-home --alt="Главная страница Example"
codex/scripts/wp media-upload ./image.webp --post-id=123 --alt="Описание" --title="Название"
```

## Переменные окружения

Не храните пароль приложения WordPress в GitHub.

Создайте переменные окружения в Codex / локальной оболочке:

```text
WORDPRESS_URL=https://wpdevstudio.ru
WORDPRESS_USERNAME=codex-agent
WORDPRESS_APP_PASSWORD=...
```

Шаблон лежит в `codex/config/.env.example`.
