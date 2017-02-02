<?php

namespace Marmiton\Core;

interface FormInterface
{
    function defineFields();
    function setVars($data_form);
    function validateForm($data_form);
    function getValidationErrors();
}