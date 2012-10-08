<?php

/**
 * Decorates pages with a check that ensures login is required for the testing website
 *
 * @author Damo
 * @see SiteTree::canView()
 */
class SecurePageDecorator extends SiteTreeDecorator
{   
    /**
     * Determines if this page may be viewed.
     * This module only DENIES permission if not logged in and in testing mode. It should not allow 
     * access by default, so in these cases we return null (i.e. allows SiteTree::canView() to behave normally).
     * @param Member $member The currently logged in user, if given
     * @return null|false A flag indicating if the user is denied permission (false) or the null flag if no denial is made
     */
    public function canView($member = null)
    {
        // If a user is logged in, consider this proof enough that they have test site permission.
        // This could be improved with better logic, but we should certainly err in favour of less restriction.
        if($member)
            return null;
        
        // If this site is in testing mode, we should demand credentials
        if(!Director::isTest())
            return null;
        
        // Allow access to temporary pages, such as those constructed in memory for login or service access
        if(!$this->owner || !$this->owner->exists())
            return null;
        
        return false; 
    }
}