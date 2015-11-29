<?php

namespace Magdev\ImprintBundle\Service;



/**
 * InfoService
 */
class InfoService
{
	/**
	 * Store the imprint informations
	 * 
	 * @var array
	 */
	private $imprintInfo;
	
	/**
	 * Constructor
	 * 
	 * @param array $imprintInfo
	 */
	public function __construct(array $imprintInfo)
	{
		$this->imprintInfo = $imprintInfo;
	}
	
	
	/**
	 * Get imprint info
	 * 
	 * @param string|null $group
	 * @param string|null $key
	 * @return string|array
	 */
	public function info($group = null, $key = null)
	{
		$info = $this->imprintInfo;
		if ($group) {
			if (!array_key_exists($group, $info)) {
				throw new \InvalidArgumentException('Unknown info group: '.$group);
			}
			$info = $info[$group];

			if ($key) {
				if (!array_key_exists($key, $info)) {
					throw new \InvalidArgumentException('Unknown info key: '.$key);
				}
				$info = $info[$key];
			}
		}
		return $info;
	}
	
	
	/**
	 * Check if an imprint info exists
	 * 
	 * @param string $group
	 * @param string $key
	 * @return boolean
	 */
	public function has($group, $key)
	{
		try {
			if ($this->info($group, $key)) {
				return true;
			}
			return false;
		} catch (\InvalidArgumentException $e) {
			return false;
		}
	}
}