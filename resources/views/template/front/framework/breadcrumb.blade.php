<section class="framework_header_breadcrumb">
    <div class="container">
        <div class="row framework_header_breadcrumb_row">
            <div class="col-md-12">
                @if(!empty($crumbs))
                    @foreach($crumbs as $crumb)
                        @if(isset($crumb['url']))
                            <a href="{{ URL::to('/') . "/" . $crumb['url']}}">{{$crumb['name']}}</a>
                            <span>»</span>
                        @else
                            <span class="framework_header_breadcrumb_current_item">{{$crumb['name']}}</span>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>