<?php

namespace App\Enums;

enum OrderStatusEnum: int
{
    case CASH = 0;
    case BY_CARD_TO_THE_COURIER = 1;
    case ONLINE = 2;

    public static function asArray(): array
    {
        return array_map(
            static fn(self $type) => $type->value,
            self::cases()
        );
    }
}
