<?php


return [
    // ...

    'unavailable_audits' => 'No changes made yet',

    'updated'            => [
        //'metadata' => 'On :audit_created_at, :user_name [:audit_ip_address] updated this record via :audit_url',
        //'metadata' => '(:user_id)  :user_name created/updated this record on ',
        'metadata' => ':user_name updated this record on ',
        'modified' => [
            'church_name'   => 'Church Name has been modified from <strong>:old</strong> to <strong>:new</strong>',
            'location' => 'Location has been modified from <strong>:old</strong> to <strong>:new</strong>',
            'about' => 'About has been modified from <strong>:old</strong> to <strong>:new</strong>',
            'description' => 'Description has been modified from <strong>:old</strong> to <strong>:new</strong>',
            'vision' => 'Vision has been modified from <strong>:old</strong> to <strong>:new</strong>',
            'mission' => 'Mision has been modified from <strong>:old</strong> to <strong>:new</strong>',
            'email' => 'Email has been modified from <strong>:old</strong> to <strong>:new</strong>',
            'mobile' => 'Mobile has been modified from <strong>:old</strong> to <strong>:new</strong>',
            'denomination_affiliation' => 'Denomination Affiliation has been modified from <strong>:old</strong> to <strong>:new</strong>',
            'church_type' => 'Church Type has been modified from <strong>:old</strong> to <strong>:new</strong>',
            'church_and_staff_leaders' => 'Church and Staff Leaders has been modified from <strong>:old</strong> to <strong>:new</strong>',
            'telephone' => 'Telephone has been modified from <strong>:old</strong> to <strong>:new</strong>',
            'facebook_handle' => 'Facebook Account has been modified from <strong>:old</strong> to <strong>:new</strong>',
            'twitter_handle' => 'Twitter Account has been modified from <strong>:old</strong> to <strong>:new</strong>',
            'instagram_handle' => 'Instagram Account has been modified from <strong>:old</strong> to <strong>:new</strong>',
            'linkedin_handle' => 'LinkedIn Account has been modified from <strong>:old</strong> to <strong>:new</strong>',
            'website_handle' => 'Website has been modified from <strong>:old</strong> to <strong>:new</strong>',
            'status' => 'Status has been modified from <strong>:old</strong> to <strong>:new</strong>',
            'request_status' => 'Admin has set the status of this request from <strong>:old</strong> to <strong>:new</strong>',
            'change_request_by' => 'Change was requested by <strong>:new</strong>'
        ],
    ],

    'created'            => [
        //'metadata' => 'On :audit_created_at, :user_name [:audit_ip_address] updated this record via :audit_url',
        'metadata' => ':user_name created this record on ',
        'modified' => [
            'church_name'   => 'Church Name has been set to <strong>:new</strong>',
            'location' => 'Location has been set to <strong>:new</strong>',
            'about' => 'About has been set to <strong>:new</strong>',
            'description' => 'Description has been set to  <strong>:new</strong>',
            'vision' => 'Vision has been set to <strong>:new</strong>',
            'mission' => 'Mision has been set to <strong>:new</strong>',
            'email' => 'Email has been set to <strong>:new</strong>',
            'mobile' => 'Mobile has been set to <strong>:new</strong>',
            'denomination_affiliation' => 'Denomination Affiliation has been set to <strong>:new</strong>',
            'church_type' => 'Church Type has been set to <strong>:new</strong>',
            'church_and_staff_leaders' => 'Church and Staff Leaders has been set to <strong>:new</strong>',
            'telephone' => 'Telephone has been set to <strong>:new</strong>',
            'facebook_handle' => 'Facebook Account has been set to <strong>:new</strong>',
            'twitter_handle' => 'Twitter Account has been set to <strong>:new</strong>',
            'instagram_handle' => 'Instagram Account has been set to <strong>:new</strong>',
            'linkedin_handle' => 'LinkedIn Account has been set to <strong>:new</strong>',
            'website_handle' => 'Website has been set to <strong>:new</strong>',
            'status' => 'Status has been set to <strong>:new</strong>',
            'request_status' => 'Sent To admin with Request Status: <strong>:new</strong>',
        ],
    ],

    // ...
];