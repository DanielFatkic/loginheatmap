<?php
/**
 * @brief		ACP Member Profile Tab
 * @author		<a href='https://www.invisioncommunity.com'>Invision Power Services, Inc.</a>
 * @copyright	(c) Invision Power Services, Inc.
 * @license		https://www.invisioncommunity.com/legal/standards/
 * @package		Invision Community
 * @subpackage	Member Loggins Heatmap
 * @since		02 Jan 2023
 */

namespace IPS\loginheatmap\extensions\core\MemberACPProfileTabs;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !\defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * @brief	ACP Member Profile Tab
 */
class _Loggins extends \IPS\core\MemberACPProfile\MainTab
{

	public function __construct( $member )
	{
		parent::__construct( $member );
		\IPS\loginheatmap\Application::loadCssAndJs();
	}
	
	/**
	 * Get main-column blocks
	 *
	 * @return	array
	 */
	public function mainColumnBlocks()
	{
		return array(
			\IPS\loginheatmap\extensions\core\MemberACPProfileBlocks\Loggins::class,
		);
	}
}