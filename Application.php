<?php
/**
 * @brief		Member Loggins Heatmap Application Class
 * @author		<a href='https://danielf.dev'>DanielF</a>
 * @copyright	(c) 2023 DanielF
 * @package		Invision Community
 * @subpackage	Member Loggins Heatmap
 * @since		02 Jan 2023
 * @version		
 */
 
namespace IPS\loginheatmap;

/**
 * Member Loggins Heatmap Application Class
 */
class _Application extends \IPS\Application
{
	public static function loadCssAndJs()
	{
		\IPS\Output::i()->jsFiles = array_merge( \IPS\Output::i()->jsFiles, \IPS\Output::i()->js( 'app.js', 'loginheatmap' ) );
		\IPS\Output::i()->jsFiles[] = '//d3js.org/d3.v3.min.js';
		\IPS\Output::i()->jsFiles[] = '//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.min.js';
		\IPS\Output::i()->cssFiles = array_merge( \IPS\Output::i()->cssFiles, ['//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.css'] );
	}

	public static function loadLoginsForMember( \IPS\Member $member ): array
	{
		return iterator_to_array( \IPS\Db::i()->select( 'member_timestamp', 'core_members_logins', ['member_id=?', $member->member_id] )->setKeyField('member_timestamp') );
	}
}