@extends('layouts.app')

@section('content')
<div class="center pt3 px4 pb4 clearfix" style="max-width: 1440px;">
	<div class="left-align col col-12 lg-col-9 pr4">
		<main class="rh-article">
			@while(have_posts()) @php(the_post())
				<h1 class="">{{ get_the_title() }}</h1>
				<div class="">
					<p>{{ the_content() }}</p>
				</div>
			@endwhile
			{{get_region_halland_acf_page_evenemang_ingress()}}
		</main>
	</div>
    <div class="left-align col col-12 md-col-3">
        <div class="mt2 pt2 pl2 pb2" style="border-left: 4px solid #61A2D8; background-color: #D0E3F3; border-bottom-left-radius: 5px; border-top-left-radius: 5px;">
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
    </div>
</div>
@endsection
