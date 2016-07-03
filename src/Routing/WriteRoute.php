<?php
/**
 * @author hollodotme
 */

namespace IceHawk\IceHawk\Routing;

use IceHawk\IceHawk\Interfaces\HandlesWriteRequest;
use IceHawk\IceHawk\Routing\Interfaces\ProvidesMatchResult;
use IceHawk\IceHawk\Routing\Interfaces\RoutesToWriteHandler;

/**
 * Class WriteRoute
 * @package IceHawk\IceHawk\Routing
 */
final class WriteRoute implements RoutesToWriteHandler
{
	/** @var ProvidesMatchResult */
	private $pattern;

	/** @var HandlesWriteRequest */
	private $requestHandler;

	public function __construct( ProvidesMatchResult $pattern, HandlesWriteRequest $requestHandler )
	{
		$this->pattern        = $pattern;
		$this->requestHandler = $requestHandler;
	}

	public function matches( string $uri ) : bool
	{
		return $this->pattern->matches( $uri );
	}

	public function getUriParams() : array
	{
		return $this->pattern->getMatches();
	}

	public function getRequestHandler() : HandlesWriteRequest
	{
		return $this->requestHandler;
	}
}