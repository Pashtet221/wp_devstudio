<?php
/*
Template Name: Услуга — Редизайн сайта на WordPress
Template Post Type: service
*/
defined('ABSPATH') || exit;

require_once __DIR__ . '/service-template-renderer.php';

wpds_render_service_template([
	'title' => 'Редизайн сайта на WordPress',
	'badge' => 'Редизайн WordPress',
	'subtitle' => 'Редизайн сайта на WordPress с сохранением сильных сторон проекта: обновление визуала, структуры, UX, адаптива и технической базы.',
	'price' => 'от 60 000 ₽',
	'cta' => 'Обсудить редизайн',
	'points' => [
	"Аудит текущего сайта, структуры и точек потери заявок",
	"Обновление дизайна, блоков, навигации и адаптива",
	"Аккуратный перенос контента и сохранение важных URL",
	"Подготовка к SEO, скорости и дальнейшему развитию",
	],
]);
