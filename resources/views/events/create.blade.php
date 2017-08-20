<div class="row">
    <div class="col-sm-6">
        <label>Name</label>
        {!! Form::text('title',null,['placeholder'=>'Name','class'=>'form-control']) !!}
        <br/>
        <label>Status</label>
        {!! Form::select('status',[
       'open'=>'Open',
       'in-progress'=>'In-progress',
       'completed'=>'Completed',
       'cancelled'=>'Cancelled'
       ],null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="input-group">
            <label>Repeats?</label>
            {!! Form::select('repeats',[0=>'No',1=>'Yes'],null,['class'=>'repeats form-control']) !!}
            <br/>
            <div id="freq" style="display: none;">
                <div class="input-group">
                    <span class="input-group-addon">Every:&nbsp;</span>
                    {!! Form::input('number','freq',1,['required'=>'required','class'=>'freq-a form-control','style'=>'width:65px']) !!}

                    {!! Form::select('freq_term',[
               'day'=>'Day',
               'week'=>'Week',
               'month'=>'Month',
               'year'=>'Year'],null,['required'=>'required','class'=>'freq-b form-control','style'=>'width:100px']) !!}

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="input-group">
            <span class="input-group-addon">Start:&nbsp;</span>
            {!! Form::input('date','start_date',date('Y-m-d'),['placeholder'=>'Start','class'=>'form-control']) !!}
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon">End:&nbsp;&nbsp;</span>
            {!! Form::input('date','end_date',date('Y-m-d'),['placeholder'=>'End','class'=>'form-control']) !!}
        </div>
    </div>
</div>
<label>Notes</label>
{!! Form::textarea('notes',null,['class'=>'form-control','rows'=>3]) !!}
