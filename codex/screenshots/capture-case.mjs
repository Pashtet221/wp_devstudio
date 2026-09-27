#!/usr/bin/env node
import fs from 'node:fs';
import os from 'node:os';
import path from 'node:path';
import { spawnSync } from 'node:child_process';
import { fileURLToPath } from 'node:url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const wpScript = path.join(__dirname, 'wp');

function fail(message) {
  if (message) console.error(message);
  console.error('Usage: node codex/screenshots/capture-case.mjs MANIFEST.json');
  process.exit(2);
}

const manifestPath = process.argv[2];
if (!manifestPath || !fs.existsSync(manifestPath)) fail('Manifest not found.');

const manifest = JSON.parse(fs.readFileSync(manifestPath, 'utf8'));
if (!manifest || !Array.isArray(manifest.items) || manifest.items.length === 0) {
  fail('Manifest must contain non-empty items[].');
}

const defaults = {
  width: 1440,
  height: 1200,
  max_height: 3000,
  quality: 78,
  full_page: true,
  selector: '',
  post_id: Number(manifest.post_id || 0),
  alt: '',
  title: '',
  caption: '',
  description: '',
  set_featured: false
};

const results = [];

for (let i = 0; i < manifest.items.length; i++) {
  const item = manifest.items[i] || {};
  if (!item.url) fail(`items[${i}].url is required`);

  const filename = item.filename || `case-${manifest.post_id || 'media'}-${String(i + 1).padStart(2, '0')}`;
  const payload = {
    ...defaults,
    ...item,
    filename,
    post_id: Number(item.post_id || defaults.post_id || 0)
  };

  if (item.mobile === true) {
    payload.width = 390;
    payload.height = 844;
    if (typeof item.full_page === 'undefined') payload.full_page = false;
  }

  delete payload.mobile;
  delete payload.note;
  delete payload.section;

  const tmp = path.join(os.tmpdir(), `cwb-case-shot-${process.pid}-${Date.now()}-${i}.json`);
  fs.writeFileSync(tmp, JSON.stringify(payload));

  try {
    const run = spawnSync(wpScript, ['screenshot-capture', tmp], {
      encoding: 'utf8',
      env: process.env
    });

    if (run.status !== 0) {
      console.error(run.stderr || run.stdout);
      process.exit(run.status || 1);
    }

    const data = JSON.parse(run.stdout);
    const media = data.media || data.attachment || {};

    results.push({
      index: i + 1,
      section: item.section || '',
      note: item.note || '',
      source_url: item.url,
      selector: item.selector || '',
      filename,
      media_id: media.id || data.media_id || null,
      media_url: media.url || media.source_url || data.url || null,
      alt: item.alt || '',
      title: item.title || '',
      gutenberg_block: data.gutenberg_block || media.gutenberg || null,
      raw: data
    });
  } finally {
    try { fs.unlinkSync(tmp); } catch {}
  }
}

const summary = {
  post_id: Number(manifest.post_id || 0),
  case_title: manifest.case_title || '',
  created_at: new Date().toISOString(),
  count: results.length,
  items: results
};

const output = manifest.output || '';
if (output) {
  fs.writeFileSync(output, JSON.stringify(summary, null, 2));
}

console.log(JSON.stringify(summary, null, 2));
