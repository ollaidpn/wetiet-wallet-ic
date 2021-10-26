<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'uuid' => 'Uuid',
            'name' => 'Name',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'balance' => 'Balance',
            'password' => 'Password',
            'avatarf' => 'Avatarf',
            'currency' => 'Currency',
            'cni_face' => 'Cni Face',
            'cni_back' => 'Cni Back',
            'selfie_cni' => 'Selfie Cni',
        ],
    ],

    'transferts' => [
        'name' => 'Transferts',
        'index_title' => 'Transferts List',
        'new_title' => 'New Transfert',
        'create_title' => 'Create Transfert',
        'edit_title' => 'Edit Transfert',
        'show_title' => 'Show Transfert',
        'inputs' => [
            'user_id' => 'User',
            'to_phone' => 'To Phone',
            'contact_id' => 'Contact Id',
            'amount' => 'Amount',
            'roken' => 'Roken',
        ],
    ],

    'tokenizers' => [
        'name' => 'Tokenizers',
        'index_title' => 'Tokenizers List',
        'new_title' => 'New Tokenizer',
        'create_title' => 'Create Tokenizer',
        'edit_title' => 'Edit Tokenizer',
        'show_title' => 'Show Tokenizer',
        'inputs' => [
            'user_id' => 'User',
            'token_code' => 'Token Code',
        ],
    ],

    'transactions' => [
        'name' => 'Transactions',
        'index_title' => 'Transactions List',
        'new_title' => 'New Transaction',
        'create_title' => 'Create Transaction',
        'edit_title' => 'Edit Transaction',
        'show_title' => 'Show Transaction',
        'inputs' => [
            'user_id' => 'User',
            'shop_id' => 'Shop',
            'amount' => 'Amount',
            'type' => 'Type',
            'token' => 'Token',
        ],
    ],

    'shops' => [
        'name' => 'Shops',
        'index_title' => 'Shops List',
        'new_title' => 'New Shop',
        'create_title' => 'Create Shop',
        'edit_title' => 'Edit Shop',
        'show_title' => 'Show Shop',
        'inputs' => [
            'user_id' => 'User',
            'shop_name' => 'Shop Name',
            'description' => 'Description',
            'logo' => 'Logo',
            'telephone' => 'Telephone',
            'email' => 'Email',
        ],
    ],

    'refuelings' => [
        'name' => 'Refuelings',
        'index_title' => 'Refuelings List',
        'new_title' => 'New Refueling',
        'create_title' => 'Create Refueling',
        'edit_title' => 'Edit Refueling',
        'show_title' => 'Show Refueling',
        'inputs' => [
            'user_id' => 'User',
            'shop_id' => 'Shop',
            'amount' => 'Amount',
            'token' => 'Token',
        ],
    ],

    'settings' => [
        'name' => 'Settings',
        'index_title' => 'Settings List',
        'new_title' => 'New Setting',
        'create_title' => 'Create Setting',
        'edit_title' => 'Edit Setting',
        'show_title' => 'Show Setting',
        'inputs' => [
            'email' => 'Email',
            'telephone' => 'Telephone',
            'logo_color' => 'Logo Color',
            'logo_white' => 'Logo White',
            'fav_icon' => 'Fav Icon',
        ],
    ],

    'favorites' => [
        'name' => 'Favorites',
        'index_title' => 'Favorites List',
        'new_title' => 'New Favorite',
        'create_title' => 'Create Favorite',
        'edit_title' => 'Edit Favorite',
        'show_title' => 'Show Favorite',
        'inputs' => [
            'user_id' => 'User',
            'name' => 'Name',
            'telephone' => 'Telephone',
            'has_account' => 'Has Account',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
