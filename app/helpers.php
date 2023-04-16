<?php

function getImageUrl(): array
{
    return array_map(function ($url){
        return $url ? asset('storage/banners/' . $url) : asset('assets/images/user.png');
    }, $arrayUrl);
}
