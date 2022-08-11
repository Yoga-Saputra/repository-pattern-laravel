<?php

namespace App\Helpers;

class ResponseCode
{
    public static $_OK = 200;
    public static $_ACCEPTED = 202;
    public static $_CREATED = 201;
    public static $_NOT_MODIFIED = 304;
    public static $_BAD_REQUEST = 400;
    public static $_UNAUTHORIZED = 401;
    public static $_NOT_FOUND = 404;
    public static $_METHOD_NOT_ALLOWED = 405;
    public static $_UNSUPPORTED_MEDIA_TYPE = 415;
    public static $_TOO_MANY_REQUEST = 429;
    public static $_INTERNAL_SERVER_ERROR = 500;
    public static $_SERVICE_UNAVAILABLE = 503;
}
