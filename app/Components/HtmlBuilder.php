<?php

namespace TeachMe\Components;

//injectando dependencia para config y view
//use Illuminate\Contracts\Config\Repository as Config; 
//use Illuminate\Contracts\View\View as View; 
use Collective\Html\HtmlBuilder as CollectiveHtmlBuilder;


/**
 * summary
 */
class HtmlBuilder extends CollectiveHtmlBuilder
{
    /*
	protected $config;

	protected $view;

	public function __construct(Config $config, View $view)
	{
		$this->config = $config;

		$this->view = $view;
	}*/

    public function menu($items)
    {
    	if(! is_array($items))
    	{
    		$items = config($items, array());
		}

    	return view('partials.menu', compact('items'));
    	
    }

        /**
     * Builds an HTML class attribute dynamically.
     * This method is similar to the ng-class attribute of AngularJS
     *
     * You can specify one or more CSS classes as a key and a condition as a
     * value. If the condition is true the class(es) will be used, otherwise
     * they will be skipped. You can also set the static class(es) (those which
     * we'll always be used) as a value.
     *
     * Example:
     *
     * {!! Html::classes(['home' => true, 'main', 'dont-use-this' => false]) !!}
     *
     * Returns:
     *
     *  class="home main".
     *
     * Notice that this function returns an empty space before the class
     * attribute. So you have to do this:
     *
     * <p{!! classes(..) !!}> and not this: <p {{!! classes(..) !!}>
     *
     * If no classes are evaluated as TRUE then this function will return an
     * empty string.
     *
     * @param array $classes
     *
     * @return string
     */
    public function classes(array $classes)
    {
        $html = '';
        foreach ($classes as $name => $bool) {
            if (is_int($name)) {
                $name = $bool;
                $bool = true;
            }
            if ($bool) {
                $html .= $name.' ';
            }
        }
        if (!empty($html)) {
            return ' class="'.trim($html).'"';
        }
        return '';
    }
}