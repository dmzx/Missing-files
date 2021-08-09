<?php
/**
 *
 * Missing Files. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2021, dmzx, https://www.dmzx-web.net & martin - https://www.martins-phpbb.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace dmzx\missingfiles\migrations;

use phpbb\db\migration\migration;

class missingfiles_v101 extends migration
{
	public static function depends_on()
	{
		return [
			'\dmzx\missingfiles\migrations\install_missingfiles',
		];
	}

	public function update_data()
	{
		return [
			['config.update', ['dmzx_missingfiles_version', '1.0.1']],
		];
	}
}
