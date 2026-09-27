#!/usr/bin/env bash
set -euo pipefail

API="${WORDPRESS_URL%/}/wp-json/codex-bridge/v1"
AUTH="${WORDPRESS_USERNAME}:${WORDPRESS_APP_PASSWORD}"

curl_api() {
  curl --silent --show-error --fail-with-body --user "$AUTH" "$@"
}

require_arg() {
  local name="$1"
  local value="${2:-}"
  if [[ -z "$value" ]]; then
    printf 'Missing required argument: %s\n' "$name" >&2
    exit 2
  fi
}

json_patch() {
  local endpoint="$1"
  local file="$2"
  require_arg payload "$file"
  [[ -f "$file" ]] || { echo "Payload file not found: $file" >&2; exit 2; }
  curl_api -X PATCH -H "Content-Type: application/json" --data-binary @"$file" "$endpoint"
}

case "${1:-help}" in
  health) curl_api "$API/health" ;;
  site) curl_api "$API/site" ;;
  schema) curl_api "$API/schema" ;;
  taxonomies) curl_api "$API/taxonomies" ;;
  terms)
    require_arg taxonomy "${2:-}"
    curl_api --get --data-urlencode "taxonomy=$2" --data-urlencode "per_page=${3:-100}" "$API/terms"
    ;;
  menus) curl_api "$API/menus" ;;
  seo-settings) curl_api "$API/seo/settings" ;;
  options)
    require_arg target "${2:-}"
    curl_api --get --data-urlencode "target=$2" "$API/acf/options"
    ;;
  list)
    require_arg post_type "${2:-}"
    curl_api --get --data-urlencode "post_type=$2" --data-urlencode "per_page=${3:-100}" "$API/posts"
    ;;
  pages) curl_api "$API/posts?post_type=page&per_page=100" ;;
  posts) curl_api "$API/posts?post_type=post&per_page=100" ;;
  services) curl_api "$API/posts?post_type=service&per_page=100" ;;
  cases) curl_api "$API/posts?post_type=case&per_page=100" ;;
  wp-plugins) curl_api "$API/posts?post_type=wp-plugins&per_page=100" ;;
  find) curl_api --get --data-urlencode "search=${2:-}" "$API/posts" ;;
  get)
    require_arg id "${2:-}"
    curl_api "$API/posts/$2"
    ;;
  acf)
    require_arg id "${2:-}"
    curl_api "$API/posts/$2/acf"
    ;;
  acf-all)
    require_arg id "${2:-}"
    curl_api "$API/posts/$2/acf?scope=all"
    ;;
  seo)
    require_arg id "${2:-}"
    curl_api "$API/posts/$2/seo"
    ;;
  create)
    require_arg payload "${2:-}"
    [[ -f "$2" ]] || { echo "Payload file not found: $2" >&2; exit 2; }
    curl_api -X POST -H "Content-Type: application/json" --data-binary @"$2" "$API/posts"
    ;;
  update)
    require_arg id "${2:-}"
    json_patch "$API/posts/$2" "${3:-}"
    ;;
  update-acf)
    require_arg id "${2:-}"
    json_patch "$API/posts/$2/acf" "${3:-}"
    ;;
  update-seo)
    require_arg id "${2:-}"
    json_patch "$API/posts/$2/seo" "${3:-}"
    ;;
  assign-terms)
    require_arg id "${2:-}"
    json_patch "$API/posts/$2/terms" "${3:-}"
    ;;
  import-seo)
    require_arg payload "${2:-}"
    [[ -f "$2" ]] || { echo "Payload file not found: $2" >&2; exit 2; }
    curl_api -X PATCH -H "Content-Type: application/json" --data-binary @"$2" "$API/seo/import"
    ;;
  media-upload)
    file="${2:-}"
    if [[ -z "$file" || ! -f "$file" ]]; then echo "media-upload: file not found: $file" >&2; exit 2; fi
    shift 2
    args=(-X POST -F "file=@$file")
    for opt in "$@"; do
      case "$opt" in
        --post-id=*) args+=(-F "post_id=${opt#*=}") ;;
        --alt=*) args+=(-F "alt=${opt#*=}") ;;
        --title=*) args+=(-F "title=${opt#*=}") ;;
        --caption=*) args+=(-F "caption=${opt#*=}") ;;
        --description=*) args+=(-F "description=${opt#*=}") ;;
        --source-url=*) args+=(-F "source_url=${opt#*=}") ;;
        --set-featured) args+=(-F "set_featured=1") ;;
        *) echo "media-upload: unknown option: $opt" >&2; exit 2 ;;
      esac
    done
    curl_api "${args[@]}" "$API/media/upload"
    ;;
  media-sideload)
    require_arg payload "${2:-}"
    [[ -f "$2" ]] || { echo "Payload file not found: $2" >&2; exit 2; }
    curl_api -X POST -H "Content-Type: application/json" --data-binary @"$2" "$API/media/sideload"
    ;;
  thumbnail)
    require_arg post_id "${2:-}"
    require_arg attachment_id "${3:-}"
    curl_api -X PATCH -H "Content-Type: application/json" --data-binary "{\"attachment_id\":$3}" "$API/posts/$2/thumbnail"
    ;;
  screenshot-capture)
    require_arg payload "${2:-}"
    [[ -f "$2" ]] || { echo "Payload file not found: $2" >&2; exit 2; }
    curl_api -X POST -H "Content-Type: application/json" --data-binary @"$2" "$API/screenshot/capture"
    ;;
  capture)
    shift
    script_dir="$(cd "$(dirname "$0")" && pwd)"
    exec node "$script_dir/capture-media.mjs" "$@"
    ;;
  scan-links) curl_api -X POST "$API/links/scan" ;;
  replace-links)
    require_arg payload "${2:-}"
    [[ -f "$2" ]] || { echo "Payload file not found: $2" >&2; exit 2; }
    curl_api -X POST -H "Content-Type: application/json" --data-binary @"$2" "$API/links/replace"
    ;;
  audit) curl_api "$API/audit" ;;
  help|*)
    cat <<'EOF'
Codex WordPress Bridge 0.8 client

Read:
  health | site | schema | taxonomies | terms TAXONOMY [PER_PAGE]
  menus | seo-settings | options TARGET
  list POST_TYPE [PER_PAGE] | pages | posts | services | cases | wp-plugins
  find "TEXT" | get ID | acf ID | acf-all ID | seo ID | audit

Write:
  create PAYLOAD.json
  update ID PAYLOAD.json
  update-acf ID PAYLOAD.json
  update-seo ID PAYLOAD.json
  assign-terms ID PAYLOAD.json
  import-seo PAYLOAD.json
  media-upload FILE [--post-id=ID] [--alt=...] [--title=...] [--set-featured]
  media-sideload PAYLOAD.json
  thumbnail POST_ID ATTACHMENT_ID
  capture URL NAME [capture options]
  scan-links
  replace-links PAYLOAD.json

There is intentionally no delete command: Bridge 0.8 does not expose destructive post deletion.
EOF
    ;;
esac
