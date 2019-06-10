# Visa evenemang

## Hur man använder Region Hallands plugin "region-halland-acf-page-evenemang"

Nedan följer instruktioner hur du kan använda pluginet "region-halland-acf-page-evenemang".


## Användningsområde

Denna plugin ger möjlighet att skapa poster med evenemang


## Installation och aktivering

```sh
A) Hämta pluginen via Git eller läs in det med Composer
B) Installera Region Hallands plugin i Wordpress plugin folder
C) Aktivera pluginet inifrån Wordpress admin
```


## Hämta hem pluginet via Git

```sh
git clone https://github.com/RegionHalland/region-halland-acf-page-evenemang.git
```


## Läs in pluginen via composer

Dessa två delar behöver du lägga in i din composer-fil

Repositories = var pluginen är lagrad, i detta fall på github

```sh
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/RegionHalland/region-halland-acf-page-evenemang.git"
  },
],
```
Require = anger vilken version av pluginen du vill använda, i detta fall version 1.0.0

OBS! Justera så att du hämtar aktuell version.

```sh
"require": {
  "regionhalland/region-halland-acf-page-evenemang": "1.0.0"
},
```


## Visa alla kommande events på en sida via "Blade"

```sh
@php($myData = get_region_halland_acf_page_evenemang_kommande_items())
@if(isset($myData))
  @foreach ($myData as $data)
    {!! $data->image !!}<br>
    {{ $data->post_title }}<br>
    {{ $data->ingress }}<br>
  @endforeach
@endif
```


## Exempel på hur arrayen ser ut

```sh
array (size=2)
  0 => 
    object(WP_Post)[6833]
      public 'ID' => int 51
      public 'post_author' => string '1' (length=1)
      public 'post_date' => string '2019-06-07 11:28:09' (length=19)
      public 'post_date_gmt' => string '2019-06-07 09:28:09' (length=19)
      public 'post_content' => string 'Min första spelning' (length=19)
      public 'post_title' => string 'Första spelningen' (length=17)
      public 'post_excerpt' => string '' (length=0)
      public 'post_status' => string 'publish' (length=7)
      public 'comment_status' => string 'closed' (length=6)
      public 'ping_status' => string 'closed' (length=6)
      public 'post_password' => string '' (length=0)
      public 'post_name' => string 'forsta-spelningen' (length=3)
      public 'to_ping' => string '' (length=0)
      public 'pinged' => string '' (length=0)
      public 'post_modified' => string '2019-06-07 11:32:40' (length=19)
      public 'post_modified_gmt' => string '2019-06-07 09:32:40' (length=19)
      public 'post_content_filtered' => string '' (length=0)
      public 'post_parent' => int 0
      public 'guid' => string 'http://exempel.se/evenemang/forsta-spelningen/' (length=46)
      public 'menu_order' => int 0
      public 'post_type' => string 'evenemang' (length=9)
      public 'post_mime_type' => string '' (length=0)
      public 'comment_count' => string '0' (length=1)
      public 'filter' => string 'raw' (length=3)
      public 'url' => string 'http://exempel.se/evenemang/forsta-spelningen' (length=45)
      public 'image_url' => string 'http://exempel.se/app/uploads/2019/06/hero-d-lopning.jpg' (length=56)
      public 'date' => string '2019-06-07' (length=10)
      public 'stad' => string 'Halmstad' (length=8)
      public 'spelstalle' => string 'Galgberget' (length=10)
      public 'speltid' => string '2019-06-29 18:30' (length=16)
      public 'speltid_datum' => string '2019-06-29' (length=10)
      public 'speltid_tid' => string '18:30' (length=5)
```


## Visa alla kommande events på en sida via "Blade" (med all information)

```sh
@php($myData = get_region_halland_acf_page_evenemang_kommande_items_all())
@if(isset($myData))
  @foreach ($myData as $data)
    {!! $data->image !!}<br>
    {{ $data->post_title }}<br>
    {{ $data->ingress }}<br>
    Information<br>
      @foreach ($data->information as $information)
        @if($information['has_link'])
          <a href="{{ $information['link_url'] }}" target="{{ $information['link_target'] }}">{{ $information['link_title'] }}</a><br>
        @endif
      @endforeach
      Arrangörer<br>
      @foreach ($data->arrangor as $arrangor)
        @if($arrangor['has_link'])
        <a href="{{ $arrangor['link_url'] }}" target="{{ $arrangor['link_target'] }}">{{ $arrangor['link_title'] }}</a><br>
        @endif
      @endforeach
  @endforeach
@endif

```


## Exempel på hur arrayen ser ut

