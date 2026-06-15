<?php
/*
Template Name: Услуга — Импорт товаров в WooCommerce
Template Post Type: service
*/
defined('ABSPATH') || exit;

require_once __DIR__ . '/service-template-renderer.php';

wpds_render_service_template([
	'title' => 'Импорт товаров в WooCommerce',
	'badge' => 'Импорт товаров',
	'subtitle' => 'Импорт товаров в WooCommerce из CSV, XML, XLSX, API или старого сайта с категориями, атрибутами, вариациями, фото и ценами.',
	'price' => 'от 20 000 ₽',
	'cta' => 'Обсудить импорт',
	'points' => [
	"Подготовка структуры каталога и сопоставление полей",
	"Импорт категорий, атрибутов, вариаций и изображений",
	"Обработка цен, остатков, артикулов и описаний",
	"Проверка результата и настройка повторяемого импорта",
	],
]);
