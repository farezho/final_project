@foreach($documents as $document)
    <article>
        <div class="row-fluid" style="font-size: 18px;">
            <i class="fas fa-file" style="font-size: 18px; padding-left: 7px; padding-right: 12px;"></i>
            Document id: {!! $document->id !!}
        </div>
        <div class="row-fluid" style="font-size: 18px;">
            <i class="fas fa-user" style="font-size: 18px; padding-left: 5px; padding-right: 12px;"></i>
                Owner profile id: {!! $document->detail_id !!}
        </div>
        <div class="row-fluid" style="font-size: 15px; display:none;">
            <i class="fas fa-graduation-cap" style="font-size: 18px; padding-left: 7px; padding-right: 12px;"></i>
            File: {!! $document->file !!}
        </div>
        <div class="row-fluid" style="font-size: 18px;">
            @if($document->status == "uploaded")
                <i class="fas fa-upload" style="font-size: 20px; padding-right: 12px;"></i>
                Document status: {!! $document->status !!}
            @endif
            @if($document->status == "read")
                <i class="fas fa-download" style="font-size: 20px; padding-right: 12px;"></i>
                Document status: {!! $document->status !!}
            @endif
            @if($document->status == "accept")
                <i class="fa fa-check" style="font-size: 20px; padding-right: 12px;"></i>
                Document status: {!! $document->status !!}
            @endif
            @if($document->status == "reject")
                <i class="ffa fa-remove" style="font-size: 20px; padding-right: 12px;"></i>
                Document status: {!! $document->status !!}
            @endif 
        </div>
        <div class="row-fluid" style="font-size: 18px;">
                <i class="far fa-envelope" style="font-size: 18px; padding-left: 3px; padding-right: 12px;"></i>
                @if($document->messages == null)
                    No Messages Yet
                @else
                    Messages: {!! $document->messages !!}
                @endif

                <a href="{{route('download.show', $document->id)}}" class="btn btn-raised btn-primary btn-xs pull-right" style="margin-right: 10px;">Download</a>

                <a href="{{route('admin.edit', $document->id)}}" class="btn btn-raised btn-warning btn-xs pull-right" style="margin-right: 10px;">Take an action</a>
        </div>
    </article>
    <br/>
@endforeach