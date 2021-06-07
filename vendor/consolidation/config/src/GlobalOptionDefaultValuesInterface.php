<?php
namespace Consolidation\Config;

interface GlobalOptionDefaultValuesInterface
{
    /**
     * Return an associative array of option-key => default-value
     */
    public function getGlobalOptionDefaultValues();
}
