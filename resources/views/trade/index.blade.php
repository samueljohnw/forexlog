<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="For Logging Forex Trades." />
        <title>Forex Logger</title>
        <link href="/css/responsive.min.css" rel="stylesheet" />
        <link href="/css/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">


        <style media="screen">
          .wide{width:100%}
          .small{font-size:small;}
        </style>
    </head>
    <body>
      <div class="row">
          <div class="col-xxs-10 offset-xxs-1">
            <h1>Forex Tracker</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-xxs-10 offset-xxs-1">
              Sort: <a href="#" class="highlight sort-all">All</a> | <a href="#" class="sort-wins">Wins</a> | <a href="#" class="sort-losses">Losses</a>
          </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-xxs-10 offset-xxs-1">
              <button href="#" data-modal-target="#LogTrade" data-modal-fit-viewport="false">Log Trade</button>
              @include('trade.show')
            </div>
        </div>
        <div id="LogTrade" class="hidden">
          @include('trade.create')
        </div>
        <script
          src="https://code.jquery.com/jquery-2.2.4.min.js"
          integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
          crossorigin="anonymous"></script>
          <script src="/js/responsive.min.js"></script>
          <script src="/js/app.js"></script>
    </body>
</html>
