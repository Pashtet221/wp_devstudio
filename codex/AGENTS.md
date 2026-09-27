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

Если пользователь просит улучшить кейс и даёт ссылку на исходный сайт:

1. Найди существующий кейс через `cases` или `find`.
2. Прочитай его через `get ID`, при необходимости `acf ID`.
3. Составь короткий список визуальных доказательств: обычно главная, каталог/листинг, карточка товара/услуги, важный кастомный блок и при необходимости mobile. Не снимай десятки похожих кадров.
4. Создай manifest по примеру `codex/screenshots/example.manifest.json`.
5. Для серии кадров используй:
   `codex/scripts/wp case-capture MANIFEST.json`
6. Для одного кадра можно использовать:
   `codex/scripts/wp capture URL NAME [options]`
7. Все скриншоты должны сохраняться через Bridge в WordPress Media Library, а не в Git.
8. Для блока используй CSS selector; для mobile — `mobile: true` в manifest или `--mobile` для одиночного capture.
9. Используй осмысленные filename/title/alt, предпочтительно WebP до 1600 px.
10. Связывай каждый screenshot с разделом кейса через `section` и `note`.
11. После capture используй `media_id`, `media_url` или `gutenberg_block` при подготовке обновлённого содержания.
12. Перед обновлением кейса перечитай его. После `update`/`update-acf` перечитай ещё раз и проверь, что изображения и подписи стоят рядом с соответствующими разделами.
13. Не назначай screenshot featured image без явной причины.

Подробности: `codex/screenshots/README.md`.

## SEO jobs

Для задач из `seo-jobs/inbox/` дополнительно соблюдай `seo-jobs/README.md` и execution_policy конкретного job.
