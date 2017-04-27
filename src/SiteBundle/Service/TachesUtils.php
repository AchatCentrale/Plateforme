<?php

namespace SiteBundle\Service;

class TachesUtils
{

    private $form;


    public function createForm()
    {


    }

    /**
     * @return mixed
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param mixed $form
     */
    public function setForm($form)
    {
        $this->form = $form;
    }




}