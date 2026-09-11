# SEO Agent jobs

Этот каталог — вход/выход для задач от `wpdevstudio-seo-agent` к рабочему Codex репозитория `Pashtet221/wp_devstudio`.

## Структура

- `seo-jobs/inbox/` — утвержденные SEO job-файлы, которые Codex должен разобрать.
- `seo-jobs/results/` — результаты разбора/подготовки изменений.

## Правила исполнения

1. Обрабатывать только job с явно указанным `task_id` и `job_id`.
2. Сначала определить `execution_targets`.
3. Если есть только `WORDPRESS_BRIDGE`, работать через `codex/scripts/wp`; файлы темы не менять без отдельного обоснования.
4. Если есть `CODEX_REPOSITORY`, проверить код темы и подготовить reviewable diff/PR, но не deploy.
5. Перед любой WordPress-записью прочитать текущий объект (`get`, `acf`, `seo` по необходимости).
6. После любой разрешенной записи перечитать объект и зафиксировать before/after.
7. Политика job имеет приоритет: если `allow_publish=false`, `allow_deploy=false` или destructive changes запрещены — не обходить ограничения.
8. Для `WP_CONTENT` сначала проверить существующий контент, SEO-мета и близкие страницы на дублирование/каннибализацию.
9. Если безопасное изменение не обосновано, вернуть `NO_CHANGE` с причиной вместо искусственной правки.

## Формат результата

Для каждого job создать `seo-jobs/results/<job_id>.json` со структурой:

```json
{
  "job_id": "...",
  "task_id": "...",
  "status": "PREPARED|NO_CHANGE|BLOCKED",
  "diagnosis": "...",
  "proposed_changes": [],
  "before_after": {},
  "risk_notes": [],
  "verification_checklist": [],
  "wordpress": {
    "object_id": null,
    "writes_performed": false,
    "verified_after_write": false
  },
  "repository": {
    "changes_required": false,
    "files": [],
    "pr_required": false
  }
}
```

На текущем этапе SEO jobs предназначены для диагностики и подготовки изменений. Автоматическая публикация, deploy, удаление, смена slug и редиректы без отдельного подтверждения запрещены.
