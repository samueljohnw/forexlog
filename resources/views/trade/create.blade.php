<form class="" action="/" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="row">
    <div class="col-xxs-6">
      <input name="pair" type="text" placeholder="Currency Pair" value="EURUSD">
    </div>
    <div class="col-xxs-6">
      <input class="input" type="datetime-local" name="openDate"  value="{{date('Y-m-d\TH:i:s')}}">
    </div>
  </div>
  <input name="units" type="text" placeholder="Units" value="25000">
  <input name="entry" type="text" placeholder="Entry Price" value="1.411231">
  <input name="target" type="text" placeholder="Target Price" value="1.401231">
  <input name="stop" type="text" placeholder="Stop Price" value="1.411291">

  <label for="image">Image upload</label>
  <input name="title" type="text" placeholder="Image Title" value="Zones">
  <input id="image" name="image" type="file">

  <button type="submit">Log It</button>

</form>