```sh
array (size=2)
  0 => 
    object(WP_Post)[6833]
      public 'ID' => int 51
      public 'post_author' => string '1' (length=1)
      public 'post_date' => string '2019-06-07 11:28:09' (length=19)
      public 'post_date_gmt' => string '2019-06-07 09:28:09' (length=19)
      public 'post_content' => string 'Min första spelning' (length=19)
      public 'post_title' => string 'Första spelningen' (length=17)
      public 'post_excerpt' => string '' (length=0)
      public 'post_status' => string 'publish' (length=7)
      public 'comment_status' => string 'closed' (length=6)
      public 'ping_status' => string 'closed' (length=6)
      public 'post_password' => string '' (length=0)
      public 'post_name' => string 'forsta-spelningen' (length=3)
      public 'to_ping' => string '' (length=0)
      public 'pinged' => string '' (length=0)
      public 'post_modified' => string '2019-06-07 11:32:40' (length=19)
      public 'post_modified_gmt' => string '2019-06-07 09:32:40' (length=19)
      public 'post_content_filtered' => string '' (length=0)
      public 'post_parent' => int 0
      public 'guid' => string 'http://exempel.se/evenemang/forsta-spelningen/' (length=46)
      public 'menu_order' => int 0
      public 'post_type' => string 'evenemang' (length=9)
      public 'post_mime_type' => string '' (length=0)
      public 'comment_count' => string '0' (length=1)
      public 'filter' => string 'raw' (length=3)
      public 'url' => string 'http://exempel.se/evenemang/forsta-spelningen' (length=45)
      public 'image_url' => string 'http://exempel.se/app/uploads/2019/06/hero-d-lopning.jpg' (length=56)
      public 'date' => string '2019-06-07' (length=10)
      public 'stad' => string 'Halmstad' (length=8)
      public 'spelstalle' => string 'Galgberget' (length=10)
      public 'speltid' => string '2019-06-29 18:30' (length=16)
      public 'speltid_datum' => string '2019-06-29' (length=10)
      public 'speltid_tid' => string '18:30' (length=5)
      public 'information' => 
        array (size=3)
            0 => 
              array (size=4)
                'has_link' => int 1
                'link_title' => string 'Om oss' (length=6)
                'link_url' => string 'http://exempel.se/om-oss/' (length=25)
                'link_target' => string '' (length=0)
            1 => 
              array (size=4)
                'has_link' => int 1
                'link_title' => string 'För artister' (length=13)
                'link_url' => string 'http://exempel.se/for-artister/' (length=31)
                'link_target' => string '' (length=0)
            2 => 
              array (size=4)
                'has_link' => int 1
                'link_title' => string 'För arrangörer' (length=16)
                'link_url' => string 'http://exempel.se/for-arrangorer/' (length=33)
                'link_target' => string '' (length=0)
      public 'arrangor' => 
        array (size=1)
          0 => 
            array (size=4)
              'has_link' => int 1
              'link_title' => string 'Artister' (length=8)
              'link_url' => string 'http://www.exempel.se' (length=21)
              'link_target' => string '' (length=0)
```


## Vis aevenemangets ingress på en enskild evenemangs-sida

```sh
Evenemangets ingress<br>
{{ get_region_halland_acf_page_evenemang_ingress() }}
```



## Visa aevenemangets ingress på en enskild evenemangs-sida

```sh
<div>
  <p><strong>Stad:</strong> {{ get_region_halland_acf_page_evenemang_stad() }}
  <p><strong>Spelställe:</strong> {{ get_region_halland_acf_page_evenemang_spelstalle() }}</p>
  <p><strong>Speltid:</strong> {{ get_region_halland_acf_page_evenemang_speltid() }}</p>
  <p><strong>Information:</strong><br>
    @php($myInformation = get_region_halland_acf_page_evenemang_information())
      @foreach ($myInformation as $information)
      @if($information['has_link'])
        <a href="{{ $information['link_url'] }}" target="{{ $information['link_target'] }}">{{ $information['link_title'] }}</a><br>
      @endif
    @endforeach
  </p>
  <p><strong>Arrngör:</strong><br>
    @php($myArrangor = get_region_halland_acf_page_evenemang_arrangor())
      @foreach ($myArrangor as $arrangor)
      @if($arrangor['has_link'])
        <a href="{{ $arrangor['link_url'] }}" target="{{ $arrangor['link_target'] }}">{{ $arrangor['link_title'] }}</a><br>
      @endif
    @endforeach
  </p>
</div>
```


## Versionhistorik

### 1.3.0
- Funktioner för att visa evenemangs-data på en enskild sida
- View-filen finns även inlagd som exempel

### 1.2.0
- Funktion för att hämta ut kommande evenemang med all information

### 1.1.0
- Funktion för att hämta ut kommande evenemang

### 1.0.0
- Första version