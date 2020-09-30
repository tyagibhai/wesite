
<title>{{ $seoDetails['post_title'] }}</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="title" content="{{ $seoDetails['post_title'] }}">
<meta name="description" content="{{ $seoDetails['post_excerpt'] }}">


<meta property="og:type" content="website">
<meta property="og:url" content="{{ $pageUrl }}">
<meta property="og:title" content="{{ $seoDetails['post_title'] }}">
<meta property="og:description" content="{{ $seoDetails['post_excerpt'] }}">
<meta property="og:image" content="{{env("WP_IMAGE_PATH")}}{{$seoDetails['meta_value'] }}">


<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $pageUrl }}">
<meta property="twitter:title" content="{{ $seoDetails['post_title'] }}">
<meta property="twitter:description" content="{{ $seoDetails['post_excerpt'] }}">
<meta property="twitter:image" content="{{env("WP_IMAGE_PATH")}}{{$seoDetails['meta_value'] }}">

