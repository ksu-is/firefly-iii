@extends('layouts.default')
@section('content')
{!! Breadcrumbs::renderIfExists(Route::getCurrentRoute()->getName(), $account) !!}
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-fw {{$subTitleIcon}} fa-fw"></i> {{{$account->name}}}


                <!-- ACTIONS MENU -->
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            Actions
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="{{route('accounts.edit',$account->id)}}"><i class="fa fa-pencil fa-fw"></i> Edit</a></li>
                            <li><a href="{{route('accounts.delete',$account->id)}}"><i class="fa fa-trash fa-fw"></i> Delete</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div id="overview-chart"></div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-repeat fa-fw"></i> Transactions
            </div>
            <div class="panel-body">
                @include('list.journals-full',['sorting' => true])
            </div>
    </div>
</div>



@stop
@section('scripts')
<script type="text/javascript">
    var accountID = {{{$account->id}}};
    var currencyCode = '{{Amount::getCurrencyCode()}}';
    var token = "{{csrf_token()}}";
</script>
<!-- load the libraries and scripts necessary for Google Charts: -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="js/gcharts.options.js"></script>
<script type="text/javascript" src="js/gcharts.js"></script>
<script type="text/javascript" src="js/accounts.js"></script>

<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/accounts.js" type="text/javascript"></script>
@stop
