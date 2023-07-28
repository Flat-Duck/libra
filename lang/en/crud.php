<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
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
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'departments' => [
        'name' => 'Departments',
        'index_title' => 'Departments List',
        'new_title' => 'New Department',
        'create_title' => 'Create Department',
        'edit_title' => 'Edit Department',
        'show_title' => 'Show Department',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'sections' => [
        'name' => 'Sections',
        'index_title' => 'Sections List',
        'new_title' => 'New Section',
        'create_title' => 'Create Section',
        'edit_title' => 'Edit Section',
        'show_title' => 'Show Section',
        'inputs' => [
            'name' => 'Name',
            'department_id' => 'Department',
        ],
    ],

    'papers' => [
        'name' => 'Papers',
        'index_title' => 'Papers List',
        'new_title' => 'New Paper',
        'create_title' => 'Create Paper',
        'edit_title' => 'Edit Paper',
        'show_title' => 'Show Paper',
        'inputs' => [
            'title' => 'Title',
            'publisher' => 'Publisher',
            'published_at' => 'Published At',
            'department_id' => 'Department',
        ],
    ],

    'books' => [
        'name' => 'Books',
        'index_title' => 'Books List',
        'new_title' => 'New Book',
        'create_title' => 'Create Book',
        'edit_title' => 'Edit Book',
        'show_title' => 'Show Book',
        'inputs' => [
            'title' => 'Title',
            'author' => 'Author',
            'published_at' => 'Published At',
            'publication_place' => 'Publication Place',
            'section_id' => 'Section',
        ],
    ],

    'department_sections' => [
        'name' => 'Department Sections',
        'index_title' => 'Sections List',
        'new_title' => 'New Section',
        'create_title' => 'Create Section',
        'edit_title' => 'Edit Section',
        'show_title' => 'Show Section',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'department_papers' => [
        'name' => 'Department Papers',
        'index_title' => 'Papers List',
        'new_title' => 'New Paper',
        'create_title' => 'Create Paper',
        'edit_title' => 'Edit Paper',
        'show_title' => 'Show Paper',
        'inputs' => [
            'title' => 'Title',
            'publisher' => 'Publisher',
            'published_at' => 'Published At',
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
