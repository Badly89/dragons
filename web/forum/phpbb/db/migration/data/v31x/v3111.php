<?php
/**
*
* This file is part of the phpBB Forum Software package.
*
* @copyright (c) phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* For full copyright and license information, please see
* the docs/CREDITS.txt file.
*
*/

namespace phpbb\db\migration\data\v31x;

class v3111 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return phpbb_version_compare($this->config['version'], '3.1.11', '>=');
	}

	static public function depends_on()
	{
		return array(
			'\phpbb\db\migration\data\v31x\v3111rc1',
		);
	}

	public function update_data()
	{
		return array(
			array('config.update', array('version', '3.1.11')),
		);
	}
}
