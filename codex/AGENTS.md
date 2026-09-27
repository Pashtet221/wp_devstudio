# Правила Codex для WPDevStudio

Этот репозиторий одновременно содержит код темы WordPress и клиент для Codex WordPress Bridge 0.8.x.

## Перед началом любой задачи с WordPress

1. Выполни:
   - `codex/scripts/wp health`
   - `codex/scripts/wp site`
   - `codex/scripts/wp schema`
2. Не предполагай названия CPT, таксономий и ACF-полей, если их можно получить через Bridge.
3. Если `health` не возвращает Bridge 0.8.x, не выполняй записи до диагностики совместимости.

## Маршрутизация задач

- PHP/CSS/JS/templates/functions.php: изменяй файлы этого репозитория.
- Pages/posts/services/cases/ACF/SEO/media: работай через `codex/scripts/wp`.
- Статический текст в PHP-шаблоне меняется в Git; контент из WordPress — через Bridge.
- Bridge не предназначен для удалённого редактирования файлов темы.

## Безопасность

- Не меняй WordPress Core, WooCommerce Core и сторонние плагины без отдельной задачи.
- Не добавляй секреты в Git.
- `WORDPRESS_URL`, `WORDPRESS_USERNAME`, `WORDPRESS_APP_PASSWORD` должны приходить из Codex Environment Variables или локального untracked `codex/config/.env`.
- Никогда не используй `.env.example` как источник реальных credentials.
- Перед записью прочитай объект; после записи перечитай и проверь результат.
- Не удаляй записи: Bridge 0.8.x намеренно не предоставляет destructive delete endpoint.
- Новые материалы создавай draft, если публикация не поручена явно и сервер не разрешает publish.

## ACF / SEO / таксономии

- Для ACF сначала используй `acf ID`; `acf-all ID` только когда действительно нужен полный поиск полей.
- Для SEO не принимай сохранённые meta-поля за фактический HTML без проверки публичной страницы.
- `assign-terms` заменяет весь набор терминов одной таксономии: сначала прочитай текущие назначения.

## Скриншоты и кейсы

- Для внешних сайтов используй `codex/scripts/wp capture`.
- Не сохраняй тяжёлые PNG вручную, если Bridge может создать WebP.
- Для кейсов предпочитай WebP до 1600 px, осмысленные filename/title/alt.
- Для блока используй `--selector`; для мобильного вида — `--mobile`.
- После capture используй возвращённый media id/url или Gutenberg block.

## SEO jobs

Для задач из `seo-jobs/inbox/` дополнительно соблюдай `seo-jobs/README.md` и execution_policy конкретного job.
