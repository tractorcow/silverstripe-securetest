<?php

/**
 * Automatically enables login required for testing environments
 *
 * @author Damo
 */
class SecureTest
{
    /**
     * Flag to indicate whether this module should attempt to automatically load itself
     * @var boolean
     */
    public static $auto_load = true;
}