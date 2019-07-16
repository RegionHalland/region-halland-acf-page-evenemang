# Visa evenemang

## Hur man använder Region Hallands plugin "region-halland-acf-page-evenemang"

Nedan följer instruktioner hur du kan använda pluginet "region-halland-acf-page-evenemang".


## Användningsområde

Denna plugin ger möjlighet att skapa poster med evenemang


## Licensmodell

Denna plugin använder licensmodell GPL-3.0. Du kan läsa mer om denna licensmodell via den medföljande filen:
```sh
LICENSE (https://github.com/RegionHalland/region-halland-acf-page-evenemang/blob/master/LICENSE)
```


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
    <img src="{!! $data->puff_url !!}"<br>
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
      public 'puff_url' => string 'http://exempel.se/app/uploads/2019/06/hero-i-bygg.jpg' (length=53)
      public 'puff_width' => int 1440
      public 'puff_height' => int 420
      public 'puff_has_url' => int 1
```


## Visa evenemangets ingress på en enskild evenemangs-sida

```sh
Evenemangets ingress<br>
{{ get_region_halland_acf_page_evenemang_ingress() }}
```


## Visa länk till biljett-köp

```sh
@php($myBiljett = get_region_halland_acf_page_evenemang_biljett())
@if($myBiljett['biljett_has_link'] == 1)
  <a href="{{ $myBiljett['biljett_url'] }}">{{ $myBiljett['biljett_title'] }}</a>
@endif
```


## Visa evenemangs-data på en enskild evenemangs-sida

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
  @php($myImage = get_region_halland_acf_page_evenemang_puff_image())
  <p>
  @if($myImage['puff_has_image'] == 1)
    <img src="{{$myImage['puff_url']}}" width="{{$myImage['puff_width']}}" height="{{$myImage['puff_height']}}">
  @endif
  </p>
</div>
```


## Versionhistorik

### 2.7.0
- Bifogat fil med licensmodell

### 2.6.0
- Uppdaterat information om licensmodell

### 2.5.0
- Lagt till en funktion för att hämta ett enskilt evenemang

### 2.4.0
- Koll om det finns en inlagd länk på en enskild sida

### 2.3.0
- Lagt till funktion för att hämta ut en puff-bild

### 2.2.0
- Koll om det finns en biljett på en enskild sida

### 2.1.0
- Justerat om ingen biljett är vald
- Lagt till så att man kan välja antal poster

### 2.0.1
- Ändrat sorteringsordning för att hämta ut evenemang, senast först

### 2.0.0
- Funktion för att hämta ut all data borttagen
- Lagt till bild-puff som acf-fält
- Lagt till biljett-url som acf-fält
- Puff-bilden hämtas ut när man hämtar kommande evenemang
- Funktion för att hämta ut biljett på en enskild sida

### 1.3.0
- Funktioner för att visa evenemangs-data på en enskild sida
- View-filen finns även inlagd som exempel

### 1.2.0
- Funktion för att hämta ut kommande evenemang med all information

### 1.1.0
- Funktion för att hämta ut kommande evenemang

### 1.0.0
- Första version