<?php
/**
 *
 * Missing Files. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2020, dmzx, https://www.dmzx-web.net & martin - https://www.martins-phpbb.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace dmzx\missingfiles\migrations;

class install_missingfiles extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return [
			'\phpbb\db\migration\data\v330\v330'
		];
	}

	public function update_data()
	{
		return [
			['config.add', ['dmzx_missingfiles_version', '1.0.0']],

			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_MISSINGFILES_TITLE'
			]],
			['module.add', [
				'acp',
				'ACP_MISSINGFILES_TITLE',
				[
					'module_basename'	=> '\dmzx\missingfiles\acp\main_module',
					'modes'				=> ['settings'],
				],
			]],
		];
	}
}
