<?php
/*
Template Name: Услуга — Интеграция API в WordPress
Template Post Type: service
*/
defined('ABSPATH') || exit;

require_once __DIR__ . '/service-template-renderer.php';

wpds_render_service_template([
	'title' => 'Интеграция API в WordPress',
	'badge' => 'API-интеграции',
	'subtitle' => 'Подключение внешних API к WordPress: обмен данными, заявки, каталоги, статусы, личные кабинеты и автоматизация ручных процессов.',
	'price' => 'от 35 000 ₽',
	'cta' => 'Обсудить API',
	'points' => [
	"Анализ документации API и сценариев обмена",
	"Безопасная авторизация, логирование и обработка ошибок",
	"Синхронизация данных по расписанию или событиям",
	"Админский интерфейс для контроля интеграции",
	],
]);
