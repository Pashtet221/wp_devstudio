<?php
/*
Template Name: Услуга — Разработка тем для WordPress
Template Post Type: service
*/
defined('ABSPATH') || exit;

require_once __DIR__ . '/service-template-renderer.php';

wpds_render_service_template([
	'title' => 'Разработка тем для WordPress',
	'badge' => 'Темы WordPress',
	'subtitle' => 'Разработка индивидуальных тем WordPress: адаптивная верстка, удобные шаблоны страниц, чистая структура и подготовка к развитию проекта.',
	'price' => 'от 70 000 ₽',
	'cta' => 'Обсудить тему',
	'points' => [
	"Кастомная тема под дизайн, бренд и цели сайта",
	"Адаптивная верстка для мобильных, планшетов и десктопов",
	"Удобные шаблоны для страниц, записей и разделов",
	"Оптимизация скорости, SEO-база и чистый код",
	],
]);
