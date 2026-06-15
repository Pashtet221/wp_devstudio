<?php
/*
Template Name: Услуга — Исправление ошибок WordPress
Template Post Type: service
*/
defined('ABSPATH') || exit;

require_once __DIR__ . '/service-template-renderer.php';

wpds_render_service_template([
	'title' => 'Исправление ошибок WordPress',
	'badge' => 'Ошибки WordPress',
	'subtitle' => 'Поиск и исправление ошибок WordPress, WooCommerce, тем, плагинов, верстки, форм, админки и нестабильных интеграций.',
	'price' => 'от 5 000 ₽',
	'cta' => 'Исправить ошибку',
	'points' => [
	"Диагностика причины, а не только внешнего симптома",
	"Исправление PHP, JS, CSS, шаблонов и настроек",
	"Аккуратная работа на копии или с резервной копией",
	"Проверка после исправления и рекомендации по профилактике",
	],
]);
