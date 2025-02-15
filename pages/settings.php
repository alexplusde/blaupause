<?php

use rex_config_form;
use rex_fragment;
use rex_i18n;
use rex_view;

echo rex_view::title(rex_i18n::msg('blaupause.title'));

$addon = rex_addon::get('blaupause');

$form = rex_config_form::factory($addon->getName());

$field = $form->addInputField('text', 'mytextfield', null, ['class' => 'form-control']);
$field->setLabel(rex_i18n::msg('blaupause_config_mytextfield_label'));
$field->setNotice(rex_i18n::msg('blaupause_config_mytextfield_notice'));

$fragment = new rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', $addon->i18n('blaupause_config'), false);
$fragment->setVar('body', $form->get(), false);
echo $fragment->parse('core/page/section.php');
