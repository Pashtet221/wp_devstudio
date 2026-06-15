<?php
/*
Template Name: Услуга — Интеграция CRM с WordPress
Template Post Type: service
*/
defined('ABSPATH') || exit;

require_once __DIR__ . '/service-template-renderer.php';

wpds_render_service_template([
	'title' => 'Интеграция CRM с WordPress',
	'badge' => 'CRM-интеграции',
	'subtitle' => 'Интеграция WordPress с CRM: передача заявок, заказов WooCommerce, клиентов, статусов и автоматизация обработки обращений.',
	'price' => 'от 35 000 ₽',
	'cta' => 'Интегрировать CRM',
	'points' => [
	"Передача форм, заказов и пользовательских данных в CRM",
	"Настройка полей, воронок, статусов и ответственных",
	"Обработка дублей, ошибок и повторных отправок",
	"Логирование интеграции и тестирование сценариев",
	],
]);
