<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

Breadcrumbs::for('admin', function ($trail) {
    $trail->push(tr('Dashboard'), route('admin'));
});

Breadcrumbs::for('menus-category', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Menu Categories'), route('menus-category.index'));
});
Breadcrumbs::for('menus-category/create', function ($trail) {
    $trail->parent('menus-category');
    $trail->push(tr('Create Menu Category'), route('menus-category.create'));
});
Breadcrumbs::for('menus-category/edit', function ($trail, $id) {
    $trail->parent('menus-category');
    $trail->push(tr('Update Menu Category'), route('menus-category.edit', $id));
});
Breadcrumbs::for('menus-category/show', function ($trail, $id) {
    $trail->parent('menus-category');
    $trail->push(tr('About Menu Category'), route('menus-category.show', $id));
});

Breadcrumbs::for('menus', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Menus'), route('menus.index'));
});
Breadcrumbs::for('menus/create', function ($trail) {
    $trail->parent('menus');
    $trail->push(tr('Create Menus'), route('menus.create'));
});
Breadcrumbs::for('menus/edit', function ($trail, $id) {
    $trail->parent('menus');
    $trail->push(tr('Update Menus'), route('menus.edit', $id));
});
Breadcrumbs::for('menus/show', function ($trail, $id) {
    $trail->parent('menus');
    $trail->push(tr('About Menu'), route('menus.show', $id));
});

Breadcrumbs::for('news-category', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('News Categories'), route('news-category.index'));
});
Breadcrumbs::for('news-category/create', function ($trail) {
    $trail->parent('news-category');
    $trail->push(tr('Create News Category'), route('news-category.create'));
});
Breadcrumbs::for('news-category/edit', function ($trail, $id) {
    $trail->parent('news-category');
    $trail->push(tr('Update News Category'), route('news-category.edit', $id));
});
Breadcrumbs::for('news-category/show', function ($trail, $id) {
    $trail->parent('news-category');
    $trail->push(tr('About News Category'), route('news-category.show', $id));
});

Breadcrumbs::for('news', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('News'), route('news.index'));
});
Breadcrumbs::for('news/create', function ($trail) {
    $trail->parent('news');
    $trail->push(tr('Create News'), route('news.create'));
});
Breadcrumbs::for('news/edit', function ($trail, $id) {
    $trail->parent('news');
    $trail->push(tr('Update News'), route('news.edit', $id));
});
Breadcrumbs::for('news/show', function ($trail, $id) {
    $trail->parent('news');
    $trail->push(tr('About News'), route('news.show', $id));
});

Breadcrumbs::for('pages-category', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Page Categories'), route('pages-category.index'));
});
Breadcrumbs::for('pages-category/create', function ($trail) {
    $trail->parent('pages-category');
    $trail->push(tr('Create Page Category'), route('pages-category.create'));
});
Breadcrumbs::for('pages-category/edit', function ($trail, $id) {
    $trail->parent('pages-category');
    $trail->push(tr('Update Page Category'), route('pages-category.edit', $id));
});
Breadcrumbs::for('pages-category/show', function ($trail, $id) {
    $trail->parent('pages-category');
    $trail->push(tr('About Page Category'), route('pages-category.show', $id));
});

Breadcrumbs::for('pages', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Pages'), route('pages.index'));
});
Breadcrumbs::for('pages/create', function ($trail) {
    $trail->parent('pages');
    $trail->push(tr('Create Page'), route('pages.create'));
});
Breadcrumbs::for('pages/edit', function ($trail, $id) {
    $trail->parent('pages');
    $trail->push(tr('Update Page'), route('pages.edit', $id));
});
Breadcrumbs::for('pages/show', function ($trail, $id) {
    $trail->parent('pages');
    $trail->push(tr('About Page'), route('pages.show', $id));
});

