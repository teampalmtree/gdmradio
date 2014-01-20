<?php

class Controller_DJs extends Controller_GDMRadio
{

    public function before()
    {
        // set section
        $this->section = 'DJs';
        // run parent
        parent::before();
    }

	public function action_index()
	{
        // create view
        $view = View::forge('DJs/index');
        // get DJs
        $view->DJs = Model_DJ::all();
        // set template vars
        $this->template->title = 'DJs';
        $this->template->section->body = $view;
	}

}
