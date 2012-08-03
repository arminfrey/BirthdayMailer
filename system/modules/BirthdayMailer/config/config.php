<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Cliff Parnitzky 2011-2012
 * @author     Cliff Parnitzky
 * @package    BirthdayMailer
 * @license    LGPL
 * @filesource
 */

/**
 * -------------------------------------------------------------------------
 * BACK END MODULES
 * -------------------------------------------------------------------------
 */

// Add configuration to Backend -> Accounts
$GLOBALS['BE_MOD']['accounts']['BirthdayMailer'] = array
(
	'tables'           			=> array('tl_birthdaymailer'),
	'icon'             			=> 'system/modules/BirthdayMailer/html/icon.png',
	'sendBirthdayMail' => array('BirthdayMailSender', 'sendBirthdayMailManually'), 
);

/**
 * -------------------------------------------------------------------------
 * HOOKS
 * -------------------------------------------------------------------------
 */

 // Add hook for replacing the insert tags with values
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('BirthdayMailInsertTag', 'replaceBirthdayMailInsertTags'); 

/**
 * -------------------------------------------------------------------------
 * CRON
 * -------------------------------------------------------------------------
 */

// Daily cron job to send birthday mails
$GLOBALS['TL_CRON']['daily'][] = array('BirthdayMailSender', 'sendBirthdayMail');

?>