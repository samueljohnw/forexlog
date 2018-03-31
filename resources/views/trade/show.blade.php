<table>
    <thead>
        <tr>
            <th scope="col">Currencies</th>
            <th>Images</th>
            <th>Entry</th>
            <th>Target</th>
            <th>Stop</th>
            <th>Profit / Loss</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
      @foreach($trades as $trade)
        <tr class="{{$trade->status}}">
            <th scope="row">{!! $trade->position_arrows() !!} <a href="#"data-modal-target="#ShowTrade-{{$trade->id}}" data-modal-fit-viewport="false">{{$trade->pair}}</a></th>
            <th>
              @foreach($trade->images()->get() as $image)
              <a class="grouped-{{$trade->id}}" href="{{Storage::url($image->path)}}"
                 data-modal-title="E: {{$trade->entry}} / T: {{$trade->target}} / S: {{$trade->stop}}"
                 data-modal-group=".grouped-{{$trade->id}}">
                  {{$image->title}}
              </a>
              @endforeach
            </th>
            <th>{{$trade->entry}}</th>
            <th>{{$trade->target}}</th>
            <th>{{$trade->stop}}</th>
            <th>{{$trade->realized()}}</th>
            <th>{{$trade->tradeDate()}}</th>
        </tr>
        <div id="ShowTrade-{{$trade->id}}" class="hidden">
          @include('trade.edit')
        </div>
      @endforeach
    </tbody>
</table>
