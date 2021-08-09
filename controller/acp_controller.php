<?php
/**
 *
 * Missing Files. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2020, dmzx, https://www.dmzx-web.net & martin - https://www.martins-phpbb.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace dmzx\missingfiles\controller;

use phpbb\config\config;
use phpbb\db\driver\driver_interface;
use phpbb\language\language;
use phpbb\template\template;

/**
 * Missing Files ACP controller.
 */
class acp_controller
{
	/** @var config */
	protected $config;

	/** @var language */
	protected $language;

	/** @var template */
	protected $template;

	/** @var driver_interface */
	protected $db;

	/** @var string */
	protected $root_path;

	/** @var array */
	protected $tables;

	/**
	 * Constructor.
	 *
	 * @param config				$config
	 * @param language				$language
	 * @param template				$template
	 * @param driver_interface		$db
	 * @param string				$root_path
	 * @param array					$tables
	 */
	public function __construct(
		config $config,
		language $language,
		template $template,
		driver_interface $db,
		string $root_path,
		array $tables
	)
	{
		$this->config			= $config;
		$this->language			= $language;
		$this->template			= $template;
		$this->db				= $db;
		$this->root_path		= $root_path;
		$this->tables			= $tables;
	}

	public function display_options()
	{
		// Add our language file
		$this->language->add_lang('acp_missingfiles', 'dmzx/missingfiles');

		$sql = 'SELECT physical_filename, post_msg_id, real_filename
			FROM ' . $this->tables['attachments'];
		$result = $this->db->sql_query($sql);

		while ($row = $this->db->sql_fetchrow($result, MYSQLI_ASSOC))
		{
			$filename = $this->root_path . '/files/' . $row['physical_filename'];

			if (!file_exists($filename))
			{
				$post_id = $row['post_msg_id'];
				$upload_name =	$row['real_filename'];

				$this->template->assign_block_vars('missingfiles', [
					'MISSINGFILES'		=> '<a href="' . generate_board_url() . '/viewtopic.php?p=' . $post_id . '#p' . $post_id . '">' . $upload_name . '</a><br><br>',
				]);
			}
		}
		$this->db->sql_freeresult($result);

		$this->template->assign_vars([
			'ACP_MISSINGFILES_VERSION'	=> $this->config['dmzx_missingfiles_version'],
		]);
	}

	/**
	 * Set custom form action.
	 *
	 * @param string	$u_action	Custom form action
	 * @return void
	 */
	public function set_page_url($u_action)
	{
		$this->u_action = $u_action;
	}
}
