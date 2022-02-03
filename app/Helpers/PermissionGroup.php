<?php

namespace App\Helpers;

class PermissionGroup
{
    const MENUS__CATEGORY = 'menus-category.';
    const MENU = 'menus.';
    const NEWS_CATEGORY = 'news-category.';
    const NEWS = 'news.';
    const POSTER_CATEGORY = 'posters-category.';
    const POSTER = 'posters.';
    const ANSWER_CATEGORY = 'answers-category.';
    const ANSWER = 'answers.';
    const CONCERN_CATEGORY = 'concerns-category.';
    const CONCERN = 'concerns.';
    const PAGE_CATEGORY = 'pages-category.';
    const PAGE = 'pages.';
    const USEFUL_CATEGORY = 'useful-category.';
    const USEFUL = 'useful.';
    const PHOTO_CATEGORY = 'photos-category.';
    const PHOTO = 'photos.';
    const VIDEO_CATEGORY = 'videos-category.';
    const VIDEO = 'videos.';
    const EVENT_CATEGORY = 'events-category.';
    const EVENT = 'events.';
    const MANAGEMENT_CATEGORY = 'managements-category.';
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
            self::MENUS__CATEGORY,
            self::MENU,
            self::NEWS_CATEGORY,
            self::NEWS,
            self::POSTER_CATEGORY,
            self::POSTER,
            self::ANSWER_CATEGORY,
            self::ANSWER,
            self::CONCERN_CATEGORY,
            self::CONCERN,
            self::PAGE_CATEGORY,
            self::PAGE,
            self::USEFUL_CATEGORY,
            self::USEFUL,
            self::PHOTO_CATEGORY,
            self::PHOTO,
            self::VIDEO_CATEGORY,
            self::VIDEO,
            self::EVENT_CATEGORY,
            self::EVENT,
            self::MANAGEMENT_CATEGORY,
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
