<title>{{ !empty($meta['title']) ? $meta['title'] . " - Nur's Blog" : "Nur's Blog" }}</title>
<!-- Facebook metadata -->
<meta property="og:image" content="{{ !empty($meta['image']) ? url($meta['image']) : url('images/logo.png') }}" />
<meta property="og:description" content="{{ !empty($meta['description']) ? str_limit($meta['description'], $limit = 100, $end = '...') : 'Maker of fine things that live on the interwebs.' }}" />
<meta property="og:title" content="{{ !empty($meta['title']) ? $meta['title'] : "Nur's Blog" }}" />
<!-- Google metadata -->
<meta itemprop="name" content="{{ !empty($meta['title']) ? $meta['title'] : "Nur's Blog" }}" />
<meta itemprop="description" content="{{ !empty($meta['description']) ? str_limit($meta['description'], $limit = 100, $end = '...') : 'Maker of fine things that live on the interwebs.' }}" />
<meta itemprop="image" content="{{ !empty($meta['image']) ? url($meta['image']) : url('images/logo.png') }}" />
<!-- Twitter metadata -->
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@websiternewbie"/>
<meta name="twitter:title" content="{{ !empty($meta['title']) ? $meta['title'] : "Nur's Blog" }}" />
<meta name="twitter:description" content="{{ !empty($meta['description']) ? str_limit($meta['description'], $limit = 100, $end = '...') : 'Maker of fine things that live on the interwebs.' }}" />
<meta name="twitter:image" content="{{ !empty($meta['image']) ? url($meta['image']) : url('images/logo.png') }}" />
<meta name="twitter:domain" content="{{ url('/') }}" />