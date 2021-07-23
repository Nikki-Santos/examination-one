<?php
/**
 *
 */
return [

    'endpoint' => [
        'weather' => [
            'current' => 'https://api.openweathermap.org/data/2.5/weather',
            'forecast' => "https://api.openweathermap.org/data/2.5/forecast",
            'key' => '1f59fe92e2b66ba0c85d4de28b225c7c',
        ],
        'foursquare' => [
            'url' => 'https://api.foursquare.com/v2/venues/search',
            'photo' => "https://api.foursquare.com/v2/venues/VENUE_ID/photos",
            'clientId' => 'P4JKLZJAZ4D5ONCKBZSGNETLHBZDT3B4QD1HX2YN2X5ZYSUU',
            'clientSecret' => 'HXWQLP21D0JOCO1CVMS0QT4KAB5XNMYPO31Y0LVWB5UJGKUP',
        ],
    ],
    'city' => [
        'tokyo',
        'yokohama',
        'kyoto',
        'osaka',
        'sapporo',
        'nagoya',
    ],

    // 'item' => [
    //     'endpoint' => 'https://api.ebay.com/buy/browse/v1/item/',
    //     'headers' => [
    //         'Content-Type' => 'application/json',
    //         'X-EBAY-C-ENDUSERCTX' => 'contextualLocation=country=<2_character_country_code>,zip=<zip_code>,affiliateCampaignId=<ePNCampaignId>,affiliateReferenceId=<referenceId>',
    //     ],
    // ],
    //
    // 'authzToken' => [
    //     'endpoint' => 'https://api.ebay.com/identity/v1/oauth2/token',
    //     'headers' => [
    //         'Content-Type' => 'application/x-www-form-urlencoded',
    //         'Authorization' => 'Basic SWRlYXdlbGwtTWVyY2hhbnQtUFJELWU4YmIwNmIxZC05MDFkOTdlZDpQUkQtOGJiMDZiMWQwMmU5LTJkN2EtNDZmYi05Yjc3LTQ0YjA=',
    //     ],
    //     'formParams' => [
    //         'grant_type' => 'client_credentials',
    //         'redirect_uri' => 'https://www.findshare.com',
    //         'scope' => 'https://api.ebay.com/oauth/api_scope',
    //     ],
    // ],
    //
    // 'itemDetails' => [
    //     'sellerItemRevision',
    //     'categoryPath',
    //     'condition',
    //     'brand',
    //     'description',
    //     'adultOnly',
    // ],
    //
    // 'partnerNetwork' => [
    //     'accountSID' => 'IRe9BVZCjwDm1720533KJ8nR6qnzWAowJ1',
    //     'authToken' => 'qXCcVcjkhoCBWhH3~4jRrjLzCYiAAwn_',
    // ],
];
