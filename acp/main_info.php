<?php
/**
 *
 * Missing Files. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2020, dmzx, https://www.dmzx-web.net & martin - https://www.martins-phpbb.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace dmzx\missingfiles\acp;

/**
 * Missing Files ACP module info.
 */
class main_info
{
	public function module()
	{
		return [
			'filename'	=> '\dmzx\missingfiles\acp\main_module',
			'title'		=> 'ACP_MISSINGFILES_TITLE',
			'modes'		=> [
				'settings'	=> [
					'title'	=> 'ACP_MISSINGFILES',
					'auth'	=> 'ext_dmzx/missingfiles && acl_a_board',
					'cat'	=> ['ACP_MISSINGFILES_TITLE']
				],
			],
		];
	}
}
