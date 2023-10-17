<?php

namespace App\Voyager\Actions;
use TCG\Voyager\Actions\ViewAction as VoyagerViewAction;

class ViewAction extends VoyagerViewAction
{
    public function getTitle()
    {
        return __('voyager::generic.view');
    }

    public function getIcon()
    {
        // return 'voyager-eye';
        return '';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'pull-right view',
        ];
    }

    public function getDefaultRoute()
    {
        return route('voyager.'.$this->dataType->slug.'.show', $this->data->{$this->data->getKeyName()});
    }
}
