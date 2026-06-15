<?php
/*
Template Name: Услуга — Экспорт товаров из WooCommerce
Template Post Type: service
*/
defined('ABSPATH') || exit;

require_once __DIR__ . '/service-template-renderer.php';

wpds_render_service_template([
	'title' => 'Экспорт товаров из WooCommerce',
	'badge' => 'Экспорт товаров',
	'subtitle' => 'Экспорт товаров из WooCommerce в CSV, XML, фиды, маркетплейсы, CRM или учетные системы с нужной структурой данных.',
	'price' => 'от 18 000 ₽',
	'cta' => 'Обсудить экспорт',
	'points' => [
	"Настройка выгрузки товаров, категорий, цен и остатков",
	"Форматирование данных под требования площадки или сервиса",
	"Фильтрация, расписание и автоматическая генерация файлов",
	"Проверка валидности выгрузки и корректности данных",
	],
]);
