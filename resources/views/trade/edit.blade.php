
  {{csrf_field()}}
  <div class="row">
    <div class="col-s-6">
      <button class="wide small" data-modal-target="#UploadImage" data-modal-fit-viewport="false">Upload Image</button>
    </div>
    <div class="col-s-6">
      <button class="wide small" data-modal-target="#UpdateTrade-{{$trade->id}}" data-modal-fit-viewport="false">Edit Trade</button>
    </div>
  </div>
  <h1>{{$trade->pair}}</h1>
  <div class="row">
    <div class="col-s-3">
        <b>Entry:</b>
    </div>
    <div class="col-s-9">
      {{$trade->entry}}
    </div>
  </div>
  <div class="row">
    <div class="col-s-3">
        <b>Target:</b>
    </div>
    <div class="col-s-9">
       {{$trade->target}}
    </div>
  </div>
  <div class="row">
    <div class="col-s-3">
        <b>Stop:</b>
    </div>
    <div class="col-s-9">
      {{$trade->stop}}
    </div>
  </div>

@if($trade->exit)
    <div class="row">
      <div class="col-s-3">
          <b>Exit:</b>
      </div>
      <div class="col-s-9">
        {{$trade->exit}}
      </div>
    </div>
@endif
@if(empty($trade->exit))
  <form class="" action="/{{$trade->id}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PUT')}}
    <input type="hidden" name="closeDate"  value="{{date('Y-m-d')}}">
    <input type="text" name="exit"  placeholder="Exit Price">
    <input type="text" name="realized"  placeholder="What was the profit loss?">
    <button type="submit">Update It</button>
  </form>
@endif

<div id="UpdateTrade-{{$trade->id}}" class="hidden">
  <form class="" action="/{{$trade->id}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PUT')}}
    <div class="row">
      <div class="col-xxs-12">
        <input name="pair" type="text" placeholder="Currency Pair" value="EURUSD">
      </div>
    </div>
    <div class="row">
      <div class="col-xxs-6">
        <input class="input" type="datetime-local" name="openDate"  value="{{date('Y-m-d\TH:i:s')}}">
      </div>
      <div class="col-xxs-6">
        <input class="input" type="datetime-local" name="closeDate"  value="{{date('Y-m-d\TH:i:s')}}">
      </div>
    </div>
    <input name="units" type="text" placeholder="Units" value="{{$trade->units}}">
    <input name="entry" type="text" placeholder="Entry Price" value="{{$trade->entry}}">
    <input name="target" type="text" placeholder="Target Price" value="{{$trade->target}}">
    <input name="stop" type="text" placeholder="Stop Price" value="{{$trade->stop}}">
    <input name="exit" type="text" placeholder="Exit Price" value="{{$trade->exit}}">

    <button type="submit" class="pull">Update It</button>
  </form>
  <form class="" action="/{{$trade->id}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PUT')}}
    <button type="submit" name="status" value="cancelled" class="push">Cancel Trade</button>
  </form>
</div>

<div id="UploadImage" class="hidden">
  <form class="" action="/{{$trade->id}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PUT')}}
    <label for="image">Image upload</label>
    <input name="title" type="text" placeholder="Image Title" value="Zones">
    <input id="image" name="image" type="file">
    <button type="submit">Update It</button>
  </form>
</div>
