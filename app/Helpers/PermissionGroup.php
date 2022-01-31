<?php

namespace App\Helpers;

class PermissionGroup
{
    const MENUCATEGORY = 'menus-category.';
    const MENU = 'menus.';
    const NEWCATEGORY = 'news-category.';
    const NEWS = 'news.';
    const POSTERCATEGORY = 'posters-category.';
    const POSTER = 'posters.';
    const ANSWERCATEGORY = 'answers-category.';
    const ANSWER = 'answers.';
    const CONCERNCATEGORY = 'concerns-category.';
    const CONCERN = 'concerns.';
    const PAGECATEGORY = 'pages-category.';
    const PAGE = 'pages.';
    const USEFULCATEGORY = 'useful-category.';
    const USEFUL = 'useful.';
    const PHOTOCATEGORY = 'photos-category.';
    const PHOTO = 'photos.';
    const VIDEOCATEGORY = 'videos-category.';
    const VIDEO = 'videos.';
    const EVENTCATEGORY = 'events-category.';
    const EVENT = 'events.';
    const MANAGEMENTCATEGORY = 'managements-category.';
    const MANAGEMENT = 'managements.';
    const USER = 'users.';
    const LOG = 'logs.';
    const ROLE = 'roles.';
    const PERMISSION = 'permissions.';
    const MESSAGE = 'messages.';
    const CATEGORY = 'change-category.';
    const LISTS = 'change-lists.';

    public static function allTypes(): array
    {
        return [
            self::MENUCATEGORY,
            self::MENU,
            self::NEWCATEGORY,
            self::NEWS,
            self::POSTERCATEGORY,
            self::POSTER,
            self::ANSWERCATEGORY,
            self::ANSWER,
            self::CONCERNCATEGORY,
            self::CONCERN,
            self::PAGECATEGORY,
            self::PAGE,
            self::USEFULCATEGORY,
            self::USEFUL,
            self::PHOTOCATEGORY,
            self::PHOTO,
            self::VIDEOCATEGORY,
            self::VIDEO,
            self::EVENTCATEGORY,
            self::EVENT,
            self::MANAGEMENTCATEGORY,
            self::MANAGEMENT,
            self::USER,
            self::LOG,
            self::ROLE,
            self::PERMISSION,
            self::MESSAGE,
            self::CATEGORY,
            self::LISTS,
        ];
    }
}
