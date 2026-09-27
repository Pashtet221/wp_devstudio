# Screenshot module for WordPress cases

Модуль предназначен для подготовки кейсов: Codex получает ссылку на внешний сайт, снимает несколько нужных страниц или блоков через серверный screenshot endpoint Codex WordPress Bridge, сохраняет изображения прямо в WordPress Media Library и получает идентификаторы/URL для вставки в кейс.

## Основная команда

Сначала создай JSON-манифест. Пример: `codex/screenshots/example.manifest.json`.

Затем:

```bash
codex/scripts/wp case-capture codex/screenshots/example.manifest.json
```

Модуль обрабатывает все `items[]` по очереди. Каждый screenshot сразу загружается Bridge в WordPress Media Library. Если указан `post_id`, attachment привязывается к соответствующему кейсу/записи.

На выходе возвращается JSON:

```json
{
  "post_id": 123,
  "case_title": "Example",
  "count": 3,
  "items": [
    {
      "section": "Каталог",
      "source_url": "https://example.com/catalog/",
      "media_id": 456,
      "media_url": "https://wpdevstudio.ru/wp-content/uploads/...",
      "gutenberg_block": "<!-- wp:image ... -->"
    }
  ]
}
```

Если в манифесте задан `output`, тот же результат сохраняется локально в JSON и может быть использован следующей командой Codex при подготовке текста кейса.

## Поля items[]

- `url` — обязательный URL страницы.
- `section` — логическое название раздела кейса.
- `filename` — имя файла без необходимости вручную добавлять расширение.
- `selector` — CSS selector, если нужен отдельный блок, а не вся страница.
- `full_page` — полный screenshot страницы.
- `width`, `height`, `max_height`, `quality` — параметры capture.
- `mobile: true` — viewport 390×844.
- `alt`, `title`, `caption`, `description` — метаданные WordPress Media Library.
- `set_featured: true` — назначить screenshot изображением записи, если это действительно нужно.
- `note` — подсказка Codex, где использовать изображение в кейсе.

## Рекомендуемый workflow для кейса

1. Найти кейс:
   `codex/scripts/wp cases` или `codex/scripts/wp find "Название"`.
2. Прочитать его:
   `codex/scripts/wp get ID`, при необходимости `acf ID`.
3. Определить, каких визуальных доказательств не хватает: главная, каталог, товар, checkout, мобильный вид, важный кастомный блок.
4. Создать manifest с 3–8 осмысленными screenshot, а не десятками похожих кадров.
5. Выполнить `case-capture`.
6. Используя `media_id`, `media_url`, `gutenberg_block` и поле `section`, подготовить обновлённое содержание кейса.
7. Перед записью ещё раз прочитать текущий объект.
8. Обновить кейс через `codex/scripts/wp update ID payload.json` или ACF через `update-acf`.
9. Перечитать объект после записи и проверить публичную страницу.

## Хранение изображений

По умолчанию изображения хранятся штатно в WordPress Media Library / uploads. Не создавай папки внутри репозитория для готовых screenshot. Если на сайте установлен media-folder plugin, он может виртуально организовать Media Library, но физическая структура WordPress uploads должна оставаться штатной.

## Важно

Этот модуль не запускает локальный Playwright. Он использует `POST /codex-bridge/v1/screenshot/capture`, поэтому фактический браузер/Chromium работает на сервере WordPress через Codex WordPress Bridge.
