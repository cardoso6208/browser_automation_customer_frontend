<?php

namespace App\Voyager\Actions;
use TCG\Voyager\Actions\EditAction as VoyagerEditAction;

class EditAction extends VoyagerEditAction
{
    public function getTitle()
    {
        return __('voyager::generic.edit');
    }

    public function getIcon()
    {
        // return 'voyager-edit';
        return '';
    }

    public function getPolicy()
    {
        return 'edit';
    }

    public function getAttributes()
    {
        return [
            'class' => 'pull-right edit',
        ];
    }

    public function getDefaultRoute()
    {
        return route('voyager.'.$this->dataType->slug.'.edit', $this->data->{$this->data->getKeyName()});
    }
}
