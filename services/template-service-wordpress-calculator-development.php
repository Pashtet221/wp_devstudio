<?php
/*
Template Name: Услуга — Создание калькуляторов для WordPress
Template Post Type: service
*/
defined('ABSPATH') || exit;

require_once __DIR__ . '/service-template-renderer.php';

wpds_render_service_template([
	'title' => 'Создание калькуляторов для WordPress',
	'badge' => 'Калькуляторы',
	'subtitle' => 'Разработка калькуляторов для WordPress: расчет стоимости, подбор тарифа, квизы, формы заявок и интеграция с CRM или почтой.',
	'price' => 'от 35 000 ₽',
	'cta' => 'Обсудить калькулятор',
	'points' => [
	"Логика расчета под вашу услугу, товар или тариф",
	"Адаптивный интерфейс без лишних шагов для клиента",
	"Отправка результата в заявку, CRM или email",
	"Возможность редактировать параметры в админке",
	],
]);
