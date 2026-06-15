<?php
/*
Template Name: Услуга — Настройка WooCommerce
Template Post Type: service
*/
defined('ABSPATH') || exit;

require_once __DIR__ . '/service-template-renderer.php';

wpds_render_service_template([
	'title' => 'Настройка WooCommerce',
	'badge' => 'WooCommerce',
	'subtitle' => 'Настройка WooCommerce для продаж: каталог, карточки, корзина, оплата, доставка, уведомления и базовая подготовка магазина к запуску.',
	'price' => 'от 30 000 ₽',
	'cta' => 'Настроить WooCommerce',
	'points' => [
	"Установка и базовая конфигурация WooCommerce",
	"Настройка каталога, карточек, вариаций и атрибутов",
	"Подключение оплаты, доставки и уведомлений",
	"Проверка оформления заказа и пользовательского сценария",
	],
]);
