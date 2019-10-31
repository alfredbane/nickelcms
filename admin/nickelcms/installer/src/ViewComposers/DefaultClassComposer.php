<?php

namespace NickelCms\Installer\ViewComposers;

use Illuminate\View\View;

class DefaultClassComposer
{
    public $defaultClassList = [];

    /**
     * Create a default css class composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->defaultClassList = [
            'cms-installer',
            'has-background--color-lightColor',
            \Request::path()
        ];
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('defaultclasses', $this->defaultClassList);
    }
}
