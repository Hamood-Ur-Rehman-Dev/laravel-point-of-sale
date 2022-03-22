<?php

namespace App\Utils;

class SystemTheme
{
    const DARK  = "dark";
    const LIGHT = "light";

    const SIDEBAR_BG = [
        self::LIGHT => "Light",
        self::DARK => "Dark",
    ];

    const PRIMARY = "primary";
    const SECONDARY = "secondary";
    const INFO = "info";
    const WARNING = "warning";
    const DANGER = "danger";

    const SIDEBAR_FG = [
        self::PRIMARY => "Primary",
        self::SECONDARY => "Secondary",
        self::INFO => "Info",
        self::WARNING => "Warning",
        self::DANGER => "Danger"
    ];

    const NAVBAR_FG = [
        self::LIGHT => "Light",
        self::DARK => "Dark",
    ];

    const NAVBAR_BG = [
        self::PRIMARY => "Primary",
        self::SECONDARY => "Secondary",
        self::INFO => "Info",
        self::WARNING => "Warning",
        self::DANGER => "Danger"
    ];
}