Breadcrumbs::for('useful-category', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Useful Categories'), route('useful-category.index'));
});
Breadcrumbs::for('useful-category/create', function ($trail) {
    $trail->parent('useful-category');
    $trail->push(tr('Create Useful Category'), route('useful-category.create'));
});
Breadcrumbs::for('useful-category/edit', function ($trail, $id) {
    $trail->parent('useful-category');
    $trail->push(tr('Update Useful Category'), route('useful-category.edit', $id));
});
Breadcrumbs::for('useful-category/show', function ($trail, $id) {
    $trail->parent('useful-category');
    $trail->push(tr('About Useful Category'), route('useful-category.show', $id));
});

Breadcrumbs::for('useful', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Useful'), route('useful.index'));
});
Breadcrumbs::for('useful/create', function ($trail) {
    $trail->parent('useful');
    $trail->push(tr('Create Useful'), route('useful.create'));
});
Breadcrumbs::for('useful/edit', function ($trail, $id) {
    $trail->parent('useful');
    $trail->push(tr('Update Useful'), route('useful.edit', $id));
});
Breadcrumbs::for('useful/show', function ($trail, $id) {
    $trail->parent('useful');
    $trail->push(tr('About Useful'), route('useful.show', $id));
});

Breadcrumbs::for('photos-category', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Photo Categories'), route('photos-category.index'));
});
Breadcrumbs::for('photos-category/create', function ($trail) {
    $trail->parent('photos-category');
    $trail->push(tr('Create Photo Category'), route('photos-category.create'));
});
Breadcrumbs::for('photos-category/edit', function ($trail, $id) {
    $trail->parent('photos-category');
    $trail->push(tr('Update Photo Category'), route('photos-category.edit', $id));
});
Breadcrumbs::for('photos-category/show', function ($trail, $id) {
    $trail->parent('photos-category');
    $trail->push(tr('About Photo Category'), route('photos-category.show', $id));
});

// photos category
Breadcrumbs::for('photos', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Photos'), route('photos.index'));
});
Breadcrumbs::for('photos/create', function ($trail) {
    $trail->parent('photos');
    $trail->push(tr('Create Photo'), route('photos.create'));
});
Breadcrumbs::for('photos/edit', function ($trail, $id) {
    $trail->parent('photos');
    $trail->push(tr('Update Photo'), route('photos.edit', $id));
});
Breadcrumbs::for('photos/show', function ($trail, $id) {
    $trail->parent('photos');
    $trail->push(tr('About Photo'), route('photos.show', $id));
});

Breadcrumbs::for('videos-category', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Video Categories'), route('videos-category.index'));
});
Breadcrumbs::for('videos-category/create', function ($trail) {
    $trail->parent('videos-category');
    $trail->push(tr('Create Video Category'), route('videos-category.create'));
});
Breadcrumbs::for('videos-category/edit', function ($trail, $id) {
    $trail->parent('videos-category');
    $trail->push(tr('Update Video Category'), route('videos-category.edit', $id));
});
Breadcrumbs::for('videos-category/show', function ($trail, $id) {
    $trail->parent('videos-category');
    $trail->push(tr('About Video Category'), route('videos-category.show', $id));
});

Breadcrumbs::for('videos', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Videos'), route('videos.index'));
});
Breadcrumbs::for('videos/create', function ($trail) {
    $trail->parent('videos');
    $trail->push(tr('Create Video'), route('videos.create'));
});
Breadcrumbs::for('videos/edit', function ($trail, $id) {
    $trail->parent('videos');
    $trail->push(tr('Update Video'), route('videos.edit', $id));
});
Breadcrumbs::for('videos/show', function ($trail, $id) {
    $trail->parent('videos');
    $trail->push(tr('About Video'), route('videos.show', $id));
});

Breadcrumbs::for('users', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Users'), route('users.index'));
});
Breadcrumbs::for('users/edit', function ($trail, $id) {
    $trail->parent('users');
    $trail->push(tr('Update User'), route('users.edit', $id));
});
Breadcrumbs::for('users/show', function ($trail, $id) {
    $trail->parent('users');
    $trail->push(tr('About User'), route('users.show', $id));
});

