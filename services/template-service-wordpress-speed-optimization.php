<?php
/*
Template Name: Услуга — Оптимизация скорости WordPress
Template Post Type: service
*/
defined('ABSPATH') || exit;

require_once __DIR__ . '/service-template-renderer.php';

wpds_render_service_template([
	'title' => 'Оптимизация скорости WordPress',
	'badge' => 'Скорость WordPress',
	'subtitle' => 'Ускорение WordPress-сайтов: аудит производительности, оптимизация темы, плагинов, изображений, кеширования и Core Web Vitals.',
	'price' => 'от 25 000 ₽',
	'cta' => 'Ускорить сайт',
	'points' => [
	"Аудит узких мест в теме, плагинах и серверной части",
	"Оптимизация CSS, JS, изображений и шрифтов",
	"Настройка кеширования и рекомендации по хостингу",
	"Контроль результата в PageSpeed и реальных сценариях",
	],
]);
