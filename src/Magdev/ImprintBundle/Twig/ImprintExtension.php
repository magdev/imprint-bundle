<?php

namespace Magdev\ImprintBundle\Twig;


use Magdev\ImprintBundle\Service\InfoService;


/**
 * Twig Extension to display imprint informations
 */
class ImprintExtension extends \Twig_Extension
{
	/**
	 * @var \Magdev\ImprintBundle\Service\InfoService
	 */
	private $imprint;
	
	/**
	 * Constructor
	 * 
	 * @param \Magdev\ImprintBundle\Service\InfoService $imprint
	 */
	public function __construct(InfoService $imprint)
	{
		$this->imprint = $imprint;
	}

	/**
	 * (non-PHPdoc)
	 * @see \Twig_Extension::getFunctions()
	 */
	public function getFunctions()
	{
		return array(
			new \Twig_SimpleFunction('imprint', array($this, 'imprintInfo')),
			new \Twig_SimpleFunction('has_imprint', array($this, 'hasImprintInfo')),
		);
	}

	/**
	 * (non-PHPdoc)
	 * @see \Twig_ExtensionInterface::getName()
	 */
	public function getName()
	{
		return 'imprint_extension';
	}

	/**
	 * Get an information from the imprint
	 *
	 * @param string $group
	 * @param string $key
	 * @return string
	 */
	public function imprintInfo($group, $key)
	{
		return $this->imprint->info($group, $key);
	}
	

	/**
	 * Check if an imprint info exists
	 *
	 * @param string $group
	 * @param string $key
	 * @return string
	 */
	public function hasImprintInfo($group, $key)
	{
		return $this->imprint->has($group, $key);
	}
}