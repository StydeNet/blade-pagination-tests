<?php

function get_cdn($theme)
{
    switch ($theme)
    {
        case 'bootstrap':
            return 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css';
        case 'foundation':
            return 'https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css';
        case 'materialize':
            return 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css';
    }
}