Breadcrumbs::for('logs', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Logs'), route('logs.index'));
});
Breadcrumbs::for('logs/create', function ($trail) {
    $trail->parent('logs');
    $trail->push(tr('Create Logs'), route('logs.create'));
});
Breadcrumbs::for('logs/edit', function ($trail, $id) {
    $trail->parent('logs');
    $trail->push(tr('Update Logs'), route('logs.edit', $id));
});
Breadcrumbs::for('logs/show', function ($trail, $id) {
    $trail->parent('logs');
    $trail->push(tr('About Logs'), route('logs.show', $id));
});

Breadcrumbs::for('permissions', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Permissions'), route('permissions.index'));
});
Breadcrumbs::for('permissions/create', function ($trail) {
    $trail->parent('permissions');
    $trail->push(tr('Create Permission'), route('permissions.create'));
});
Breadcrumbs::for('permissions/edit', function ($trail, $id) {
    $trail->parent('permissions');
    $trail->push(tr('Update Permission'), route('permissions.edit', $id));
});
Breadcrumbs::for('permissions/show', function ($trail, $id) {
    $trail->parent('permissions');
    $trail->push(tr('About Permission'), route('permissions.show', $id));
});


Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Roles'), route('roles.index'));
});
Breadcrumbs::for('roles/create', function ($trail) {
    $trail->parent('roles');
    $trail->push(tr('Create Role'), route('roles.create'));
});
Breadcrumbs::for('roles/edit', function ($trail, $id) {
    $trail->parent('roles');
    $trail->push(tr('Update Role'), route('roles.edit', $id));
});
Breadcrumbs::for('roles/show', function ($trail, $id) {
    $trail->parent('roles');
    $trail->push(tr('About Role'), route('roles.show', $id));
});

Breadcrumbs::for('managements-category', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Management Categories'), route('managements-category.index'));
});
Breadcrumbs::for('managements-category/create', function ($trail) {
    $trail->parent('managements-category');
    $trail->push(tr('Create Management Category'), route('managements-category.create'));
});
Breadcrumbs::for('managements-category/edit', function ($trail, $id) {
    $trail->parent('managements-category');
    $trail->push(tr('Update Management Category'), route('managements-category.edit', $id));
});
Breadcrumbs::for('managements-category/show', function ($trail, $id) {
    $trail->parent('managements-category');
    $trail->push(tr('About Management Category'), route('managements-category.show', $id));
});

Breadcrumbs::for('managements', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Managements'), route('managements.index'));
});
Breadcrumbs::for('managements/create', function ($trail) {
    $trail->parent('managements');
    $trail->push(tr('Create Management'), route('managements.create'));
});
Breadcrumbs::for('managements/edit', function ($trail, $id) {
    $trail->parent('managements');
    $trail->push(tr('Update Management'), route('managements.edit', $id));
});
Breadcrumbs::for('managements/show', function ($trail, $id) {
    $trail->parent('managements');
    $trail->push(tr('About Management'), route('managements.show', $id));
});

Breadcrumbs::for('messages', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Messages'), route('messages.index'));
});
Breadcrumbs::for('messages/create', function ($trail) {
    $trail->parent('messages');
    $trail->push(tr('Create Message'), route('messages.create'));
});
Breadcrumbs::for('messages/edit', function ($trail, $id) {
    $trail->parent('messages');
    $trail->push(tr('Update Message'), route('messages.edit', $id));
});
Breadcrumbs::for('messages/show', function ($trail, $id) {
    $trail->parent('messages');
    $trail->push(tr('About Message'), route('messages.show', $id));
});
Breadcrumbs::for('registers', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Registers'), route('appeals.index'));
});
Breadcrumbs::for('registers/create', function ($trail) {
    $trail->parent('registers');
    $trail->push(tr('Send Registers'), route('appeals.create'));
});
Breadcrumbs::for('registers/edit', function ($trail, $id) {
    $trail->parent('registers');
    $trail->push(tr('Update Register'), route('appeals.edit', $id));
});


Breadcrumbs::for('offline', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Offline'), route('offline.index'));
});
Breadcrumbs::for('offline/create', function ($trail) {
    $trail->parent('offline');
    $trail->push(tr('Send Offline'), route('offline.create'));
});
Breadcrumbs::for('offline/edit', function ($trail, $id) {
    $trail->parent('offline');
    $trail->push(tr('Update Offline'), route('offline.edit', $id));
});
