@extends('Main')
@section('body')

<div style="padding: 10px; margin:10px;">
    <form  class="table table-primary table-striped" id="Form4" action="/Building/Connect_Submit">
        <div class="containerasli" style="width:400px;">
            <div class="containr1">
                <div style="height: 20px;"></div>
                <div class="input-group">
                    <span class="input-group-text" style="width:150px;" >Building ID :</span>
                    <input type="text"  label="title" class="form-control" name="id" style="width:100px;" id="id" value="{{old('id')}}">
                </div>
                <div id="bt" style="height: 50px;">
                        <button type="submit" class="btn btn-primary" style="width: 120px;" id="submit">Add</button>
                </div>
                <div style="height: 20px;"></div>
            </div>
        </div>
    </form>
</div>

@endsection